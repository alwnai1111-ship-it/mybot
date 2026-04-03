###by @NameroBots
##by @S_P_P1
### Programmer Namero (Rights are not allowed to change ⚡)

import os
import re
import json
import asyncio
import signal
import sys
import config

from bot_helper import (
    bot_call, bot_get, read_file, write_file, append_file,
    read_json, write_json, file_lines, ensure_dir, file_exists,
    delete_file, extract_update_fields,
)

# ═══════════════════════════════════════════════════════════════════════════
# Sync file helpers (all paths are absolute; bot_dir is injected at call time)
# ═══════════════════════════════════════════════════════════════════════════

def _rf(path: str, default: str = "") -> str:
    return read_file(path, default).strip()


def _wf(path: str, content: str) -> None:
    write_file(path, content)


def _af(path: str, content: str) -> None:
    append_file(path, content)


def _rj(path: str, default=None):
    if default is None:
        default = {}
    return read_json(path, default)


def _wj(path: str, data) -> None:
    write_json(path, data)


def _ri(path: str, default: int = 0) -> int:
    try:
        return int(_rf(path, str(default)))
    except Exception:
        return default


def _unlink(path: str) -> None:
    delete_file(path)


def _mkdir(path: str) -> None:
    # no-op: database backend does not require directories
    pass


# ═══════════════════════════════════════════════════════════════════════════
# New Features: Advanced User Tracking, Broadcast, Statistics, Admin Management
# ═══════════════════════════════════════════════════════════════════════════

def _track_user(user_id, user_name, bot_dir: str) -> bool:
    """Track new users and notify admins. Returns True if new user."""
    key = f"{bot_dir}/data/users_list"
    users_data = _rj(key, {})
    user_key = str(user_id)
    is_new = user_key not in users_data
    
    if is_new:
        users_data[user_key] = {
            "name": user_name,
            "user_id": user_id,
            "joined": str(__import__('datetime').datetime.now()),
            "message_count": 0
        }
        _wj(key, users_data)
    else:
        users_data[user_key]["message_count"] = users_data[user_key].get("message_count", 0) + 1
        _wj(key, users_data)
    
    return is_new


def _get_users_count(bot_dir: str) -> int:
    """Get total unique users count."""
    users_file = os.path.join(bot_dir, "data", "users_list")
    users_data = _rj(users_file, {})
    return len(users_data)


def _get_stats(bot_dir: str) -> dict:
    """Get comprehensive bot statistics."""
    users_file = os.path.join(bot_dir, "data", "users_list")
    admins_file = os.path.join(bot_dir, "data", "admins_list")
    broadcast_file = os.path.join(bot_dir, "data", "broadcast_count")
    
    users_data = _rj(users_file, {})
    admins_data = _rj(admins_file, {})
    broadcast_data = _rj(broadcast_file, {"total_sent": 0, "total_received": 0})
    
    return {
        "total_users": len(users_data),
        "total_admins": len(admins_data),
        "broadcast_sent": broadcast_data.get("total_sent", 0),
        "broadcast_received": broadcast_data.get("total_received", 0),
    }


async def _send_broadcast(token: str, message_text: str, bot_dir: str, admin_id: str) -> tuple:
    """Send broadcast message to all users. Returns (sent_count, failed_count)."""
    users_file = os.path.join(bot_dir, "data", "users_list")
    users_data = _rj(users_file, {})
    
    sent_count = 0
    failed_count = 0
    broadcast_file = os.path.join(bot_dir, "data", "broadcast_count")
    broadcast_data = _rj(broadcast_file, {"total_sent": 0, "total_received": 0})
    
    for user_id in users_data.keys():
        try:
            result = await bot_call(token, "sendMessage", {
                "chat_id": user_id,
                "text": message_text,
                "parse_mode": "Markdown"
            })
            if result.get("ok"):
                sent_count += 1
                broadcast_data["total_received"] += 1
            else:
                failed_count += 1
        except Exception as e:
            print(f"Broadcast error for user {user_id}: {e}")
            failed_count += 1
    
    broadcast_data["total_sent"] += 1
    _wj(broadcast_file, broadcast_data)
    
    return sent_count, failed_count


def _add_admin(user_id, bot_dir: str) -> bool:
    """Add new admin user. Returns True if added, False if already admin."""
    key = f"{bot_dir}/data/admins_list"
    admins_data = _rj(key, {})
    user_key = str(user_id)
    
    if user_key in admins_data:
        return False
    
    admins_data[user_key] = {
        "user_id": user_id,
        "added_at": str(__import__('datetime').datetime.now())
    }
    _wj(key, admins_data)
    return True


def _remove_admin(user_id, bot_dir: str) -> bool:
    """Remove admin user. Returns True if removed, False if not found."""
    key = f"{bot_dir}/data/admins_list"
    admins_data = _rj(key, {})
    user_key = str(user_id)
    
    if user_key not in admins_data:
        return False
    
    del admins_data[user_key]
    _wj(key, admins_data)
    return True


def _get_admins_list(bot_dir: str) -> dict:
    """Get all admins list."""
    key = f"{bot_dir}/data/admins_list"
    return _rj(key, {})


def _get_bot_status(bot_dir: str) -> str:
    """Get bot status: 'on' or 'off'."""
    key = f"{bot_dir}/data/bot_status"
    status = _rf(key, "on")
    return status.strip() or "on"


def _set_bot_status(bot_dir: str, status: str) -> None:
    """Set bot status: 'on' or 'off'."""
    key = f"{bot_dir}/data/bot_status"
    _wf(key, status)


# ═══════════════════════════════════════════════════════════════════════════
# Keyboard builders (used multiple times in the file)
# ═══════════════════════════════════════════════════════════════════════════

def _media_kbd(setting: dict) -> str:
    t   = setting.get("twasl", {})
    m1  = t.get("modetext1",  "✅")
    m2  = t.get("modetext2",  "✅")
    m3  = t.get("modetext3",  "✅")
    m4  = t.get("modetext4",  "✅")
    m5  = t.get("modetext5",  "✅")
    m6  = t.get("modetext6",  "✅")
    m7  = t.get("modetex7",   "✅")   # typo preserved from PHP (modetex7, not modetext7)
    m8  = t.get("modetext8",  "✅")
    m9  = t.get("modetext9",  "✅")
    m10 = t.get("modetext10", "✅")
    return json.dumps({"inline_keyboard": [
        [{"text": "الصور ",         "callback_data": "#"}, {"text": m1,  "callback_data": "photo"}],
        [{"text": "الموسيقي ",      "callback_data": "#"}, {"text": m2,  "callback_data": "music"}],
        [{"text": "الملفات ",       "callback_data": "#"}, {"text": m3,  "callback_data": "file"}],
        [{"text": "الملصقات  ",     "callback_data": "#"}, {"text": m4,  "callback_data": "stick"}],
        [{"text": "االفيديو ",      "callback_data": "#"}, {"text": m5,  "callback_data": "video"}],
        [{"text": "الصوتيات ",      "callback_data": "#"}, {"text": m6,  "callback_data": "mov"}],
        [{"text": "جهه الاتصال ",   "callback_data": "#"}, {"text": m7,  "callback_data": "contact"}],
        [{"text": "اعاده توجيه ",   "callback_data": "#"}, {"text": m8,  "callback_data": "i3ad"}],
        [{"text": "جميع الروابط ",  "callback_data": "#"}, {"text": m9,  "callback_data": "alllink"}],
        [{"text": "روابط تيلجرام ", "callback_data": "#"}, {"text": m10, "callback_data": "linktele"}],
        [{"text": "رجوع",           "callback_data": "back"}],
    ]})


