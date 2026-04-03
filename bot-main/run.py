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

# تأكد من المسار الصحيح
os.chdir(os.path.dirname(os.path.abspath(__file__)))

import config
from bot_helper import (
    bot_get, read_file, write_file, file_exists,
    file_lines, ensure_dir, write_json, read_json, append_file
)
from maker_handler import _run_polling as run_maker_polling
from saleh_handler import _run_polling as run_saleh_polling

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
            if len(lines) > 3 and lines[3].strip():
                write_file(admin_path, lines[3].strip())
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

    task = asyncio.create_task(run_saleh_polling(bot_dir))
    _active_bot_tasks[idbot] = task
    print(f"[Boot] 🤖 بدء polling للبوت {idbot}")
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
    """تهيئة ملفات البيانات الأساسية"""
    ensure_dir("NaMero")
    ensure_dir("botmak")
    ensure_dir("from_id")
    ensure_dir("user")
    ensure_dir("NAMERO")
    ensure_dir("data")

    if not file_exists("NaMeroData"):
        write_json("NaMeroData", {
            "info": {
                "update": "✅",
                "propots": "مجانية",
                "fwrmember": "❌",
                "tnbih": "✅",
                "silk": "✅",
                "allch": "error",
                "updatechannel": "Namerobots",
                "klish_sil": "• عذراً عزيزي عليك الاشتراك في قناة المصنع أولاً 🪢\n\n🌴 اشترك ثم أرسل /start"
            }
        })

    if not file_exists("botmak/NAMERO"):
        write_json("botmak/NAMERO", {
            "info": {"st_ch_bots": "❌", "user_bot": "NameroBots"}
        })

    for path in ("NaMero/member", "NaMero/ban", "infoidbots", "botfreeid"):
        if not file_exists(path):
            write_file(path, "")

    for path in ("code", "datatime"):
        if not file_exists(path):
            write_json(path, {})


async def main():
    _init_files()

    print("=" * 55)
    print("  NaMero Bot Factory — Polling Mode")
    print("  by @NameroBots")
    print("=" * 55)
    print(f"✅ التوكن: {TOKEN[:10]}...{TOKEN[-8:]}")

    # اختبار الاتصال
    result = await bot_get(TOKEN, "getMe")
    if not result.get("ok"):
        print(f"❌ فشل الاتصال: {result.get('description')}")
        sys.exit(1)

    bot_info = result["result"]
    print(f"✅ البوت: @{bot_info.get('username')} | {bot_info.get('first_name')}")
    print(f"🔄 وضع Polling فقط - بدون Webhook")
    print("=" * 55)

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
