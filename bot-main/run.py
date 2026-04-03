#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
بوت التليجرام الرئيسي - Main Bot Startup Script (Polling Mode)
النسخة الكاملة من بوت Namero

تم تطويره بواسطة Programmer Namero
الملفات المستخدمة: maker_handler, saleh_handler, namero4_handler
"""

import json
import os
import sys
import asyncio
import signal
from typing import Optional

import config

# Import bot helpers and handlers
from bot_helper import bot_get, bot_call, parse_update, extract_update_fields, read_file, read_json, write_json, file_exists, write_file, append_file
from maker_handler import handle_maker
from namero4_handler import handle_namero4
from saleh_handler import _run_polling as run_saleh_polling

# ============================================================================
# Global Configuration
# ============================================================================

TOKEN: Optional[str] = None
NAMERO_ADMINS: list = []
SALEH_ADMIN: Optional[str] = None
BASE_URL: Optional[str] = None
running = True
offset = 0

# ============================================================================
# Configuration Loading
# ============================================================================

def load_config():
    """تحميل الإعدادات من قاعدة بيانات SQLite أو المتغيرات البيئية"""
    global TOKEN, NAMERO_ADMINS, SALEH_ADMIN, BASE_URL

    # read config module values first
    TOKEN = getattr(config, "TOKEN", "").strip()
    if not TOKEN:
        TOKEN = read_file("token", "").strip()
    if not TOKEN:
        TOKEN = os.environ.get("NAMERO_TOKEN", "").strip()
    if TOKEN:
        write_file("token", TOKEN)

    NAMERO_ADMINS = getattr(config, "ADMIN_IDS", [])
    if isinstance(NAMERO_ADMINS, (list, tuple)):
        NAMERO_ADMINS = [str(x) for x in NAMERO_ADMINS]
    else:
        NAMERO_ADMINS = [x.strip() for x in read_file("namero_admins", "").strip().split("\n") if x.strip()]
    if not NAMERO_ADMINS:
        raw_admins = read_file("namero_admins", "").strip()
        if raw_admins:
            NAMERO_ADMINS = [x.strip() for x in raw_admins.split("\n") if x.strip()]
        else:
            env_admins = os.environ.get("NAMERO_ADMINS", "").strip()
            if env_admins:
                NAMERO_ADMINS = [x.strip() for x in env_admins.split(",") if x.strip()]
    if NAMERO_ADMINS:
        write_file("namero_admins", "\n".join(NAMERO_ADMINS))

    SALEH_ADMIN = getattr(config, "SALEH_ADMIN", "").strip()
    if not SALEH_ADMIN:
        SALEH_ADMIN = read_file("saleh_admin", "").strip()
    if not SALEH_ADMIN:
        SALEH_ADMIN = os.environ.get("SALEH_ADMIN", "").strip()
    if SALEH_ADMIN:
        write_file("saleh_admin", SALEH_ADMIN)

    BASE_URL = getattr(config, "BASE_URL", "").strip() or "http://localhost:8000"
    if not BASE_URL:
        BASE_URL = read_file("base_url", "").strip()
    if not BASE_URL:
        BASE_URL = os.environ.get("BASE_URL", "").strip() or "http://localhost:8000"
    write_file("base_url", BASE_URL)

# ============================================================================
# Polling Loop
# ============================================================================

async def polling_loop_created_bot(idbot: str, userbot: str):
    """
    حلقة استطلاع للبوتات المصنوعة
    تستدعي SALEH handler من namero4 / saleh
    """
    bot_dir = f"botmak/{idbot}"
    print(f"   🤖 بدء polling لبوت مصنوع: @{userbot} (ID: {idbot})")
    await run_saleh_polling(bot_dir)


async def polling_loop():
    """
    حلقة الاستطلاع الرئيسية
    تستدعي getUpdates بشكل مستمر وتعالج التحديثات باستخدام handle_maker
    """
    global offset, running
    
    print("🔄 بدء حلقة الاستطلاع (Polling Mode)...")
    print("⏳ في انتظار الرسائل... (اضغط Ctrl+C للإيقاف)\n")
    
    while running:
        try:
            # استدعاء getUpdates
            result = await bot_get(
                TOKEN,
                "getUpdates",
                {"offset": offset, "timeout": 30}
            )
            
            if not result.get("ok"):
                error_msg = result.get('description', 'خطأ غير معروف')
                if "terminated by other getUpdates" not in error_msg:
                    print(f"⚠️  خطأ: {error_msg}")
                await asyncio.sleep(0.5)  # تقليل التأخير
                continue
            
            updates = result.get("result", [])
            
            if updates:
                print(f"\n📬 تم استقبال {len(updates)} تحديث(ات) للبوت الرئيسي")
                
                for update in updates:
                    try:
                        # معالجة التحديث باستخدام handle_maker
                        await handle_maker(json.dumps(update).encode())
                        
                        # تحديث الـ offset
                        offset = update.get("update_id", offset) + 1
                        
                    except Exception as e:
                        print(f"❌ خطأ في معالجة تحديث واحد: {str(e)}")
                        offset = update.get("update_id", offset) + 1
                        continue
            
        except asyncio.CancelledError:
            break
        except Exception as e:
            print(f"❌ خطأ في حلقة الاستطلاع: {str(e)}")
            await asyncio.sleep(1)  # تقليل التأخير من 5 إلى 1 ثانية
            continue

async def init_created_bots_polling():
    """
    تشغيل حلقات polling لجميع البوتات المصنوعة
    """
    print("\n🔍 البحث عن البوتات المصنوعة...")
    
    if not file_exists("infoidbots"):
        print("   ℹ️  لا توجد بوتات مصنوعة حتى الآن\n")
        return
    
    infobots_lines = read_file("infoidbots").split("\n")
    infobots_lines = [x.strip() for x in infobots_lines if x.strip()]
    
    if not infobots_lines:
        print("   ℹ️  لا توجد بوتات مصنوعة حتى الآن\n")
        return
    
    print(f"   📝 تم العثور على {len(infobots_lines)} بوت(ات) مصنوع(ة)\n")
    
    # تشغيل حلقات polling لكل بوت مصنوع
    tasks = []
    for idbot in infobots_lines:
        if not idbot:
            continue
        
        # قراءة معلومات البوت
        info_key = f"botmak/{idbot}/info"
        if not file_exists(info_key):
            continue
        
        info_lines = read_file(info_key).split("\n")
        userbot = info_lines[1].strip() if len(info_lines) > 1 else ""
        
        if userbot:
            # إضافة حلقة polling لهذا البوت
            task = asyncio.create_task(polling_loop_created_bot(idbot, userbot))
            tasks.append(task)
    
    print()
    
    # الانتظار حتى جميع المهام
    if tasks:
        try:
            await asyncio.gather(*tasks)
        except Exception as e:
            print(f"❌ خطأ في حلقات البوتات المصنوعة: {str(e)}")

async def run_all_polling():
    """
    تشغيل جميع حلقات polling (البوت الرئيسي والبوتات المصنوعة) بشكل متزامن
    """
    # تشغيل حلقات البوتات المصنوعة في الخلفية
    asyncio.create_task(init_created_bots_polling())
    
    # تشغيل حلقة البوت الرئيسي
    await polling_loop()

# ============================================================================
# Helper Functions
# ============================================================================

def print_banner():
    """طباعة شعار البوت"""
    banner = """