def _bot9_kbd(setting: dict) -> str:
    t        = setting.get("twasl", {})
    typeing  = t.get("type",    "✅")
    replymod = t.get("replymod","✅")
    return json.dumps({"inline_keyboard": [
        [{"text": f"جاري الكتابه : {typeing}", "callback_data": "onbott"},
         {"text": "رد على الرسائل",            "callback_data": "estgbalon"}],
        [{"text": "تعين رساله الاستلام",       "callback_data": "msrd"},
         {"text": "تعين رساله الترحيب",        "callback_data": "setstart"}],
        [{"text": "قائمه الاومر",               "callback_data": "hmaih"}],
        [{"text": "مكان الاستلام للرسائل  ",    "callback_data": "bbuio"}],
        [{"text": "الوسائط الممنوعة",           "callback_data": "man3er"}],
        [{"text": "📢 الإذاعة",                 "callback_data": "broadcast_menu"},
         {"text": "📊 الإحصائيات",              "callback_data": "show_stats"}],
        [{"text": "👥 إدارة الأدمنية",        "callback_data": "manage_admins"},
         {"text": "🔌 حالة البوت",              "callback_data": "bot_status_menu"}],
        [{"text": "رجوع",                       "callback_data": "back"}],
    ]})


# ═══════════════════════════════════════════════════════════════════════════
# Main async handler
# ═══════════════════════════════════════════════════════════════════════════

