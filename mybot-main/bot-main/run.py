#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
بوت مصنع ناميرو - Polling Mode فقط
بدون أي Webhook
"""

import json
import os
import sys
import asyncio
import signal
import re

# تأكد من المسار الصحيح - انتقل إلى مجلد bot-main
os.chdir(os.path.dirname(os.path.abspath(__file__)))

# ثابت: مجلد جذر المشروع (mybot-main) للاستخدام في حفظ الرسائل
PROJECT_ROOT = os.path.dirname(os.getcwd())

import config
from bot_helper import (
    bot_get, read_file, write_file, file_exists,
    file_lines, ensure_dir, write_json, read_json, append_file
)
from db_config import get_config, set_config
from maker_handler import _run_polling as run_maker_polling
from saleh_handler import _run_polling as run_saleh_polling
from namero4_handler import _run_polling as run_namero4_polling

TOKEN = config.TOKEN.strip()

# قائمة مهام البوتات النشطة
_active_bot_tasks: dict = {}


def get_active_tasks() -> dict:
    return _active_bot_tasks


async def start_bot_polling(idbot: str) -> bool:
    """
    بدء polling لبوت مصنوع واحد.
    تُستدعى عند إنشاء بوت جديد أو عند الإقلاع.
    """
    global _active_bot_tasks

    bot_dir = f"botmak/{idbot}"
    token_path = f"{bot_dir}/token"
    admin_path = f"{bot_dir}/admin"

    # محاولة استعادة التوكن من NAMERO/{idbot}.py إذا غاب botmak/{idbot}/token
    if not file_exists(token_path):
        py_path = f"NAMERO/{idbot}.py"
        if file_exists(py_path):
            content = read_file(py_path)
            m = re.search(r'tokenbot\s*=\s*["\'](.+?)["\']', content)
            if m:
                write_file(token_path, m.group(1).strip())
                print(f"[Boot] ✅ استُعيد token لبوت {idbot}")
            else:
                print(f"[Boot] ⚠️  لا يمكن قراءة token من {py_path}")
                return False
        else:
            print(f"[Boot] ⚠️  لا يوجد token لبوت {idbot}")
            return False

    # محاولة استعادة admin من info إذا غاب
    if not file_exists(admin_path):
        info_path = f"{bot_dir}/info"
        if file_exists(info_path):
            lines = read_file(info_path).split("\n")
            if len(lines) > 4 and lines[4].strip():
                write_file(admin_path, lines[4].strip())
                print(f"[Boot] ✅ استُعيد admin لبوت {idbot}")
            else:
                print(f"[Boot] ⚠️  لا يوجد admin في info لبوت {idbot}")
                return False
        else:
            print(f"[Boot] ⚠️  لا يوجد admin لبوت {idbot}")
            return False

    # لا تكرر إذا كانت المهمة تعمل بالفعل
    if idbot in _active_bot_tasks and not _active_bot_tasks[idbot].done():
        return True

    # قراءة نوع البوت من ملف info
    info_path = f"{bot_dir}/info"
    bot_type = "SALEH"  # النوع الافتراضي
    if file_exists(info_path):
        try:
            content = read_file(info_path).strip()
            lines = [l.strip() for l in content.split("\n") if l.strip()]
            # ابحث عن الخط الذي يحتوي على NAMERO4 أو SALEH
            for line in reversed(lines):
                if line == "NAMERO4":
                    bot_type = "NAMERO4"
                    break
                elif line == "SALEH":
                    bot_type = "SALEH"
                    break
        except Exception as e:
            print(f"[Boot] ⚠️  خطأ في قراءة نوع البوت: {e}")
    
    # استدعاء المعالج المناسب حسب نوع البوت
    if bot_type == "NAMERO4":
        task = asyncio.create_task(run_namero4_polling(bot_dir))
        print(f"[Boot] 🤖 بدء polling للبوت {idbot} (نوع: NAMERO4)")
    else:
        task = asyncio.create_task(run_saleh_polling(bot_dir))
        print(f"[Boot] 🤖 بدء polling للبوت {idbot} (نوع: SALEH)")
    
    _active_bot_tasks[idbot] = task
    return True


async def start_all_created_bots():
    """تشغيل polling لجميع البوتات المصنوعة الموجودة"""
    if not file_exists("infoidbots"):
        print("[Boot] ℹ️  لا توجد بوتات مصنوعة")
        return

    bots = [x for x in read_file("infoidbots").split("\n") if x.strip()]
    if not bots:
        print("[Boot] ℹ️  قائمة البوتات فارغة")
        return

    print(f"[Boot] 📋 تشغيل {len(bots)} بوت مصنوع...")
    started = 0
    for idbot in bots:
        ok = await start_bot_polling(idbot)
        if ok:
            started += 1

    print(f"[Boot] ✅ بدأ {started}/{len(bots)} بوت")


def _init_files():
    """تهيئة ملفات البيانات الأساسية + قاعدة البيانات"""
    ensure_dir("NaMero")
    ensure_dir("botmak")
    ensure_dir("from_id")
    ensure_dir("user")
    ensure_dir("NAMERO")
    ensure_dir("data")
    ensure_dir("db")

    if not file_exists("NaMeroData"):
        write_json("NaMeroData", {
            "info": {
                "update": "✅",
                "propots": "مجانية",
                "fwrmember": "❌",
                "tnbih": "✅",
                "silk": "✅",
                "allch": "error",
                "updatechannel": "Voltees",
                "klish_sil": "• عذراً عزيزي عليك الاشتراك في قناة المصنع أولاً 🪢\n\n🌴 اشترك ثم أرسل /start"
            }
        })

    if not file_exists("botmak/NAMERO"):
        write_json("botmak/NAMERO", {
            "info": {"st_ch_bots": "❌", "user_bot": "Voltees"}
        })

    for path in ("NaMero/member", "NaMero/ban", "infoidbots", "botfreeid"):
        if not file_exists(path):
            write_file(path, "")

    for path in ("code", "datatime"):
        if not file_exists(path):
            write_json(path, {})

    # ── تهيئة قاعدة البيانات بالإعدادات الافتراضية إذا لم تكن موجودة ──
    _init_db_defaults()


def _init_db_defaults():
    """تعيين القيم الافتراضية في قاعدة البيانات (بديل الملفات النصية المحذوفة)"""
    # saleh_admin: ID المشرف العام
    if not get_config("saleh_admin"):
        set_config("saleh_admin", str(config.DEVELOPER_ID))
        print(f"[DB] ✅ تم تعيين saleh_admin: {config.DEVELOPER_ID}")

    # userbot: يوزرنيم بوت الصانع (يُحدَّث بعد getMe الناجح)
    if not get_config("userbot"):
        set_config("userbot", getattr(config, "USER_BOT_NAMERO", ""))

    # xx: اسم المطور
    if not get_config("xx"):
        set_config("xx", getattr(config, "XX", config.DEVELOPER_USERNAME))

    # xxx: رابط شرح التوكن (اختياري)
    if not get_config("xxx"):
        set_config("xxx", getattr(config, "XXX", ""))

    # base_url: غير مستخدم في polling لكن محفوظ للتوافق
    if not get_config("base_url"):
        set_config("base_url", getattr(config, "BASE_URL", ""))


async def main():
    _init_files()

    print("=" * 55)
    print("  NaMero Bot Factory — Polling Mode")
    print("  by @Voltees")
    print("=" * 55)
    print(f"✅ التوكن: {TOKEN[:10]}...{TOKEN[-8:]}")

    # اختبار الاتصال
    result = await bot_get(TOKEN, "getMe")
    if not result.get("ok"):
        print(f"❌ فشل الاتصال: {result.get('description')}")
        sys.exit(1)

    bot_info = result["result"]
    bot_username = bot_info.get("username", "")
    print(f"✅ البوت: @{bot_username} | {bot_info.get('first_name')}")
    print(f"🔄 وضع Polling فقط - بدون Webhook")
    print("=" * 55)

    # حفظ اسم البوت في قاعدة البيانات (يُستخدم بدلاً من ملف userbot)
    if bot_username:
        set_config("userbot", bot_username)
        print(f"[DB] ✅ تم تحديث userbot: {bot_username}")

    # حذف أي webhook موجود على البوت الرئيسي
    dw = await bot_get(TOKEN, "deleteWebhook", {"drop_pending_updates": "false"})
    if dw.get("ok"):
        print("✅ تم حذف Webhook من البوت الرئيسي")

    # تشغيل البوتات المصنوعة في الخلفية
    asyncio.create_task(start_all_created_bots())

    # تشغيل البوت الرئيسي (Maker) - هذا يبقى يعمل
    await run_maker_polling()


if __name__ == "__main__":
    def _stop(sig, frame):
        print(f"\n🛑 إيقاف البوت...")
        sys.exit(0)

    signal.signal(signal.SIGINT, _stop)
    signal.signal(signal.SIGTERM, _stop)

    asyncio.run(main())