╔════════════════════════════════════════════════════════════╗
║                 🤖 NAMERO BOT SYSTEM 🤖                    ║
║                    Polling Mode v2.0.0                     ║
║           Developed by Programmer Namero                   ║
║              Full Version with All Features                ║
╚════════════════════════════════════════════════════════════╝
    """
    print(banner)

def signal_handler(sig, frame):
    """معالج الإشارات للإيقاف الآمن"""
    global running
    running = False
    print("\n\n🛑 استقبال إشارة الإيقاف...")

# ============================================================================
# Main Entry Point
# ============================================================================

async def main():
    """الدالة الرئيسية"""
    global offset
    
    print_banner()
    
    # تحميل الإعدادات
    load_config()
    
    # التحقق من التوكن
    if not TOKEN:
        print("❌ خطأ: لم يتم العثور على التوكن في token")
        sys.exit(1)
    
    print(f"✅ التوكن: {TOKEN[:10]}...{TOKEN[-10:]}")
    print(f"✅ عدد المسؤولين: {len(NAMERO_ADMINS)}")
    if NAMERO_ADMINS:
        print(f"✅ المسؤولون: {', '.join(NAMERO_ADMINS)}")
    print(f"✅ عنوان URL الأساسي: {BASE_URL}")
    print(f"✅ وضع التشغيل: Polling فقط (بدون Webhook)")
    print("═" * 60)
    
    # اختبار الاتصال بـ Telegram API
    print("\n🔌 اختبار الاتصال بـ Telegram API...")
    try:
        test_result = await bot_get(TOKEN, "getMe")
        if test_result.get("ok"):
            bot_info = test_result.get("result", {})
            bot_name = bot_info.get("first_name", "Bot")
            bot_id = bot_info.get("id", "Unknown")
            bot_username = bot_info.get("username", "N/A")
            print(f"✅ الاتصال نجح!")
            print(f"   🤖 اسم البوت: {bot_name}")
            print(f"   👤 معرف البوت: @{bot_username}")
            print(f"   🆔 رقم البوت: {bot_id}")
            print(f"═" * 60)
        else:
            print(f"❌ فشل الاتصال: {test_result.get('description')}")
            sys.exit(1)
    except Exception as e:
        print(f"❌ خطأ في الاتصال: {str(e)}")
        sys.exit(1)
    
    # إنشاء ملفات JSON المطلوبة للبوت
    print("\n📝 تهيئة ملفات البيانات...")
    
    # تهيئة NaMero في قاعدة البيانات
    if not file_exists("NaMero"):
        namer_data = {
            "info": {
                "update": "✅",
                "propots": "مجانية",
                "fwrmember": "❌",
                "tnbih": "✅",
                "silk": "✅",
                "allch": "error",
                "klish_sil": "• عذراً عزيزي عليك الاشتراك في قناة مصنع المبرمج ناميرو لتتمكن من فتح البوت 🪢\n\n🌴 اشترك ثم أرسل /start",
                "updatechannel": "Namerobots",
                "channel": {}
            }
        }
        write_json("NaMero", namer_data)
        print("✅ تم إنشاء NaMero")
    
    # تهيئة botmak/NAMERO في قاعدة البيانات
    if not file_exists("botmak/NAMERO"):
        namero_data = {
            "info": {
                "st_ch_bots": "❌",
                "user_bot": read_file("userbot").strip() or "NameroBots"
            }
        }
        write_json("botmak/NAMERO", namero_data)
        print("✅ تم إنشاء botmak/NAMERO")
    
    # تهيئة أعضاء ومحظورين
    if not file_exists("NaMero/member"):
        write_file("NaMero/member", "")
    if not file_exists("NaMero/ban"):
        write_file("NaMero/ban", "")
    
    print("✅ تم تهيئة جميع الملفات\n")
    print("═" * 60)
    
    # بدء حلقة الاستطلاع
    print("\n🚀 بدء استقبال الرسائل...\n")
    print(f"📍 البوت الرئيسي: {TOKEN[:10]}...{TOKEN[-10:]}")
    print(f"📍 الوضع: Polling (استطلاع) للبوت الرئيسي والبوتات المصنوعة")
    print("═" * 60 + "\n")
    try:
        await run_all_polling()
    except KeyboardInterrupt:
        print("\n\n🛑 تم إيقاف البوت بواسطة المستخدم")
    except Exception as e:
        print(f"\n❌ خطأ في البوت: {str(e)}")
        sys.exit(1)

if __name__ == "__main__":
    # التسجيل لمعالجات الإشارات
    signal.signal(signal.SIGINT, signal_handler)
    signal.signal(signal.SIGTERM, signal_handler)
    
    # تشغيل البرنامج الرئيسي
    try:
        asyncio.run(main())
    except KeyboardInterrupt:
        print("\n\n🛑 البوت متوقف")
    except Exception as e:
        print(f"\n❌ خطأ: {str(e)}")
        sys.exit(1)