async def handle_namero4(
    update:    dict,
    bot_dir:   str,
    token:     str,
    NaMerOset: dict,
    makerinve: dict,
) -> None:

    # ── local path helper ──────────────────────────────────────────────────
    def p(*parts) -> str:
        return os.path.join(bot_dir, *parts)

    # ── extract update fields ──────────────────────────────────────────────
    message  = update.get("message") or {}
    callback = update.get("callback_query") or {}

    chat_id    = 0
    from_id    = 0
    text       = ""
    data       = ""
    message_id = 0
    name       = ""
    user       = ""

    if message:
        chat_id    = message.get("chat", {}).get("id", 0)
        from_id    = message.get("from", {}).get("id", 0)
        text       = message.get("text", "") or ""
        message_id = message.get("message_id", 0)
        name       = message.get("from", {}).get("first_name", "") or ""
        user       = (message.get("from", {}).get("username") or "").lower()

    if callback:
        data       = callback.get("data", "") or ""
        chat_id    = callback.get("message", {}).get("chat", {}).get("id", 0)
        message_id = callback.get("message", {}).get("message_id", 0)
        from_id    = callback.get("from", {}).get("id", 0)
        name       = callback.get("from", {}).get("first_name", "") or ""
        user       = (callback.get("from", {}).get("username") or "").lower()

    S_P_P1    = data or text
    chat_type = message.get("chat", {}).get("type", "private")
    caption   = message.get("caption") or ""

    reply_msg = message.get("reply_to_message") or {}
    reply_id  = reply_msg.get("message_id", 0)

    photo    = message.get("photo")
    video    = message.get("video")
    document = message.get("document")
    sticker  = message.get("sticker")
    voice    = message.get("voice")
    audio    = message.get("audio")
    forward  = message.get("forward_from_chat")

    # ── admin & sudo ───────────────────────────────────────────────────────
    admin    = _rf(p("admin"))

    # include config developer/admins plus legacy construct
    sudo_ids = set()
    if admin:
        sudo_ids.add(str(admin))
    sudo_ids.add(str(config.DEVELOPER_ID))
    for adm in getattr(config, "ADMIN_IDS", []):
        sudo_ids.add(str(adm))

    # adminall comes from NaMerOset (equivalent of SALEH.php's $adminall)
    raw_adminall = NaMerOset.get("adminall", [])
    if isinstance(raw_adminall, str):
        adminall = [x.strip() for x in raw_adminall.splitlines() if x.strip()]
    elif isinstance(raw_adminall, list):
        adminall = [str(x) for x in raw_adminall if x]
    else:
        adminall = []

    def is_admin(uid) -> bool:
        return str(uid) in sudo_ids or str(uid) in adminall

    # ── info ───────────────────────────────────────────────────────────
    info_lines  = _rf(p("info")).split("\n")
    usernamebot = info_lines[1] if len(info_lines) > 1 else ""
    no3mak      = info_lines[6] if len(info_lines) > 6 else ""

    # ── welcome message ────────────────────────────────────────────────────
    if NaMerOset.get("wellcom"):
        start = NaMerOset["wellcom"]
    else:
        start = (
            f"\n• اهلا بك ([{name}](tg://user?id={from_id})) في البوت الخاص بي ❤\n"
            "- هذه هي الرسالة الافتراضية لانك لم تقم بإضافة رسالة ترحيب بعد.\n"
        )

    # ── keyboards ─────────────────────────────────────────────────────────
    def build_keyboard() -> str:
        kb = {"inline_keyboard": [[{"text": name, "callback_data": "jghhg"}]]}
        azrari = NaMerOset.get("azrari", [])
        if azrari:
            row = []
            for btn in azrari:
                row.append({"text": btn, "callback_data": btn})
                if len(row) == 2:
                    kb["inline_keyboard"].append(row)
                    row = []
            if row:
                kb["inline_keyboard"].append(row)
        return json.dumps(kb)

    def back_keyboard() -> str:
        return json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "home"}]]})

    # ══════════════════════════════════════════════════════════════════════
    # Initialize directories and setting FIRST (before /start check)
    # ══════════════════════════════════════════════════════════════════════
    _mkdir(p("sudo"))
    _mkdir(p("data"))
    _mkdir(p("message"))
    _mkdir(p("ms"))
    _mkdir(p("count"))
    _mkdir(p("count", "user"))
    _mkdir(p("count", "admin"))

    setting_path = p("setting")
    setting      = _rj(setting_path)
    if not setting or not setting.get("twasl"):
        setting = {
            "twasl": {
                "type":       "✅",
                "replymod":   "✅",
                "modetext1":  "✅",
                "modetext2":  "✅",
                "modetext3":  "✅",
                "modetext4":  "✅",
                "modetext5":  "✅",
                "modetext6":  "✅",
                "modetex7":   "✅",
                "modetext8":  "✅",
                "modetext9":  "✅",
                "modetext10": "✅",
            }
        }
        _wj(setting_path, setting)

    twasl    = setting.get("twasl", {})
    typeing  = twasl.get("type",    "✅")
    replymod = twasl.get("replymod","✅")

    # ══════════════════════════════════════════════════════════════════════
    # /start
    # ══════════════════════════════════════════════════════════════════════
    if text == "/start":
        # Check if user is new and notify admins
        is_new_user = _track_user(from_id, name, bot_dir)
        if is_new_user:
            # Notify admins of new user
            new_user_msg = (
                f"🆕 *مستخدم جديد!*\n\n"
                f"👤 الاسم: [{name}](tg://user?id={from_id})\n"
                f"🆔 المعرّف: `{from_id}`\n"
                f"📍 Username: @{user}" if user else "بدون معرّف"
            )
            try:
                await bot_call(token, "sendMessage", {
                    "chat_id": admin,
                    "text": new_user_msg,
                    "parse_mode": "Markdown",
                })
            except:
                pass
        
        # إذا كان Admin، عرض لحة التحكم الكاملة
        if is_admin(from_id):
            await bot_call(token, "sendMessage", {
                "chat_id":    chat_id,
                "text": (
                    "◾️ إعدادات بوت التواصل ⚙️ .\n\n"
                    "▫️ ↴ أهلا بك في لحة التحكم! يمكنك تغيير إعدادات البوت و تخصيص الإعدادات كم تريد .\n"
                ),
                "parse_mode":   "MarkDown",
                "reply_markup": _bot9_kbd(setting),
            })
        else:
            # رسالة ترحيب عادية للمستخدمين العاديين
            await bot_call(token, "sendMessage", {
                "chat_id":                  chat_id,
                "text":                     start,
                "parse_mode":               "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup":             build_keyboard(),
            })

    # ══════════════════════════════════════════════════════════════════════
    # home callback — return to main menu
    # ══════════════════════════════════════════════════════════════════════
    if data == "home":
        await bot_call(token, "editMessageText", {
            "chat_id":                  chat_id,
            "message_id":               message_id,
            "text":                     start,
            "parse_mode":               "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup":             build_keyboard(),
        })

    # ══════════════════════════════════════════════════════════════════════
    # azrari button press — show custom button content
    # ══════════════════════════════════════════════════════════════════════
    if S_P_P1 and NaMerOset.get("azrar", {}).get(S_P_P1, {}).get("text"):
        army = NaMerOset["azrar"][S_P_P1]["text"]
        await bot_call(token, "editMessageText", {
            "chat_id":                  chat_id,
            "message_id":               message_id,
            "text":                     army,
            "disable_web_page_preview": True,
            "reply_markup":             back_keyboard(),
        })

    # ── sendmessage helper: refresh the bot9 settings panel ───────────────
    async def _sendmessage() -> None:
        s2 = _rj(setting_path)
        await bot_call(token, "editMessageText", {
            "chat_id":                  chat_id,
            "message_id":               message_id,
            "text": (
                "◾️ إعدادات بوت التواصل ⚙️ .\n\n"
                "▫️ ↴ يمكنك تغيير إعدادات البوت و تخصيص الإعدادات كم تريد .\n"
            ),
            "disable_web_page_preview": True,
            "reply_markup":             _bot9_kbd(s2),
        })

    # ══════════════════════════════════════════════════════════════════════
    # bot9 / toch — communication settings panel
    # ══════════════════════════════════════════════════════════════════════
    if data in ("bot9", "toch"):
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "◾️ إعدادات بوت التواصل ⚙️ .\n\n"
                "▫️ ↴ يمكنك تغيير إعدادات البوت و تخصيص الإعدادات كم تريد .\n"
            ),
            "parse_mode":   "MarkDown",
            "reply_markup": _bot9_kbd(setting),
        })
        setting["twasl"]["moder"] = "s"
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # bromk — toggle message receive on/off
    # ══════════════════════════════════════════════════════════════════════
    if data == "bromk":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "◾️ إعدادات بوت التواصل ⚙️ .\n\n"
                "▫️ ↴ يمكنك تغيير إعدادات البوت و تخصيص الإعدادات كم تريد .\n"
            ),
            "reply_to_message_id": message.get("message_id"),
            "parse_mode":   "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "تفعيل التواصل ✅",  "callback_data": "estgbalon"},
                 {"text": "تعطيل التواصل ❌ ", "callback_data": "estgbaloff"}],
            ]}),
        })
        setting["twasl"]["moder"] = "s"
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # bbuio — choose message receive location
    # ══════════════════════════════════════════════════════════════════════
    if data == "bbuio":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "◾️ إعدادات مكان استلام الرسائل  .\n\n"
                "▫️ ↴ اختر المكان الاتي تريد استقبال الرسائل فيها .\n"
            ),
            "parse_mode":   "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "في الخاص ",    "callback_data": "typee"},
                 {"text": "في المجموعة  ", "callback_data": "supergruope"}],
                [{"text": "رجوع", "callback_data": "back"}],
            ]}),
        })
        setting["twasl"]["moder"] = "s"
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # hmaih — list of text commands
    # ══════════════════════════════════════════════════════════════════════
    if data == "hmaih":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "↴قائمة اﻷوامر .\n"
                "⚠️ جميع هذه الإوامر مع الرد على الرسالة .\n\n"
                "▫️ارسل قفل او فتح الاومر التاليه :\n\n"
                "🔸 الصور \n"
                "🔸 الملصقات\n"
                "🔸 الفديو \n"
                "🔸 الملفات \n"
                "🔸 التوجيه \n"
                "🔸 الصوت \n"
                "🔸 الميوزك \n"
                "🔸 الروابط \n"
                "🔸 التوجيه \n"
                "🔸 قفل الكل : لقفل جميع الوسائط \n"
                "🔸 فتح الكل : لفتح جميع الوسائط \n"
                "▫️ حظر = لحظر شخص\n"
                "▫️ الغاء حظر = لالغاء حظر عن شخص\n"
                "▫️ معلومات = لعرض معلومات المستخدم\n\n"
                "🛂 ملاحظه اذا اردت ارسال امر على سبيل المثال : قفل الصور او فتح الصور  ،\n"
            ),
            "parse_mode":   "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": " رجوع ", "callback_data": "bot9"}],
            ]}),
        })

    # ══════════════════════════════════════════════════════════════════════
    # man3er — media restrictions panel (admin only)
    # ══════════════════════════════════════════════════════════════════════
    if data == "man3er" and str(chat_id) == str(admin):
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "• الوسائط الممنوع إرسالها لك  🤖،\n\n"
                "- ملاحظة🔭 :\n\n"
                "✅  =  تعني - ممكن إرسالها لك،\n\n"
                "❌  =  تعني - غير مسموح إرسالها لك،\n\n"
            ),
            "disable_web_page_preview": True,
            "message_id":   message_id,
            "reply_markup": _media_kbd(setting),
        })
        setting["twasl"]["moder"] = "links"
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # Media toggle buttons (photo/music/file/stick/video/mov/contact/i3ad/alllink/linktele)
    # Each shows the media panel and, if admin, toggles that setting key
    # ══════════════════════════════════════════════════════════════════════
    _MEDIA_TOGGLE_MAP = {
        "photo":    "modetext1",
        "music":    "modetext2",
        "file":     "modetext3",
        "stick":    "modetext4",
        "video":    "modetext5",
        "mov":      "modetext6",
        "contact":  "modetex7",   # typo preserved from PHP
        "i3ad":     "modetext8",
        "alllink":  "modetext9",
        "linktele": "modetext10",
    }

    if data in _MEDIA_TOGGLE_MAP:
        s2 = _rj(setting_path)
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "• الوسائط الممنوع إرسالها لك  🤖،\n\n"
                "- ملاحظة🔭 :\n\n"
                "✅  =  تعني - ممكن إرسالها لك،\n\n"
                "❌  =  تعني - غير مسموح إرسالها لك،\n\n"
            ),
            "disable_web_page_preview": True,
            "message_id":   message_id,
            "reply_markup": _media_kbd(s2),
        })
        if str(chat_id) == str(admin):
            key     = _MEDIA_TOGGLE_MAP[data]
            current = s2.get("twasl", {}).get(key, "✅")
            s2.setdefault("twasl", {})[key] = "❌" if current == "✅" else "✅"
            _wj(setting_path, s2)
            await _sendmessage()

    # ══════════════════════════════════════════════════════════════════════
    # setsta / setstart — prompt admin to enter welcome message
    # ══════════════════════════════════════════════════════════════════════
    if data in ("setsta", "setstart") and str(chat_id) == str(admin):
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "▫️ إرسل رسالة الترحيب التي تريد:\n"
                "▪️ يمكنك إستخدام الـMarkdown .\n"
                "-\n"
                "-\n"
            ),
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "• رجوع •", "callback_data": "bot9"}],
            ]}),
        })
        setting["twasl"]["mode"] = "set2"
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # Receive welcome message text when mode == "set2"
    # ══════════════════════════════════════════════════════════════════════
    if text and setting.get("twasl", {}).get("mode") == "set2" and str(chat_id) == str(admin):
        await bot_call(token, "sendMessage", {
            "chat_id":                  chat_id,
            "message_id":               message_id,
            "text":                     f"\n{text}\n",
            "disable_web_page_preview": True,
            "parse_mode":               "markdown",
        })
        await bot_call(token, "sendMessage", {
            "chat_id":                  chat_id,
            "message_id":               message_id,
            "text":                     "\n",
            "disable_web_page_preview": True,
            "parse_mode":               "markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "• رجوع •", "callback_data": "bot9"}],
            ]}),
        })
        setting["twasl"]["start"] = text
        setting["twasl"]["mode"]  = None
        _wj(setting_path, setting)

    # ══════════════════════════════════════════════════════════════════════
    # onbott — toggle typing indicator
    # ══════════════════════════════════════════════════════════════════════
    if data == "onbott" and str(chat_id) == str(admin):
        s2 = _rj(setting_path)
        cur = s2.get("twasl", {}).get("type", "✅")
        s2.setdefault("twasl", {})["type"] = "❌" if cur == "✅" else "✅"
        _wj(setting_path, s2)
        await _sendmessage()

    # ══════════════════════════════════════════════════════════════════════
    # replymod — toggle reply mode
    # ══════════════════════════════════════════════════════════════════════
    if data == "replymod" and str(chat_id) == str(admin):
        s2 = _rj(setting_path)
        cur = s2.get("twasl", {}).get("replymod", "✅")
        s2.setdefault("twasl", {})["replymod"] = "❌" if cur == "✅" else "✅"
        _wj(setting_path, s2)
        await _sendmessage()

    # ══════════════════════════════════════════════════════════════════════
    # Factory / maker settings from makerinve (equivalent of KhAlEdJ)
    # ══════════════════════════════════════════════════════════════════════
    st_ch_bots    = makerinve.get("st_ch_bots",    "")
    id_ch_sudo1   = makerinve.get("id_channel",    "")
    link_ch_sudo1 = makerinve.get("link_channel",  "")
    id_ch_sudo2   = makerinve.get("id_channel2",   "")
    link_ch_sudo2 = makerinve.get("link_channel2", "")
    user_bot_sudo = makerinve.get("user_bot",      "")

    # ══════════════════════════════════════════════════════════════════════
    # pro
    # ══════════════════════════════════════════════════════════════════════
    projson = _rj(p("pro"))
    pro     = projson.get("info", {}).get("pro")
    dateon  = projson.get("info", {}).get("dateon")
    dateoff = projson.get("info", {}).get("dateoff")

    txtfree = ""
    if pro != "yes" or pro is None:
        txtfree = (
            f'<a href="https://t.me/{user_bot_sudo}">'
            f'• اضغط هنا لنصع {no3mak} خاص بك </a>'
        )

    # ══════════════════════════════════════════════════════════════════════
    # Member and ban lists
    # ══════════════════════════════════════════════════════════════════════
    member_lines = [x for x in _rf(p("sudo", "member")).splitlines() if x.strip()]
    cunte        = len(member_lines)

    ban_content = _rf(p("data", "ban"))
    ban         = [x for x in ban_content.splitlines() if x.strip()]
    countban    = len(ban)

    ban2_content = _rf(p("sudo", "ban"))
    ban2         = [x for x in ban2_content.splitlines() if x.strip()]
    countban2    = len(ban2)

    # ══════════════════════════════════════════════════════════════════════
    # sudo/ state files
    # ══════════════════════════════════════════════════════════════════════
    amr     = _rf(p("sudo", "amr"))
    ch1     = _rf(p("sudo", "ch1"))
    ch2     = _rf(p("sudo", "ch2"))
    taf3il  = _rf(p("sudo", "tanbih"))
    estgbal = _rf(p("sudo", "estgbal"))

    # ══════════════════════════════════════════════════════════════════════
    # Subscription check for ch1 / ch2 (block user if not subscribed)
    # ══════════════════════════════════════════════════════════════════════
    if message:
        not_joined = False
        if ch1:
            j1     = await bot_get(token, "getChatMember", {"chat_id": ch1, "user_id": from_id})
            status1 = j1.get("result", {}).get("status", "left")
            if status1 in ("left", "kicked"):
                not_joined = True
        if ch2 and not not_joined:
            j2     = await bot_get(token, "getChatMember", {"chat_id": ch2, "user_id": from_id})
            status2 = j2.get("result", {}).get("status", "left")
            if status2 in ("left", "kicked"):
                not_joined = True
        if not_joined:
            ch1c = ch1.replace("@", "")
            ch2c = ch2.replace("@", "")
            await bot_call(token, "sendMessage", {
                "chat_id":                  chat_id,
                "reply_to_message_id":      message_id,
                "text":                     "\n\n",
                "disable_web_page_preview": True,
                "parse_mode":               "markdown",
                "reply_markup":             json.dumps({"inline_keyboard": []}),
            })
            return

    # ══════════════════════════════════════════════════════════════════════
    # typee — set receive destination to admin's private
    # ══════════════════════════════════════════════════════════════════════
    if data == "typee":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text":       "• تم التفعيل مسبقا !",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "typee"), str(from_id))

    # ══════════════════════════════════════════════════════════════════════
    # supergruope — set receive destination to a group
    # ══════════════════════════════════════════════════════════════════════
    if data == "supergruope":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "◾️ يمكنك استقبال الرسائل في مجموعتك انت وفريقك او اصدقائك  .\n\n"
                "▫️ ↴ اضغط على الزر من ثم قم بختيار المجموعة الاتي تريد استقبال الرسائل فيها ثم أرسل تفعيل،\n"
                "-\n"
            ),
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "• اضفني الى مجموعتك • ", "switch_inline_query": ""}],
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "amr"), "set")

    # ── activate group receive with "تفعيل" ───────────────────────────────
    if text == "تفعيل" and amr == "set" and str(from_id) in sudo_ids:
        _wf(p("sudo", "amr"), "")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text":    "- حسناا عزيزي تم تحديد الكروب بنجاح سيتم نشر الرسائل في الكروب✅ \".",
        })
        _wf(p("sudo", "typee"), str(chat_id))

    # ══════════════════════════════════════════════════════════════════════
    # estgbalon — enable message forwarding
    # ══════════════════════════════════════════════════════════════════════
    if data == "estgbalon":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text":       " - تم تفعيل الرد بنجاح ✅،",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "estgbal"), "on")

    # ══════════════════════════════════════════════════════════════════════
    # estgbaloff — disable message forwarding
    # ══════════════════════════════════════════════════════════════════════
    if data == "estgbaloff":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text":       ' تم تعطيل توجيه الرسائل ✅".',
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": 'رجوع ".', "callback_data": "bot9"}],
            ]}),
        })
        _unlink(p("sudo", "amr"))
        _unlink(p("sudo", "estgbal"))

    # ══════════════════════════════════════════════════════════════════════
    # msrd — prompt admin to set delivery message
    # ══════════════════════════════════════════════════════════════════════
    if data == "msrd":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text": (
                "▫️ إرسل رسالة التسليم التي تريد:\n"
                "▪️ يمكنك إستخدام الـMarkdown .\n"
                "-\n"
            ),
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "amr"), "msrd")

    # ── receive delivery message text when amr == "msrd" ──────────────────
    if text and amr == "msrd" and str(from_id) in sudo_ids:
        _unlink(p("sudo", "amr"))
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": (
                f"-  تم إضافة ( رسالة تسليم ) إلى بوت التواصل الخاص بك .\n"
                f"▫️ مثل على رسالة التسليم ( {text} ) 🥏\n"
            ),
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("data", "msrd"), text)

    # ══════════════════════════════════════════════════════════════════════
    # Resolve receive destination (yppee) and message counters
    # ══════════════════════════════════════════════════════════════════════
    yppee = _rf(p("sudo", "typee"))
    if not yppee:
        yppee = admin

    co_m_all = _ri(p("count", "user", "all"))
    co1      = co_m_all + 1

    # ── resolve replied-to message metadata ───────────────────────────────
    repp_id       = (reply_id - 1) if reply_id else 0
    msg_file_raw  = _rf(p("message", f"{repp_id}")) if reply_id else ""
    msg_parts     = msg_file_raw.split("=") if msg_file_raw else []
    n_id          = msg_parts[1] if len(msg_parts) > 1 else None

    msrd      = _rf(p("data", "msrd"))
    c_photo   = _rf(p("data", "photo"))
    c_video   = _rf(p("data", "video"))
    c_document= _rf(p("data", "document"))
    c_sticker = _rf(p("data", "sticker"))
    c_voice   = _rf(p("data", "voice"))
    c_audio   = _rf(p("data", "audio"))
    c_forward = _rf(p("data", "forward"))   # PHP had a bug using audio here; using correct forward

    # ══════════════════════════════════════════════════════════════════════
    # Forward text message from user to admin
    # ══════════════════════════════════════════════════════════════════════
    _EXCLUDE_TEXTS = {
        "/start", "جهة اتصال المدير☎️", "⚜️〽️┇قناه البوت",
        "ارفعني", "القوانين ⚠️", "معلومات المدير 📋",
        "المساعده 💡", "اطلب بوتك من المطور",
    }

    if (
        text
        and text not in _EXCLUDE_TEXTS
        and chat_type == "private"
        and str(from_id) != str(admin)
    ):
        if str(from_id) not in [str(b) for b in ban]:
            if estgbal == "on" or not estgbal:
                await bot_call(token, "sendMessage", {
                    "chat_id":                  yppee,
                    "text":                     "\n",
                    "reply_to_message_id":      (reply_id - 1) if reply_id else None,
                    "parse_mode":               "MarkDown",
                    "disable_web_page_preview": True,
                })
                get_fwd = await bot_call(token, "forwardMessage", {
                    "chat_id":      yppee,
                    "from_chat_id": chat_id,
                    "message_id":   message_id,
                })
                fwd_msg_id    = (get_fwd.get("result", {}).get("message_id", 0)) - 1
                from_id_name  = f"{chat_id}={name}={message_id}"
                _wf(p("message", f"{fwd_msg_id}"), from_id_name)

                co_m_us = _ri(p("count", "user", f"{from_id}"))
                _wf(p("count", "user", f"{from_id}"), str(co_m_us + 1))
                _wf(p("count", "user", "all"), str(co1))

                if msrd:
                    await bot_call(token, "sendMessage", {
                        "chat_id":           chat_id,
                        "text":              f"{msrd} ",
                        "reply_to_message_id": message_id,
                    })
                else:
                    await bot_call(token, "sendMessage", {
                        "chat_id":           chat_id,
                        "text":              "• تم ارسال رسالتك الى الادمن سيتم الرد عليك في اسرع وقت ✅",
                        "reply_to_message_id": message_id,
                    })
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "تم ايقاف استقبال الرسائل ",
                    "reply_to_message_id": message_id,
                })
        else:
            await bot_call(token, "sendMessage", {
                "chat_id":           chat_id,
                "text":              "لاتستيطع استخدام البوت  محظور",
                "reply_to_message_id": message_id,
            })

    # ══════════════════════════════════════════════════════════════════════
    # Admin replies to user via reply-to-message
    # ══════════════════════════════════════════════════════════════════════
    if (
        reply_id
        and text not in ("الغاء الحظر", "حظر", "معلومات")
        and str(chat_id) == str(yppee)
        and n_id is not None
    ):
        if is_admin(from_id):
            user_chat_id = msg_parts[0] if msg_parts else ""
            user_name    = msg_parts[1] if len(msg_parts) > 1 else ""
            orig_msg_id  = msg_parts[2] if len(msg_parts) > 2 else ""
            sent_msg_id  = 0

            if text:
                get_r = await bot_call(token, "sendMessage", {
                    "chat_id":           user_chat_id,
                    "text":              text,
                    "reply_to_message_id": orig_msg_id,
                })
                sent_msg_id = get_r.get("result", {}).get("message_id", 0)
            else:
                sens    = None
                file_id = None
                ss      = None
                if photo:
                    photos = update.get("message", {}).get("photo") or []
                    file_id = photos[-1].get("file_id", "") if photos else ""
                    sens = "sendPhoto"; ss = "photo"
                elif document:
                    file_id = document.get("file_id", "")
                    sens = "sendDocument"; ss = "document"
                elif video:
                    file_id = video.get("file_id", "")
                    sens = "sendVideo"; ss = "video"
                elif audio:
                    file_id = audio.get("file_id", "")
                    sens = "sendAudio"; ss = "audio"
                elif voice:
                    file_id = voice.get("file_id", "")
                    sens = "sendVoice"; ss = "voice"
                elif sticker:
                    file_id = sticker.get("file_id", "")
                    sens = "sendSticker"; ss = "sticker"

                if sens and file_id:
                    get_r = await bot_call(token, sens, {
                        "chat_id":           user_chat_id,
                        ss:                  file_id,
                        "reply_to_message_id": orig_msg_id,
                    })
                    sent_msg_id = get_r.get("result", {}).get("message_id", 0)

            wathqid = f"{user_chat_id}={sent_msg_id}={user_name}"
            _wf(p("message", f"{sent_msg_id}"), wathqid)

            co_m_ad = _ri(p("count", "admin", f"{user_chat_id}"))
            _wf(p("count", "admin", f"{user_chat_id}"), str(co_m_ad + 1))
            co_m_all2 = _ri(p("count", "admin", "all"))
            _wf(p("count", "admin", "all"), str(co_m_all2 + 1))

            await bot_call(token, "sendMessage", {
                "chat_id":                  yppee,
                "text":                     f"-  تم الارسال بنجاح  [{user_name}](tg://user?id={user_chat_id}) ✉️\n",
                "reply_to_message_id":      message_id,
                "parse_mode":               "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": json.dumps({"inline_keyboard": [
                    [{"text": " تعديل الرسالة ", "callback_data": f"edit_msg {sent_msg_id}"}],
                    [{"text": " حذف الرسالة ",   "callback_data": f"del_msg {sent_msg_id}"}],
                ]}),
            })

    # ══════════════════════════════════════════════════════════════════════
    # del_msg — delete a sent message
    # ══════════════════════════════════════════════════════════════════════
    del_match = re.match(r'^del_msg (.+)$', data or "", re.S)
    if del_match and is_admin(from_id):
        wathqid = del_match.group(1)
        info    = _rf(p("message", f"{wathqid}")).split("=")
        ch_id_d = info[0] if info else ""
        msg_id_d= info[1] if len(info) > 1 else ""
        nm_id_d = info[2] if len(info) > 2 else ""
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text":       "-  تم حذف رسالة بنجاح 🗑\n\n",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        await bot_call(token, "deleteMessage", {
            "chat_id":    ch_id_d,
            "message_id": msg_id_d,
        })

    # ══════════════════════════════════════════════════════════════════════
    # edit_msg — start editing a sent message
    # ══════════════════════════════════════════════════════════════════════
    edit_match = re.match(r'^edit_msg (.+)$', data or "", re.S)
    if edit_match and is_admin(from_id):
        wathqid  = edit_match.group(1)
        info     = _rf(p("message", f"{wathqid}")).split("=")
        ch_id_e  = info[0] if info else ""
        msg_id_e = info[1] if len(info) > 1 else ""
        nm_id_e  = info[2] if len(info) > 2 else ""
        _wf(p("data", "t3dil"), f"{ch_id_e}={msg_id_e}={nm_id_e}")
        await bot_call(token, "sendMessage", {
            "chat_id":                  chat_id,
            "text":                     "- قم بارسال رسالتك الجديده ليتم تعديل رسالتك ✉️\n",
            "reply_to_message_id":      message_id,
            "parse_mode":               "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "amr"), "edit")

    # ══════════════════════════════════════════════════════════════════════
    # trag3 — cancel editing
    # ══════════════════════════════════════════════════════════════════════
    if data == "trag3":
        await bot_call(token, "editMessageText", {
            "chat_id":    chat_id,
            "message_id": message_id,
            "text":       "تم الغاء التعديل بنجاح",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رجوع ", "callback_data": "bot9"}],
            ]}),
        })
        _wf(p("sudo", "amr"), "")
        _wf(p("data", "t3dil"), "")

    # ══════════════════════════════════════════════════════════════════════
    # edit mode: admin sends new message text
    # ══════════════════════════════════════════════════════════════════════
    if text and amr == "edit" and str(chat_id) == str(yppee) and is_admin(from_id):
        _wf(p("sudo", "amr"), "")
        wathqget  = _rf(p("data", "t3dil"))
        wathqidd  = wathqget.split("=")
        ch_id_ed  = wathqidd[0] if wathqidd else ""
        msg_id_ed = wathqidd[1] if len(wathqidd) > 1 else ""
        nm_id_ed  = wathqidd[2] if len(wathqidd) > 2 else ""

        await bot_call(token, "deleteMessage", {"chat_id": chat_id, "message_id": message_id - 2})
        await bot_call(token, "deleteMessage", {"chat_id": chat_id, "message_id": message_id - 1})

        await bot_call(token, "sendMessage", {
            "chat_id":                  chat_id,
            "text":                     f"- تم التعديل رساله سابقة للمستخدم  [{nm_id_ed}](tg://user?id={ch_id_ed}) ✉️",
            "reply_to_message_id":      message_id,
            "parse_mode":               "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": " تعديل الرسالة ", "callback_data": f"edit_msg {msg_id_ed}"},
                 {"text": " حذف الرسالة ",   "callback_data": f"del_msg {msg_id_ed}"}],
            ]}),
        })
        _wf(p("data", "t3dil"), "")
        await bot_call(token, "editMessageText", {
            "chat_id":    ch_id_ed,
            "message_id": msg_id_ed,
            "text":       text,
        })

    # ══════════════════════════════════════════════════════════════════════
    # حظر via text command: "حظر <ID>"
    # ══════════════════════════════════════════════════════════════════════
    ban_cmd = re.match(r'^حظر (.+)$', text or "", re.S)
    if ban_cmd and str(chat_id) == str(yppee) and is_admin(from_id):
        textt  = ban_cmd.group(1).replace(" ", "")
        if len(textt) < 10:
            if textt not in ban:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "تم حظر الشخص من البوت",
                    "reply_to_message_id": message_id,
                })
                await bot_call(token, "sendMessage", {"chat_id": textt, "text": ""})
                _af(p("data", "ban"), f"{textt}\n")
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "• العضو محظور مسبقآ.!",
                    "reply_to_message_id": message_id,
                })

    # ══════════════════════════════════════════════════════════════════════
    # الغاء حظر via text command: "الغاء حظر <ID>"
    # ══════════════════════════════════════════════════════════════════════
    unban_cmd = re.match(r'^الغاء حظر (.+)$', text or "", re.S)
    if unban_cmd and str(chat_id) == str(yppee) and is_admin(from_id):
        textt = unban_cmd.group(1).replace(" ", "")
        if len(textt) < 10:
            if textt in ban:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              " الغاء حظر الشخص من البوت 🚫",
                    "reply_to_message_id": message_id,
                })
                await bot_call(token, "sendMessage", {"chat_id": textt, "text": ""})
                new_ban = ban_content.replace(f"{textt}\n", "")
                _wf(p("data", "ban"), new_ban)
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              " • العضو ليس محظور ❕❕",
                    "reply_to_message_id": message_id,
                })

    # ══════════════════════════════════════════════════════════════════════
    # حظر via reply-to-message
    # ══════════════════════════════════════════════════════════════════════
    if reply_id and text == "حظر" and str(chat_id) == str(yppee) and n_id is not None:
        if is_admin(from_id):
            from_user = msg_parts[0] if msg_parts else ""
            if str(from_user) not in [str(b) for b in ban]:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "تم حظر الشخص من البوت",
                    "reply_to_message_id": message_id,
                })
                await bot_call(token, "sendMessage", {"chat_id": from_user, "text": ""})
                _af(p("data", "ban"), f"{from_user}\n")
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "• العضو محظور مسبقآ.!",
                    "reply_to_message_id": message_id,
                })

    # ══════════════════════════════════════════════════════════════════════
    # الغاء الحظر via reply-to-message
    # ══════════════════════════════════════════════════════════════════════
    if reply_id and text == "الغاء الحظر" and str(chat_id) == str(yppee) and n_id is not None:
        if is_admin(from_id):
            from_user = msg_parts[0] if msg_parts else ""
            if str(from_user) in [str(b) for b in ban]:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "تم الغاء حظر الشخص من البوت 🚫",
                    "reply_to_message_id": message_id,
                })
                await bot_call(token, "sendMessage", {"chat_id": from_user, "text": ""})
                new_ban = ban_content.replace(f"{from_user}\n", "")
                _wf(p("data", "ban"), new_ban)
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "  • العضو ليس محظور ❕❕",
                    "reply_to_message_id": message_id,
                })

    # ══════════════════════════════════════════════════════════════════════
    # معلومات via reply — show user info to admin
    # ══════════════════════════════════════════════════════════════════════
    if reply_id and text == "معلومات" and str(chat_id) == str(yppee):
        if is_admin(from_id):
            from_user   = msg_parts[0] if msg_parts else ""
            chat_info   = await bot_get(token, "getChat", {"chat_id": from_user})
            r           = chat_info.get("result", {})
            u_name      = r.get("first_name", "")
            u_user      = r.get("username", "")
            bio_res     = await bot_get(token, "getChat", {"chat_id": from_id})
            bio         = bio_res.get("result", {}).get("bio", "")
            info_status = "محظور" if str(from_user) in [str(b) for b in ban] else "غير محظور"
            co_m_us2    = _ri(p("count", "user",  f"{from_user}"))
            co_m_ad2    = _ri(p("count", "admin", f"{from_user}"))
            photo_url   = f"http://telegram.me/{u_user}"
            await bot_call(token, "sendPhoto", {
                "chat_id": chat_id,
                "photo":   photo_url,
                "caption": (
                    f"👤| اسم المستخدم : [ {u_name}](tg://user?id={from_user})  .\n"
                    f"ℹ️| ايدي المستخدم : {from_user}\n"
                    f"📍| معرف المستخدم : *@{u_user}*\n"
                    f"🔎| حالة المستخدم : {info_status}\n"
                    f"✉️| عدد الرسائل المستلمة منة : {co_m_us2} \n"
                    f" 📬| عدد الرسائل المرسلة لة : {co_m_ad2} \n"
                ),
                "reply_to_message_id":      message_id,
                "parse_mode":               "MarkDown",
                "disable_web_page_preview": True,
            })

    # ══════════════════════════════════════════════════════════════════════
    # معلومات without reply — show full bot stats
    # ══════════════════════════════════════════════════════════════════════
    if text == "معلومات" and not reply_id and str(chat_id) == str(yppee):
        if is_admin(from_id):
            _unlink(p("sudo", "admins"))
            admins_text = ""
            for h, aid in enumerate(adminall):
                if aid:
                    ai_res  = await bot_get(token, "getChat", {"chat_id": aid})
                    ai      = ai_res.get("result", {})
                    ai_name = ai.get("first_name", "")
                    line    = f"{h+1} - [{ai_name}](tg://user?id={aid}) `{aid}`"
                    admins_text += line + "\n"
                    _af(p("sudo", "admins"), line + "\n")

            co_m_us3 = _ri(p("count", "user",  "all"))
            co_m_ad3 = _ri(p("count", "admin", "all"))

            await bot_call(token, "sendMessage", {
                "chat_id": chat_id,
                "text": (
                    "ℹ معلومات شاملة عن البوت  \n"
                    "~~~~~~~~~~~~~~~~~~~~~~~\n"
                    f"👮 - الادمنية : \n{admins_text}"
                    "--------------------\n"
                    f"👪 - عدد الاعضاء : {cunte}\n"
                    f"🚫 - المحضورين : {countban}\n"
                    "--------------------\n"
                    "📮 - الرسائل \n"
                    f"📩 - المستلمة :{co_m_us3}\n"
                    f"📬 - الصادرة :{co_m_ad3}\n\n\n"
                ),
                "reply_to_message_id":      message_id,
                "parse_mode":               "MarkDown",
                "disable_web_page_preview": True,
            })

    # ══════════════════════════════════════════════════════════════════════
    # Media forwarding helper
    # Forwards a media message from user to admin if the media type is allowed.
    # In the data files: ❌ = allowed/open, ✅ = locked/blocked, "" = allowed (default)
    # ══════════════════════════════════════════════════════════════════════
    async def _fwd_media(content_flag: str) -> None:
        if content_flag in ("❌", "") or not content_flag:
            if estgbal == "on" or not estgbal:
                await bot_call(token, "sendMessage", {
                    "chat_id":                  yppee,
                    "text":                     "\n",
                    "parse_mode":               "MarkDown",
                    "disable_web_page_preview": True,
                    "reply_to_message_id":      (reply_id - 1) if reply_id else None,
                })
                get_r  = await bot_call(token, "forwardMessage", {
                    "chat_id":      yppee,
                    "from_chat_id": chat_id,
                    "message_id":   message_id,
                })
                f_id   = (get_r.get("result", {}).get("message_id", 0)) - 1
                _wf(p("message", f"{f_id}"), f"{chat_id}={name}={message_id}")
                co_us = _ri(p("count", "user", f"{from_id}"))
                _wf(p("count", "user", f"{from_id}"), str(co_us + 1))
                _wf(p("count", "user", "all"), str(co1))
                if msrd:
                    await bot_call(token, "sendMessage", {
                        "chat_id":           chat_id,
                        "text":              f"{msrd}",
                        "reply_to_message_id": message_id,
                    })
                else:
                    await bot_call(token, "sendMessage", {
                        "chat_id":           chat_id,
                        "text":              "• تم ارسال رسالتك الى الادمن سيتم الرد عليك في اسرع وقت ✅",
                        "reply_to_message_id": message_id,
                    })
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id":           chat_id,
                    "text":              "تم ايقاف استقبال الرسائل ",
                    "reply_to_message_id": message_id,
                })
        else:
            await bot_call(token, "sendMessage", {
                "chat_id":           chat_id,
                "text":              "",
                "reply_to_message_id": message_id,
            })

    is_user_private = (str(from_id) != str(admin) and chat_type == "private")

    # ── الصور — photos ────────────────────────────────────────────────────
    if photo and not forward and is_user_private:
        await _fwd_media(c_photo)

    # ── الفيديو — videos ──────────────────────────────────────────────────
    if video and not forward and is_user_private:
        await _fwd_media(c_video)

    # ── الملفات — documents ───────────────────────────────────────────────
    if document and not forward and is_user_private:
        await _fwd_media(c_document)

    # ── الملصقات — stickers ───────────────────────────────────────────────
    if sticker and not forward and is_user_private:
        await _fwd_media(c_sticker)

    # ── الصوتيات — voice messages ─────────────────────────────────────────
    if voice and not forward and is_user_private:
        await _fwd_media(c_voice)

    # ── الصوتيات — audio files ────────────────────────────────────────────
    if audio and not forward and is_user_private:
        await _fwd_media(c_audio)

    # ── التوجية — forwarded messages ──────────────────────────────────────
    if forward and is_user_private:
        await _fwd_media(c_forward)

    # ══════════════════════════════════════════════════════════════════════
    # Link detection — block links if users == "مقفول"
    # ══════════════════════════════════════════════════════════════════════
    _LINK_MARKERS = ["t.me", "telegram.me", "https://", "://", "wWw.", "WwW.", "T.me/", "WWW."]
    text_or_cap   = (text or "") + (caption or "")
    if any(m in text_or_cap for m in _LINK_MARKERS):
        users_lock = _rf(p("data", "users"))
        if users_lock == "مقفول":
            await bot_call(token, "sendMessage", {
                "chat_id": chat_id,
                "text":    " يمنع ارسال الروابط .",
            })

    # ══════════════════════════════════════════════════════════════════════
    # Media lock/unlock text commands
    # ══════════════════════════════════════════════════════════════════════
    _LOCK_MAP = {
        "قفل الصور":    (p("data", "photo"),    "✅"),
        "فتح الصور":    (p("data", "photo"),    "❌"),
        "قفل الفيديو":  (p("data", "video"),    "✅"),
        "فتح الفيديو":  (p("data", "video"),    "❌"),
        "قفل الملفات":  (p("data", "document"), "✅"),
        "فتح الملفات":  (p("data", "document"), "❌"),
        "قفل الملصقات": (p("data", "sticker"),  "✅"),
        "فتح الملصقات": (p("data", "sticker"),  "❌"),
        "قفل الصوت":    (p("data", "voice"),    "✅"),
        "فتح الصوت":    (p("data", "voice"),    "❌"),
        "قفل الميوزك":  (p("data", "audio"),    "✅"),
        "فتح الميوزك":  (p("data", "audio"),    "❌"),
        "قفل التوجيه":  (p("data", "forward"),  "✅"),
        "فتح التوجيه":  (p("data", "forward"),  "❌"),
    }

    if text in _LOCK_MAP and str(from_id) in sudo_ids:
        lock_path, lock_val = _LOCK_MAP[text]
        _wf(lock_path, lock_val)
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text":    f" تم  {text} ✅",
        })

    # قفل الكل — lock all media types
    if text == "قفل الكل" and str(from_id) in sudo_ids:
        for fn in ("forward","audio","voice","sticker","document","video","photo"):
            _wf(p("data", fn), "✅")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text":    f" تم  {text} ✅",
        })

    # فتح الكل — unlock all media types
    if text == "فتح الكل" and str(from_id) in sudo_ids:
        for fn in ("forward","audio","voice","sticker","document","video","photo"):
            _wf(p("data", fn), "❌")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text":    f" تم  {text} ✅",
        })

    # ══════════════════════════════════════════════════════════════════════
    # New Features: Broadcast, Stats, Admin Management, Bot Status
    # ══════════════════════════════════════════════════════════════════════

    # Track new users when they first interact
    if message and str(from_id) != str(admin) and from_id:
        _track_user(from_id, name, bot_dir)

    # broadcast_menu — show broadcast options
    if data == "broadcast_menu" and is_admin(from_id):
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": "📢 *قائمة الإذاعة*\n\nاختر نوع الإذاعة:",
            "parse_mode": "Markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "📝 إذاعة نصية", "callback_data": "broadcast_text"}],
                [{"text": "🔙 رجوع", "callback_data": "bot9"}],
            ]}),
        })

    # broadcast_text — prompt for broadcast message
    if data == "broadcast_text" and is_admin(from_id):
        _wf(p("data", "broadcast_mode"), "waiting_for_message")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": "📝 أرسل الآن النص الذي تريد إذاعته لجميع المستخدمين:",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "❌ إلغاء", "callback_data": "bot9"}],
            ]}),
        })

    # Receive broadcast message and send it
    if text and _rf(p("data", "broadcast_mode")) == "waiting_for_message" and is_admin(from_id):
        _unlink(p("data", "broadcast_mode"))
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": "⏳ جاري إرسال الإذاعة...",
        })
        sent, failed = await _send_broadcast(token, text, bot_dir, str(from_id))
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": f"✅ تمّت الإذاعة!\n\n📤 تم الإرسال إلى: {sent}\n❌ فشل: {failed}",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🔙 رجوع", "callback_data": "bot9"}],
            ]}),
        })

    # show_stats — display statistics
    if data == "show_stats" and is_admin(from_id):
        stats = _get_stats(bot_dir)
        bot_status = _get_bot_status(bot_dir)
        stats_text = (
            "📊 *إحصائيات البوت*\n\n"
            f"👥 المستخدمون: {stats['total_users']}\n"
            f"👮 الأدمنية: {stats['total_admins']}\n"
            f"📢 الإذاعات المُرسلة: {stats['broadcast_sent']}\n"
            f"📥 الإذاعات المُستقبلة: {stats['broadcast_received']}\n"
            f"🔌 حالة البوت: {'✅ مُشغّل' if bot_status == 'on' else '❌ موقوف'}\n"
        )
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": stats_text,
            "parse_mode": "Markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🔙 رجوع", "callback_data": "bot9"}],
            ]}),
        })

    # manage_admins — admin management menu
    if data == "manage_admins" and is_admin(from_id):
        admins = _get_admins_list(bot_dir)
        admins_count = len(admins)
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": f"👥 *إدارة الأدمنية*\n\nعدد الأدمنية الحالية: {admins_count}",
            "parse_mode": "Markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "➕ إضافة أدمن", "callback_data": "add_admin_prompt"}],
                [{"text": "➖ حذف أدمن", "callback_data": "remove_admin_prompt"}],
                [{"text": "📋 قائمة الأدمنية", "callback_data": "list_admins"}],
                [{"text": "🔙 رجوع", "callback_data": "bot9"}],
            ]}),
        })

    # add_admin_prompt — ask for user ID to add as admin
    if data == "add_admin_prompt" and is_admin(from_id):
        _wf(p("data", "admin_mode"), "waiting_to_add")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": "👑 أرسل معرّف المستخدم (ID) الذي تريد إضافته كأدمن:",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "❌ إلغاء", "callback_data": "manage_admins"}],
            ]}),
        })

    # Receive user ID and add as admin
    if text and _rf(p("data", "admin_mode")) == "waiting_to_add" and is_admin(from_id):
        _unlink(p("data", "admin_mode"))
        try:
            new_admin_id = int(text.strip())
            if _add_admin(new_admin_id, bot_dir):
                await bot_call(token, "sendMessage", {
                    "chat_id": chat_id,
                    "text": f"✅ تمّ إضافة المستخدم {new_admin_id} كأدمن!",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "🔙 رجوع", "callback_data": "manage_admins"}],
                    ]}),
                })
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id": chat_id,
                    "text": f"⚠️ المستخدم {new_admin_id} أدمن بالفعل!",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "🔙 رجوع", "callback_data": "manage_admins"}],
                    ]}),
                })
        except ValueError:
            await bot_call(token, "sendMessage", {
                "chat_id": chat_id,
                "text": "❌ الرجاء إرسال معرّف صحيح!",
            })

    # remove_admin_prompt — ask for user ID to remove from admins
    if data == "remove_admin_prompt" and is_admin(from_id):
        _wf(p("data", "admin_mode"), "waiting_to_remove")
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": "🗑️ أرسل معرّف المستخدم (ID) الذي تريد حذفه من الأدمنية:",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "❌ إلغاء", "callback_data": "manage_admins"}],
            ]}),
        })

    # Receive user ID and remove from admins
    if text and _rf(p("data", "admin_mode")) == "waiting_to_remove" and is_admin(from_id):
        _unlink(p("data", "admin_mode"))
        try:
            remove_admin_id = int(text.strip())
            if _remove_admin(remove_admin_id, bot_dir):
                await bot_call(token, "sendMessage", {
                    "chat_id": chat_id,
                    "text": f"✅ تمّ حذف المستخدم {remove_admin_id} من الأدمنية!",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "🔙 رجوع", "callback_data": "manage_admins"}],
                    ]}),
                })
            else:
                await bot_call(token, "sendMessage", {
                    "chat_id": chat_id,
                    "text": f"⚠️ المستخدم {remove_admin_id} ليس أدمن!",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "🔙 رجوع", "callback_data": "manage_admins"}],
                    ]}),
                })
        except ValueError:
            await bot_call(token, "sendMessage", {
                "chat_id": chat_id,
                "text": "❌ الرجاء إرسال معرّف صحيح!",
            })

    # list_admins — show list of all admins
    if data == "list_admins" and is_admin(from_id):
        admins = _get_admins_list(bot_dir)
        if admins:
            admins_text = "👮 *قائمة الأدمنية:*\n\n"
            for idx, admin_id in enumerate(admins.keys(), 1):
                admins_text += f"{idx}. ID: {admin_id}\n"
        else:
            admins_text = "لا توجد أدمنية مضافة حتى الآن"
        
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": admins_text,
            "parse_mode": "Markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🔙 رجوع", "callback_data": "manage_admins"}],
            ]}),
        })

    # bot_status_menu — show bot status menu
    if data == "bot_status_menu" and is_admin(from_id):
        current_status = _get_bot_status(bot_dir)
        status_text = f"🔌 حالة البوت الحالية: {'✅ مُشغّل' if current_status == 'on' else '❌ موقوف'}"
        
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": status_text,
            "parse_mode": "Markdown",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "✅ تشغيل البوت", "callback_data": "bot_on"}],
                [{"text": "❌ إيقاف البوت", "callback_data": "bot_off"}],
                [{"text": "🔙 رجوع", "callback_data": "bot9"}],
            ]}),
        })

    # bot_on — enable bot
    if data == "bot_on" and is_admin(from_id):
        _set_bot_status(bot_dir, "on")
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": "✅ تمّ تشغيل البوت بنجاح!",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🔙 رجوع", "callback_data": "bot_status_menu"}],
            ]}),
        })

    # bot_off — disable bot
    if data == "bot_off" and is_admin(from_id):
        _set_bot_status(bot_dir, "off")
        await bot_call(token, "editMessageText", {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": "❌ تمّ إيقاف البوت بنجاح!\nالمستخدمون العاديون لن يتمكّنوا من استخدام البوت.",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🔙 رجوع", "callback_data": "bot_status_menu"}],
            ]}),
        })

    # Check bot status — if bot is off, block non-admin users
    if message and not is_admin(from_id) and _get_bot_status(bot_dir) == "off":
        await bot_call(token, "sendMessage", {
            "chat_id": chat_id,
            "text": "🔌 البوت موقوف حالياً. يُرجى المحاولة لاحقاً.",
        })
        return


# ═══════════════════════════════════════════════════════════════════════════
# Polling runner — run when executed directly:
#   python namero4_handler.py <bot_dir>
#   Example: python namero4_handler.py botmak/mybotfolder
# ═══════════════════════════════════════════════════════════════════════════

_POLL_TIMEOUT = 30
_RETRY_DELAY  = 0.5  # تقليل من 5 إلى 0.5 ثانية
_MAX_ERRORS   = 10


async def _delete_webhook(token: str, name: str = "NAMERO4") -> None:
    result = await bot_get(token, "deleteWebhook", {"drop_pending_updates": False})
    if result.get("ok"):
        print(f"[{name}] ✅ تم حذف الويب هوك - جاهز للـ Polling")
    else:
        print(f"[{name}] ⚠️ deleteWebhook: {result.get('description')}")


async def _get_updates(token: str, offset: int) -> list:
    try:
        result = await bot_get(
            token,
            "getUpdates",
            {"offset": offset, "timeout": _POLL_TIMEOUT, "allowed_updates": []},
            timeout=_POLL_TIMEOUT + 10,
        )
        if result.get("ok"):
            return result.get("result", [])
    except Exception as e:
        print(f"[NAMERO4] getUpdates error: {e}")
    return []


async def _run_polling(bot_dir: str) -> None:
    token_path = os.path.join(bot_dir, "token")
    admin_path = os.path.join(bot_dir, "admin")

    if not file_exists(token_path):
        print(f"[NAMERO4] ❌ لم يتم العثور على {token_path}")
        return
    if not file_exists(admin_path):
        print(f"[NAMERO4] ❌ لم يتم العثور على {admin_path}")
        return

    token = read_file(token_path).strip()
    bot_name = os.path.basename(os.path.abspath(bot_dir))

    # load NaMerOset (zune) and makerinve (NameroF or ../KhAlEdJ)
    zune_path    = os.path.join(bot_dir, "zune")
    namero_path  = os.path.join(bot_dir, "NameroF")
    khaled_path  = os.path.join(bot_dir, "..", "KhAlEdJ")

    NaMerOset = read_json(zune_path, {})
    makerinve = read_json(namero_path, {})
    if not makerinve:
        makerinve = read_json(khaled_path, {}).get("info", {})

    if not token:
        print("[NAMERO4] ❌ token فارغ")
        return

    print("=" * 55)
    print("  NaMero Robots — NAMERO4 Bot Polling")
    print("  by @NameroBots | @S_P_P1")
    print(f"  المجلد : {bot_dir}")
    print("=" * 55)

    await _delete_webhook(token, bot_name)

    offset      = 0
    error_count = 0

    while True:
        try:
            updates = await _get_updates(token, offset)
            error_count = 0

            for update in updates:
                offset = update["update_id"] + 1
                try:
                    await handle_namero4(
                        update    = update,
                        bot_dir   = bot_dir,
                        token     = token,
                        NaMerOset = NaMerOset,
                        makerinve = makerinve,
                    )
                except Exception as e:
                    print(f"[{bot_name}] ❌ خطأ في التحديث {update.get('update_id')}: {e}")

            # بدون sleep - معالجة فورية

        except asyncio.CancelledError:
            print(f"[{bot_name}] ⛔ تم إيقاف الـ Polling")
            break
        except Exception as e:
            error_count += 1
            print(f"[{bot_name}] ❌ خطأ ({error_count}/{_MAX_ERRORS}): {e}")
            if error_count >= _MAX_ERRORS:
                await asyncio.sleep(1)  # تقليل التأخير
                error_count = 0
            else:
                await asyncio.sleep(0.5)  # تأخير أقصر


async def _main() -> None:
    bot_dir = sys.argv[1] if len(sys.argv) > 1 else "."

    if not os.path.isdir(bot_dir):
        print(f"[NAMERO4] ❌ المجلد غير موجود: {bot_dir}")
        sys.exit(1)

    loop = asyncio.get_running_loop()
    task = asyncio.create_task(_run_polling(bot_dir))

    def _stop(sig):
        print(f"\n[NAMERO4] إشارة إيقاف ({sig.name})")
        task.cancel()

    for sig in (signal.SIGINT, signal.SIGTERM):
        try:
            loop.add_signal_handler(sig, _stop, sig)
        except (NotImplementedError, RuntimeError):
            pass

    await asyncio.gather(task, return_exceptions=True)


if __name__ == "__main__":
    asyncio.run(_main())
