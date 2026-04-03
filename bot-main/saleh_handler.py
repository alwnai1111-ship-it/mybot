###by @NameroBots
##by @S_P_P1
### Programmer Namero (Rights are not allowed to change ⚡)

import os
import json
import re
import sys
import asyncio
import signal
import config
from bot_helper import (
    bot_call, bot_get, read_file, write_file, append_file,
    read_json, write_json, file_lines, ensure_dir, file_exists,
    delete_file, check_member, get_chat_admins_ok, extract_update_fields
)
from db_config import get_config

# ─────────────────────────────────────────────
# helpers
# ─────────────────────────────────────────────

def _split(s: str, sep: str) -> list:
    """Split and return at least 2 elements."""
    parts = s.split(sep) if s else []
    while len(parts) < 2:
        parts.append("")
    return parts


async def _bot(token: str, method: str, data: dict):
    return await bot_call(token, method, data)


async def _check_member_status(token: str, channel_id: str, user_id) -> bool:
    """Returns True if user is NOT a member (left/kicked)."""
    result = await bot_get(token, "getChatMember", {"chat_id": channel_id, "user_id": user_id})
    if not result.get("ok"):
        return True
    status = result.get("result", {}).get("status", "left")
    return status in ("left", "kicked")


# ─────────────────────────────────────────────
# keyboard builders
# ─────────────────────────────────────────────

def _back_kb():
    return json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "back"}]]})


def _chh_kb(zune: dict) -> str:
    typeinv = zune.get("typeinv", "قناة تليجرام")
    if typeinv == "قناة تليجرام":
        kb = {"inline_keyboard": [
            [{"text": "تعين القناة", "callback_data": "addch1"}, {"text": "مسح القناة", "callback_data": "OKDelCh1"}],
            [{"text": "تعين الكليشه", "callback_data": "mchc"}, {"text": "عرض رسالة الاشتراك", "callback_data": "chhii"}],
            [{"text": "حذف رسالة الاشتراك", "callback_data": "delchi"}],
            [{"text": "وضع الاداء :" + zune.get("chsii", ""), "callback_data": "#@chsii"},
             {"text": "اشعار الاشتراك :" + zune.get("chinv", ""), "callback_data": "#@chinv"}],
            [{"text": "ازرار شفافه :" + zune.get("xert", ""), "callback_data": "#@xert"},
             {"text": "ماركدون :" + zune.get("gher", ""), "callback_data": "#@gher"}],
            [{"text": "زر تحقق من الاشتراك:" + zune.get("zweyu", ""), "callback_data": "#@zweyu"}],
            [{"text": "قسم الاشتراك الثانوي", "callback_data": "secind"}],
            [{"text": "عرض كل القنوات", "callback_data": "geetallch"}],
            [{"text": "نوع الاشتراك الاجباري : " + typeinv, "callback_data": "typeinv"}],
            [{"text": "رجوع", "callback_data": "back"}],
        ]}
    else:
        kb = {"inline_keyboard": [
            [{"text": "تعين رابط الحساب", "callback_data": "addsoshql"},
             {"text": "مسح الاشتراك", "callback_data": "okdelsosh"}],
            [{"text": "عرض رسالة الاشتراك", "callback_data": "chppost"},
             {"text": "عرض الحساب", "callback_data": "getsosh"}],
            [{"text": "تغيير رسالة الاشتراك", "callback_data": "chprch"},
             {"text": "حذف رسالة الاشتراك", "callback_data": "delchip"}],
            [{"text": "قسم الاشتراك الثانوي", "callback_data": "secind"}],
            [{"text": "نوع الاشتراك الاجباري : " + typeinv, "callback_data": "typeinv"}],
            [{"text": "رجوع", "callback_data": "back"}],
        ]}
    return json.dumps(kb)


def _startadmin_kb(zune: dict) -> str:
    kb = {"inline_keyboard": [
        [{"text": "اخر تحديثات البوتات 🪢", "url": "https://t.me/Namerobots"}],
        [{"text": "عمل البوت :" + zune.get("bot", ""), "callback_data": "1#bot"},
         {"text": "اشعار الدخول :" + zune.get("well", ""), "callback_data": "1#well"}],
        [{"text": "الردود", "callback_data": "rdod"},
         {"text": "تعديل الازرار", "callback_data": "azrario"},
         {"text": "التوجيه :" + zune.get("sendad", ""), "callback_data": "1#sendad"}],
        [{"text": "(/start) رسالة الترحيب", "callback_data": "what"}],
        [{"text": "الاشتراك الاجباري", "callback_data": "ch"},
         {"text": "الادمنيه", "callback_data": "admin"}],
        [{"text": "الاذاعه", "callback_data": "tonum"},
         {"text": "الاحصائيات", "callback_data": "countall"}],
        [{"text": "• لوحة تحكم البوت •", "callback_data": "toch"}],
    ]}
    return json.dumps(kb)


# ─────────────────────────────────────────────
# main handler
# ─────────────────────────────────────────────

async def handle_saleh(token: str, bot_dir: str, update: dict, admin_id: str, ds: str = None, makerinve: dict = None) -> bool:
    """
    Full Python conversion of SALEH.php.
    token     – bot API token
    bot_dir   – directory where zune / allUser etc. live
    update    – parsed Telegram update dict
    admin_id  – the admin user id (string or int)
    ds        – developer special ID (optional)
    makerinve – factory-level settings dict (optional, equivalent to $makerinve in PHP)
    """
    if makerinve is None:
        makerinve = {}

    admin_id = str(admin_id) if admin_id else ""
    ds_id = str(ds) if ds else ""

    zune_path = os.path.join(bot_dir, "zune")
    alluser_path = os.path.join(bot_dir, "allUser")
    set_json_path = os.path.join(bot_dir, "set")
    namerof_path = os.path.join(bot_dir, "NameroF")

    # ── load settings ────────────────────────────────────────────────────
    zune = read_json(zune_path, {})

    # ── first-time defaults ───────────────────────────────────────────────
    if not zune.get("well"):
        zune["well"] = "✅"
        zune["sendad"] = "✅"
        zune["bot"] = "✅"
        zune["chinv"] = "✅"
        zune["chsii"] = "✅"
        zune["xert"] = "✅"
        zune["zweyu"] = "✅"
        zune["gher"] = "✅"
        zune["csgu"] = "✅"
        write_json(zune_path, zune)

    if not zune.get("typeinv"):
        zune["typeinv"] = "قناة تليجرام"
        write_json(zune_path, zune)

    if "info" in zune:
        del zune["info"]
        write_json(zune_path, zune)

    # ── parse update ──────────────────────────────────────────────────────
    f = extract_update_fields(update)
    msg = f["message"]
    cb = update.get("callback_query")
    ch_post = update.get("channel_post")

    namero_bots = str(f["from_id"]) if f["from_id"] is not None else ""
    namero_bots2 = str(cb["from"]["id"]) if cb and cb.get("from") else ""
    nameroch = f["chat_id"]
    nameroch2 = cb["message"]["chat"]["id"] if cb and cb.get("message") else None
    mnamero_id = f["message_id"]
    mnamero_id2 = cb["message"]["message_id"] if cb and cb.get("message") else None
    s_p_p1 = f["data"] or ""
    saleh_text = f["text"] or ""
    name = f["name"] or ""
    saleh_user = f["user"] or ""
    chat_type = f["chat_type"] or ""

    # sudo
    iidsod = zune.get("sudo") or admin_id
    admin = str(iidsod) if iidsod else ""
    ds_id = str(ds) if ds else ""
    if not ds_id:
        ds_id = str(getattr(config, "DEVELOPER_ID", ""))

    sudo_arr = zune.get("sudoarr", [])
    if not isinstance(sudo_arr, list):
        sudo_arr = []

    config_admins = [str(x) for x in getattr(config, "ADMIN_IDS", []) if x]
    effective_admins = set([a for a in [admin, ds_id] + config_admins if a])

    def is_super_admin(user_id: str) -> bool:
        return str(user_id) in effective_admins or str(user_id) in [str(x) for x in sudo_arr]

    # members
    all_users = file_lines(alluser_path)
    s_all = len(all_users)
    id_group = zune.get("idgroup", []) or []
    id_ch = zune.get("idch", []) or []
    s_all_gg = len(id_group)
    s_all_co = len(id_ch)
    band = zune.get("band", []) or []
    s_all_count = s_all + s_all_gg + s_all_co
    con = s_all_co + s_all_gg

    # split helpers for callback data
    mx = _split(s_p_p1, "@")
    rex = _split(s_p_p1, "#")
    vss = _split(s_p_p1, "#")
    deloch = _split(s_p_p1, "@")
    dellad = _split(s_p_p1, "^")

    # ── track new groups ──────────────────────────────────────────────────
    if msg and str(nameroch) not in id_group and chat_type == "supergroup":
        if "idgroup" not in zune:
            zune["idgroup"] = []
        zune["idgroup"].append(str(nameroch))
        write_json(zune_path, zune)
        id_group = zune["idgroup"]

    # ── track channels ────────────────────────────────────────────────────
    if ch_post:
        ch_id = ch_post.get("chat", {}).get("id")
        if ch_id and str(ch_id) not in id_ch:
            if "idch" not in zune:
                zune["idch"] = []
            zune["idch"].append(str(ch_id))
            write_json(zune_path, zune)
            id_ch = zune["idch"]

    # ── mandatory subscription check (primary channel) ────────────────────
    ch11 = zune.get("ch1")
    if ch11 and msg and chat_type == "private" and namero_bots != admin:
        status = await _check_member_status(token, ch11, namero_bots)
        if status:
            x = "https://t.me/" + ch11.replace("@", "")
            if not zune.get("chhi"):
                a = (
                    "🚸| عذرا عزيزي\n"
                    "🔰| عليك الاشتراك لتتمكن من استخدام البوت\n\n"
                    f"- {x}\n\n"
                    "‼️| اشترك ثم ارسل /start"
                )
            else:
                a = zune["chhi"] + "\n" + x
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": a,
                "disable_web_page_preview": True,
                "reply_to_message_id": mnamero_id,
            })
            return True

    # ── social media subscription check ──────────────────────────────────
    if chat_type == "private":
        if (msg and zune.get("soshal") and
                zune.get("typeinv") == "حساب سوشال ميديا" and
                zune.get("chinv") == "✅" and
                namero_bots not in (zune.get("charray") or []) and
                namero_bots != admin):
            charray = zune.get("charray") or []
            chinvi = len(charray) + 1
            charray.append(namero_bots)
            zune["charray"] = charray
            write_json(zune_path, zune)
            if not zune.get("chhipre"):
                a = (
                    "🚸| عذرا عزيزي\n"
                    "🔰| عليك متابعه حسابي\n\n"
                    f"- {zune['soshal']} \n\n"
                    "‼️| تابعني من ثم ارسل /start\n"
                )
            else:
                a = zune["chhipre"] + "\n" + zune["soshal"]
            first_name_val = update.get("message", {}).get("from", {}).get("first_name", "")
            await _bot(token, "sendMessage", {
                "chat_id": admin,
                "text": (
                    "📥| شاهد شخص جديد الاشتراك الخاص بك ( حساب سواشال ميديا ) \n\n"
                    f"- الحساب : {zune['soshal']}\n\n"
                    f"- العضو : {first_name_val}\n\n"
                    f"- ايدي العضو: {namero_bots}\n\n"
                    f"العدد الكلي للمشاهدين : {chinvi}\n"
                ),
                "disable_web_page_preview": True,
            })
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": a,
                "disable_web_page_preview": True,
                "reply_to_message_id": mnamero_id,
            })
            return True

        # ── secondary channels subscription check ─────────────────────────
        if msg and namero_bots != admin:
            second_chs = zune.get("secondch") or []
            for ch22 in second_chs:
                status2 = await _check_member_status(token, ch22, namero_bots)
                if status2:
                    x = "https://t.me/" + ch22.replace("@", "")
                    if not zune.get("chhi"):
                        a = (
                            "🚸| عذرا عزيزي\n"
                            "🔰| عليك الاشتراك لتتمكن من استخدام البوت\n\n"
                            f"- {x}\n\n"
                            "‼️| اشترك ثم ارسل /start"
                        )
                    else:
                        a = zune["chhi"] + "\n" + x
                    await _bot(token, "sendMessage", {
                        "chat_id": nameroch,
                        "text": a,
                        "disable_web_page_preview": True,
                        "reply_to_message_id": mnamero_id,
                    })
                    return True

        # ── factory-level mandatory subscription check ────────────────────
        if update and namero_bots != admin:
            if makerinve.get("makerish") == "✅":
                cab = makerinve.get("setchmaker")
                mou = makerinve.get("Apisetchmaker")
                if cab and mou:
                    chao_result = await bot_get(mou, "getChatMember", {
                        "chat_id": cab,
                        "user_id": namero_bots
                    })
                    inac_status = chao_result.get("result", {}).get("status", "left") if chao_result.get("ok") else "left"
                    if inac_status in ("left", "kicked"):
                        x = "https://t.me/" + cab.replace("@", "")
                        if makerinve.get("ishon") == "✅":
                            user_bot_val = makerinve.get("user_bot", "")
                            coin_text = (
                                f"\n📥| شترك شخص في قناة الاشتراك الاجباري (جميع البوتات)\n\n"
                                f"- الرابط :{x} \n\n"
                                f"- العضو : {name}\n"
                                f"- ايدي العضو : {namero_bots}\n"
                                f"- شترك بواسطة بوت : @{user_bot_val}"
                            )
                            tik = makerinve.get("Apisetchmaker", "")
                            devish = makerinve.get("devish", "")
                            await bot_get(tik, "sendMessage", {
                                "chat_id": devish,
                                "text": coin_text,
                                "disable_web_page_preview": True,
                            })
                        a = (
                            "🚸| عذرا عزيزي\n"
                            "🔰| عليك الاشتراك لتتمكن من استخدام البوت\n\n"
                            f"- {x}\n\n"
                            "‼️| اشترك ثم ارسل /start"
                        )
                        await _bot(token, "sendMessage", {
                            "chat_id": nameroch,
                            "text": a,
                            "disable_web_page_preview": True,
                            "reply_to_message_id": mnamero_id,
                        })
                        return True

    # ── ban check ─────────────────────────────────────────────────────────
    if msg and namero_bots in [str(b) for b in band]:
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "A🏷:انت محظور من البوت \n — — — — — — — — —\n",
            "reply_to_message_id": mnamero_id,
        })
        return True

    # ── bot on/off check ──────────────────────────────────────────────────
    if msg and zune.get("bot") == "❌" and namero_bots != admin:
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": zune.get("setclose", ""),
            "parse_mode": "MarkDown",
            "reply_to_message_id": mnamero_id,
        })
        return True

    # ── new user tracking ─────────────────────────────────────────────────
    if saleh_text == "/start" and zune.get("well") == "✅" and namero_bots not in all_users and chat_type == "private":
        await _bot(token, "sendMessage", {
            "chat_id": admin,
            "text": (
                f"*٭ تم دخول شخص جديد الى البوت الخاص بك 👾*\n"
                "-----------------------\n"
                "• معلومات العضو الجديد .\n"
                f"• الاسم : [{name}](tg://user?id={namero_bots}) \n"
                f"• المعرف : [@{saleh_user}](tg://user?id={namero_bots})\n"
                f"• الايدي : [{namero_bots}](tg://user?id={namero_bots})\n"
                "-----------------------\n"
                f"*• عدد الاعضاء الكلي* : {{ {s_all} }}"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
        })
        append_file(alluser_path, namero_bots + "\n")
        all_users = file_lines(alluser_path)
        s_all = len(all_users)

    if zune.get("well") != "✅" and namero_bots not in all_users and chat_type == "private":
        append_file(alluser_path, namero_bots + "\n")

    # ── precompute keyboards ──────────────────────────────────────────────
    back_kb = _back_kb()
    chh_kb = _chh_kb(zune)
    startadmin_kb = _startadmin_kb(zune)

    # ═════════════════════════════════════════════════════════════════════
    # CALLBACK HANDLERS
    # ═════════════════════════════════════════════════════════════════════

    # ── chprch (set social subscription message) ──────────────────────────
    if s_p_p1 == "chprch":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "• ارسل كليشه الاشتراك مع رابط حسابك الذي قمت بتعينه .",
            "parse_mode": "MarkDown",
            "reply_markup": back_kb,
        })
        zune["data"] = "chprch"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "chprch":
        s_all_count = s_all + s_all_gg + s_all_co
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "تم حفظ رسالة الاشتراك الاجباري⚙\n",
            "parse_mode": "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع • ", "callback_data": "back"}]]}),
        })
        zune["chhipre"] = saleh_text
        zune["data"] = "stop"
        write_json(zune_path, zune)

    # ── chppost (view social subscription message) ────────────────────────
    if s_p_p1 == "chppost":
        if not zune.get("chhipre"):
            a = (
                "🚸| عذرا عزيزي\n"
                "🔰| عليك متابعه حسابي\n\n"
                "- الرابط !\n\n"
                "‼️| تابعني من ثم ارسل /start\n"
            )
        else:
            a = zune["chhipre"]
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": a,
            "disable_web_page_preview": True,
            "reply_markup": back_kb,
        })

    # ── delchip (delete social subscription message) ──────────────────────
    if s_p_p1 == "delchip":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "تم حذف رسالة الاشتراك بنجاح ✅",
            "reply_markup": back_kb,
        })
        zune.pop("chhipre", None)
        write_json(zune_path, zune)

    # ── typeinv (toggle subscription type) ───────────────────────────────
    if s_p_p1 == "typeinv":
        if zune.get("typeinv") != "قناة تليجرام":
            iu = "قناة تليجرام"
        else:
            iu = "حساب سوشال ميديا"
        zune["typeinv"] = iu
        write_json(zune_path, zune)
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": f"*• تم تغيير نوع الاشتراك الاجباري بنجاح ✅ *\n\n- الى وضع الاشتراك الاجباري : {iu}",
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع • ", "callback_data": "ch"}]]}),
        })

    # ── addsoshql (set social account link) ──────────────────────────────
    if s_p_p1 == "addsoshql":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "• ارسل رابط حسابك في اي موقع من مواقع التواصل الاجتماعي . ",
            "reply_markup": back_kb,
        })
        zune["data"] = "okaddshosh"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "okaddshosh":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "تم الحفظ 🫡",
                "reply_markup": back_kb,
            })
            zune.pop("ch1", None)
            zune["soshal"] = saleh_text
            zune["data"] = "stop"
            zune.pop("charray", None)
            write_json(zune_path, zune)

    # ── dellsosh (confirm delete social account) ──────────────────────────
    if s_p_p1 == "dellsosh":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "،🖇:هل أنت متأكد من أنك تريد حذف الحساب ",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "نعم", "callback_data": "okdelsosh"}, {"text": "رجوع", "callback_data": "back"}]
            ]}),
        })

    # ── okdelsosh (delete social account) ────────────────────────────────
    if s_p_p1 == "okdelsosh":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "• تم حذف الحساب من الاشتراك الاجباري!",
            "reply_markup": back_kb,
        })
        zune.pop("soshal", None)
        write_json(zune_path, zune)

    # ── getsosh (view social account) ────────────────────────────────────
    if s_p_p1 == "getsosh":
        sosh1 = zune.get("soshal") or "لايوجد حساب"
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "\n• هذه قائمة للحساب الاساسي للأشتراك الاجباري ⚙\n\n"
                f"• الحساب الاساسي : {sosh1}\n"
            ),
            "reply_markup": back_kb,
        })

    # ── #@ prefix callbacks: toggle zune flags ────────────────────────────
    if mx[0] == "#":
        key = mx[1] if len(mx) > 1 else ""
        if key:
            if zune.get(key) != "✅":
                iu = "✅"
            else:
                iu = "❌"
            zune[key] = iu
            write_json(zune_path, zune)
            chh_kb = _chh_kb(zune)
            await _bot(token, "editMessageReplyMarkup", {
                "chat_id": cb["message"]["chat"]["id"] if cb and cb.get("message") else nameroch2,
                "message_id": cb["message"]["message_id"] if cb and cb.get("message") else mnamero_id2,
                "disable_web_page_preview": True,
                "reply_markup": chh_kb,
            })

    # ── 1# prefix callbacks: toggle main settings flags ───────────────────
    if rex[0] == "1":
        key = rex[1] if len(rex) > 1 else ""
        if key:
            if zune.get(key) != "✅":
                iu = "✅"
            else:
                iu = "❌"
            zune[key] = iu
            write_json(zune_path, zune)
            startadmin_kb = _startadmin_kb(zune)
            await _bot(token, "editMessageReplyMarkup", {
                "chat_id": cb["message"]["chat"]["id"] if cb and cb.get("message") else nameroch2,
                "message_id": cb["message"]["message_id"] if cb and cb.get("message") else mnamero_id2,
                "disable_web_page_preview": True,
                "reply_markup": startadmin_kb,
            })

    # ── setclose data: save bot-closed message ────────────────────────────
    if saleh_text and zune.get("data") == "setclose" and namero_bots == admin:
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": f"• تم حفظ رسالة الاغلاق بنجاح \n\n • الرسالة : {saleh_text}\n\n",
            "parse_mode": "markdown",
            "reply_markup": back_kb,
        })
        zune["data"] = "done"
        zune["setclose"] = saleh_text
        write_json(zune_path, zune)

    # ── 1#bot toggled to ❌: prompt for close message ─────────────────────
    if rex[1] == "bot" and zune.get("bot") == "❌":
        await _bot(token, "sendMessage", {
            "chat_id": nameroch2,
            "text": "\n• ارسل الرساله التي تظهر عند ارسال اي شيئ الى البوت (يمكنك استخدام الماركداون)\n",
            "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "back"}]]}),
        })
        zune["data"] = "setclose"
        write_json(zune_path, zune)

    elif saleh_text == "/start":
        # ── /start: admin/dev panel ───────────────────────────────────────
        if is_super_admin(namero_bots):
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": (
                    "*• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n"
                    "- يمكنك التحكم في البوت الخاص بك من هنا\n"
                    "~~~~~~~~~~~~~* \n"
                    "- عليك تفعيل الانلاين لكي يعمل البوت بشكل صحيح \n"
                    "•[اضغط هنا لمعرفة كيف تفعل الانلاين](https://t.me/W_J90/44)"
                ),
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": startadmin_kb,
            })

    elif msg and zune.get("sendad") == "✅" and zune.get("tawa") != "❌" and namero_bots != admin:
        # ── forward user message to admin ─────────────────────────────────
        if ":" not in (saleh_text or ""):
            await _bot(token, "forwardMessage", {
                "chat_id": admin,
                "from_chat_id": namero_bots,
                "message_id": mnamero_id,
            })

    if msg and zune.get("sendad") == "✅" and zune.get("tawa") != "❌" and is_super_admin(namero_bots):
        # ── admin reply to forwarded message ──────────────────────────────
        reply_to = (msg.get("reply_to_message") or {}).get("forward_from", {}).get("id")
        if reply_to:
            await _bot(token, "copyMessage", {
                "chat_id": reply_to,
                "from_chat_id": admin,
                "message_id": mnamero_id,
            })

    elif s_p_p1 == "back":
        # ── back callback ─────────────────────────────────────────────────
        if is_super_admin(namero_bots2):
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "*• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n"
                    "- يمكنك التحكم في البوت الخاص بك من هنا\n"
                    "~~~~~~~~~~~~~* \n"
                    "- عليك تفعيل الانلاين لكي يعمل البوت بشكل صحيح \n"
                    "•[اضغط هنا لمعرفة كيف تفعل الانلاين](https://t.me/W_J90/44)"
                ),
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": startadmin_kb,
            })
            zune.pop("data", None)
            zune.pop("addradArmof", None)
            write_json(zune_path, zune)

    # ── secind: secondary subscription section ────────────────────────────
    if s_p_p1 == "secind":
        second_chs = zune.get("secondch")
        if second_chs and second_chs != "{":
            keyboard = {"inline_keyboard": []}
            for ch_item in second_chs:
                keyboard["inline_keyboard"].append([
                    {"text": ch_item, "url": "t.me/" + ch_item.replace("@", "")},
                    {"text": "🗑", "callback_data": "dll@" + ch_item},
                ])
            keyboard["inline_keyboard"].append([{"text": "• اضافة قناة جديدة •", "callback_data": "addch2"}])
            keyboard["inline_keyboard"].append([{"text": "• رجوع •", "callback_data": "back"}])
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "*• مرحبا بك في قسم الاشتراك الاجباري الثانوي ⚙️*\n\n"
                    "- يمكنك وضع 3 قنوات فقط \n\n"
                    "*- الاشتراك سيظهر عند ضغط /start فقط لكي لا يؤثر على عمل البوت *\n"
                    "ستظهر قناة الاشتراك الاساسية اولا !\n\n"
                    "- اضغط على القناة لتعديل رساله الاشتراك الاجباري ."
                ),
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": json.dumps(keyboard),
            })
        else:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "*• مرحبا بك في قسم الاشتراك الاجباري الثانوي ⚙️*\n\n"
                    "- يمكنك وضع 3 قنوات فقط \n\n"
                    "*- الاشتراك سيظهر عند ضغط /start فقط لكي لا يؤثر على عمل البوت *\n"
                    "ستظهر قناة الاشتراك الاساسية اولا !\n\n"
                    "- اضغط على القناة لتعديل رساله الاشتراك الاجباري ."
                ),
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": json.dumps({"inline_keyboard": [
                    [{"text": "• اضافة قناة جديدة •", "callback_data": "addch2"}],
                    [{"text": "رجوع", "callback_data": "back"}],
                ]}),
            })

    # ── addch2: add secondary channel ─────────────────────────────────────
    if s_p_p1 == "addch2":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                " \n• قم برفع البوت ادمن في قناتك او مجموعتك اولا 🌟\n\n"
                "• من ثم ارسال معرف القناة او قم بعمل توجيه لاي منشور من قناتك الى البوت\n"
                "• يمكنك وضع شتراك جباري لمجموعتك عن طريق اضافه البوت الى المجموعة وارسل تفعيل الاشتراك\n"
            ),
            "reply_markup": back_kb,
        })
        zune["data"] = "addch2"
        write_json(zune_path, zune)

    if re.search(r"@", saleh_text or "") and zune.get("data") == "addch2":
        if namero_bots == admin or namero_bots in [str(x) for x in (zune.get("secondch") or [])]:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "• تم الحفظ بنجاح 🎠\n",
                "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "secind"}]]}),
            })
            if "secondch" not in zune:
                zune["secondch"] = []
            zune["secondch"].append(saleh_text)
            zune.pop("data", None)
            write_json(zune_path, zune)

    # ── dll@ delete secondary channel ────────────────────────────────────
    if deloch[0] == "dll":
        ch_to_del = deloch[1] if len(deloch) > 1 else ""
        if ch_to_del:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "• تم حذف القناة من الاشتراك الاجباري!",
                "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "secind"}]]}),
            })
            second_chs_list = zune.get("secondch") or []
            if ch_to_del in second_chs_list:
                second_chs_list.remove(ch_to_del)
            zune["secondch"] = second_chs_list
            zune.pop("data", None)
            write_json(zune_path, zune)

    # ── admin management panel ────────────────────────────────────────────
    if s_p_p1 == "admin":
        sudo_list = zune.get("sudoarr")
        if sudo_list and sudo_list != "{":
            keyboard = {"inline_keyboard": []}
            for i, sad in enumerate(sudo_list):
                keyboard["inline_keyboard"].append([
                    {"text": str(sad), "url": f"tg://openmessage?user_id={sad}"},
                    {"text": "🗑", "callback_data": f"dll^{sad}"},
                ])
            keyboard["inline_keyboard"].append([{"text": "• اضافة ادمن جديد •", "callback_data": "addsod"}])
            keyboard["inline_keyboard"].append([{"text": "• رجوع •", "callback_data": "back"}])
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• مرحبا بك في الادمنيه 👮‍♀️\n"
                    "- يمكنك رفع 5 ادمنيه في البوت او حذفهم \n\n"
                    "- يمكن للادمنيه تحكم في لوحه البوت مثلك ويمكنهم استلام رسائل الموجهة او سايت او تواصل ."
                ),
                "reply_markup": json.dumps(keyboard),
            })
        else:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• مرحبا بك في الادمنيه 👮‍♀️\n"
                    "- يمكنك رفع 5 ادمنيه في البوت او حذفهم \n\n"
                    "- يمكن للادمنيه تحكم في لوحه البوت مثلك ويمكنهم استلام رسائل الموجهة او سايت او تواصل ."
                ),
                "reply_markup": json.dumps({"inline_keyboard": [
                    [{"text": "• اضافة ادمن جديد •", "callback_data": "addsod"}],
                    [{"text": "• رجوع •", "callback_data": "back"}],
                ]}),
            })

    # ── addsod: add admin ─────────────────────────────────────────────────
    if s_p_p1 == "addsod":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "• ارسل ايدي الشخص الان او معرف الشخص !",
            "reply_markup": back_kb,
        })
        zune["data"] = "addsod"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "addsod":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": " اوه حسناا عزيزي تم رفعه ادمن 🫥💞",
                "reply_markup": back_kb,
            })
            await _bot(token, "sendMessage", {
                "chat_id": saleh_text,
                "text": " تم رفعك ادمن بالبوت 🌀",
            })
            if "sudoarr" not in zune:
                zune["sudoarr"] = []
            zune["sudoarr"].append(saleh_text)
            zune.pop("data", None)
            write_json(zune_path, zune)

    # ── dll^ delete admin ─────────────────────────────────────────────────
    if dellad[0] == "dll":
        admin_to_del = dellad[1] if len(dellad) > 1 else ""
        if admin_to_del and "^" in s_p_p1:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "• تم تنزيلة من الادمنية •",
                "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "admin"}]]}),
            })
            sudo_list2 = zune.get("sudoarr") or []
            if admin_to_del in sudo_list2:
                sudo_list2.remove(admin_to_del)
            zune["sudoarr"] = sudo_list2
            zune.pop("data", None)
            write_json(zune_path, zune)

    # ── what: welcome message panel ───────────────────────────────────────
    if s_p_p1 == "what":
        set_val = zune.get("wellcom")
        if not set_val:
            set_val = (
                "• الرسالة الافتراضية: \n"
                f"اهلا بك ([{name}](tg://user?id={namero_bots})) في البوت الخاص بي ❤\n"
                "- ارسل رسالتك الان ليتم ارسالها الى مدير البوت."
            )
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "\n• مرحبا بك في قسم رسالة الترحيب (/start) 🌾\n"
                "- ستظهر هذه الرسالة عند إرسال (/start) الى البوت الخاص بك \n\n"
                "- الرسالة الحالية : \n"
                f"{set_val}\n"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "رسالة الترحيب", "callback_data": "hi"}],
                [{"text": "اضف رسالة", "callback_data": "pthi"}, {"text": "حذف رسالة", "callback_data": "delhi"}],
                [{"text": "رجوع", "callback_data": "back"}],
            ]}),
        })

    # ── pthi: set welcome message ─────────────────────────────────────────
    if s_p_p1 == "pthi":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "\nمرحبا بك في قسم رسالة الترحيب (/start) 🌾\n"
                "- ستظهر هذه الرسالة عند ارسال (/start) الى البوت الخاص بك. \n"
                "- قم بارسال رسالتك الان.\n"
            ),
            "parse_mode": "MarkDown",
            "reply_markup": back_kb,
        })
        zune["data"] = "pthi"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "pthi":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "✅ تم حفظ رسالة الترحيب",
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            zune["wellcom"] = saleh_text
            zune["data"] = "stop"
            write_json(zune_path, zune)

    # ── hi: view welcome message ──────────────────────────────────────────
    if s_p_p1 == "hi":
        if zune.get("wellcom"):
            set_val2 = zune["wellcom"]
        else:
            set_val2 = "• الرسالة الافتراضية لم تقم باضافة رسالة !"
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": set_val2,
            "parse_mode": "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "back"}]]}),
        })

    # ── delhi: delete welcome message ─────────────────────────────────────
    if s_p_p1 == "delhi":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "🗑 تم حذف رسالة الترحيب",
            "parse_mode": "MarkDown",
            "reply_markup": back_kb,
        })
        zune["wellcom"] = None
        write_json(zune_path, zune)

    # ── countall: statistics ──────────────────────────────────────────────
    if s_p_p1 == "countall":
        s_all = len(file_lines(alluser_path))
        ad_count = len(zune.get("sudoarr") or [])
        bn_count = len(zune.get("band") or [])
        s_all_gg2 = len(zune.get("idgroup") or [])
        s_all_co2 = len(zune.get("idch") or [])
        con2 = s_all_co2 + s_all_gg2
        all_u = file_lines(alluser_path)
        first_user = all_u[1] if len(all_u) > 1 else ""
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "\nمرحبا بك في قسم الاحصائيات 📊\n\n"
                f"• عدد المسخدمين الكلي : *{s_all}*\n"
                f"- عدد المستخدمين في الخاص : *{s_all}*\n"
                f"- عدد الكروبات والقنوات : *{con2}*\n\n"
                f"• عدد المحظورين : *{bn_count}*\n\n"
                "- قائمة اخر الاعضاء الذين شتركوا :\n\n"
                f"1. {first_user}\n"
                "————\n"
            ),
            "parse_mode": "markdown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "🗑 مسح المحظورين", "callback_data": "delc"}, {"text": "المحظورين", "callback_data": "ALAA"}],
                [{"text": "حظر شخص", "callback_data": "k"}, {"text": "الغاء حظر شخص", "callback_data": "unk"}],
                [{"text": "قسم الاذاعه", "callback_data": "tonum"}],
                [{"text": "رجوع", "callback_data": "back"}],
            ]}),
        })

    # ── ALAA: view banned list ────────────────────────────────────────────
    if s_p_p1 == "ALAA":
        band_list = zune.get("band") or []
        admi_str = "".join(str(b) + "\n" for b in band_list)
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": f"اهلا بك في قائمة المحظورين \n{admi_str}",
            "reply_markup": back_kb,
        })

    # ── unk: unban user ───────────────────────────────────────────────────
    if s_p_p1 == "unk":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "- ارسل ايدي الشخص او معرف الشخص لكي اقوم بالغاء حظره من البوت",
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": back_kb,
        })
        zune["data"] = "un"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "un":
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": f"تم الغاء حظره {saleh_text}",
        })
        band_list2 = zune.get("band") or []
        if saleh_text in band_list2:
            band_list2.remove(saleh_text)
        zune.pop("data", None)
        zune["band"] = band_list2
        write_json(zune_path, zune)

    # ── delc: clear all banned ────────────────────────────────────────────
    if s_p_p1 == "delc":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "تم حذف المحظورين",
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": back_kb,
        })
        zune.pop("band", None)
        write_json(zune_path, zune)

    # ── k: ban user ───────────────────────────────────────────────────────
    if s_p_p1 == "k":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "- ارسل ايدي الشخص او معرف الشخص لكي اقوم بحظره من البوت ",
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": back_kb,
        })
        zune["data"] = "ok"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "ok":
        if namero_bots == admin:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": f"تم حظره {saleh_text}",
            })
            if "band" not in zune:
                zune["band"] = []
            zune["band"].append(saleh_text)
            zune.pop("data", None)
            write_json(zune_path, zune)

    # ── tonum: broadcast panel ────────────────────────────────────────────
    if s_p_p1 == "tonum":
        ad_count2 = len(zune.get("sudoarr") or [])
        bn_count2 = len(zune.get("band") or [])
        s_all_gg3 = len(zune.get("idgroup") or [])
        s_all_co3 = len(zune.get("idch") or [])
        s_all2 = len(file_lines(alluser_path))
        con3 = s_all_co3 + s_all_gg3
        allcou3 = s_all2 + s_all_gg3 + s_all_co3
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "\n• مرحبا بك في قسم الاذاعه 🔥\n\n"
                f"- عدد المسخدمين الكلي : {allcou3}\n"
                f"- عدد الخاص : {s_all2}\n"
                f"- عدد الكروبات والقنوات : {con3}\n\n"
                f"- عدد المحظورين : {bn_count2}"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "اذاعة للكل", "callback_data": "allsend"}, {"text": "اذاعة توجيه للكل", "callback_data": "tallsend"}],
                [{"text": "اذاعة للخاص", "callback_data": "psend"}, {"text": "اذاعة توجيه للخاص", "callback_data": "tpsend"}],
                [{"text": "اذاعة كروبات", "callback_data": "gsend"}, {"text": "اذاعة توجيه كروبات", "callback_data": "tgsend"}],
                [{"text": "رجوع", "callback_data": "back"}],
            ]}),
        })

    # ── ch: mandatory subscription panel ─────────────────────────────────
    if s_p_p1 == "ch":
        c1 = zune.get("ch1") or "لايوجد قناة"
        cosh = zune.get("soshal") or "لايوجد حساب"
        if zune.get("typeinv") == "قناة تليجرام":
            startsosh = (
                "*• مرحبا بك في قسم الاشتراك الاجباري ✨*\n\n"
                f"- قناة الاشتراك الاساسية : {c1} \n\n"
                "- يمكنك تعيين اكثر من قناة من خاصية قسم الاشتراك الثانوي"
            )
        else:
            startsosh = (
                "*• مرحبا بك في قسم الاشتراك الاجباري ✨*\n\n"
                f"- رابط الحساب : {cosh} \n\n"
                "- يمكنك تعين نوع الاشتراك الاجباري من خلال الضغط 'نوع الاشتراك الاجباري"
            )
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": startsosh,
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": _chh_kb(zune),
        })

    # ── mchc: set mandatory subscription message ──────────────────────────
    if s_p_p1 == "mchc":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "حسنا قم بارسال رسالة الاشتراك الاجباري ",
            "parse_mode": "MarkDown",
            "reply_markup": back_kb,
        })
        zune["data"] = "mchc"
        write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "mchc":
        s_all_count2 = s_all + s_all_gg + s_all_co
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "تم حفظ رسالة الاشتراك الاجباري⚙\n",
            "parse_mode": "MarkDown",
            "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع •", "callback_data": "back"}]]}),
        })
        zune["chhi"] = saleh_text
        zune["data"] = "stop"
        write_json(zune_path, zune)

    # ── chhii: view mandatory subscription message ────────────────────────
    if s_p_p1 == "chhii":
        if not zune.get("chhi"):
            a = (
                "🚸| عذرا عزيزي\n"
                "🔰| عليك الاشتراك بقناة البوت لتتمكن من استخدامه\n\n"
                "- https://t.me/\n\n"
                "‼️| اشترك ثم ارسل /start"
            )
        else:
            a = zune["chhi"]
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": a,
            "disable_web_page_preview": True,
            "reply_markup": back_kb,
        })

    # ── delchi: delete mandatory subscription message ─────────────────────
    if s_p_p1 == "delchi":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "تم حذف رسالة الاشتراك بنجاح ✅",
            "reply_markup": back_kb,
        })
        zune.pop("chhi", None)
        write_json(zune_path, zune)

    # ── addch1: set primary channel ───────────────────────────────────────
    if s_p_p1 == "addch1":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "• اولا قم برفع البوت ادمن في قناتك او مجموعتك🌟\n\n"
                "• ومن ثمه قم بارسال معرف القناة او الكروب"
                "( ارسل معرف القناة او الكروب بشكل يوزر وليس رابط )"
            ),
            "reply_markup": back_kb,
        })
        zune["data"] = "okch1"
        write_json(zune_path, zune)

    if re.search(r"@", saleh_text or "") and zune.get("data") == "okch1":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": " \n• تم الحفظ بنجاح \n",
                "reply_markup": back_kb,
            })
            zune["ch1"] = saleh_text
            zune["data"] = "stop"
            zune.pop("charray", None)
            write_json(zune_path, zune)

    # ── delch1: confirm delete primary channel ────────────────────────────
    if s_p_p1 == "delch1":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": " هل أنت متأكد من أنك تريد حذف القناة ",
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "نعم", "callback_data": "OKDelCh1"}, {"text": "رجوع", "callback_data": "back"}]
            ]}),
        })

    # ── OKDelCh1: delete primary channel ─────────────────────────────────
    if s_p_p1 == "OKDelCh1":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": "• تم حذف القناة من الاشتراك الاجباري!",
            "reply_markup": back_kb,
        })
        zune.pop("ch1", None)
        write_json(zune_path, zune)

    # ── geetallch: view primary channel ──────────────────────────────────
    if s_p_p1 == "geetallch":
        c1_val = zune.get("ch1") or "لايوجد قناة"
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "هذه قائمة القناة الاساسية للأشتراك الاجباري \n"
                f"• القناة الاساسية : {c1_val}\n"
            ),
            "reply_markup": back_kb,
        })

    # ── geet: send backup files ───────────────────────────────────────────
    if s_p_p1 == "geet":
        if is_super_admin(namero_bots2):
            s_all3 = len(file_lines(alluser_path))
            await _bot(token, "sendDocument", {
                "chat_id": nameroch2,
                "document": "attach://" + alluser_path if file_exists(alluser_path) else "",
                "caption": (
                    f"\n📋:تم جلب نسخه\n"
                    f"🔖: الاعضاء : {s_all3}\n"
                    "-------------------------\n"
                    "Back /start "
                ),
            })
            await _bot(token, "sendDocument", {
                "chat_id": nameroch2,
                "document": "attach://" + zune_path if file_exists(zune_path) else "",
                "caption": (
                    "\nقاعدة البيانات ⚙\n"
                    "-------------------------\n"
                    "Back /start "
                ),
            })
        else:
            await _bot(token, "answerCallbackQuery", {
                "callback_query_id": update.get("callback_query", {}).get("id"),
                "text": "⚠️الامر ليس لك",
                "show_alert": True,
            })

    # ═════════════════════════════════════════════════════════════════════
    # BROADCAST SECTION
    # ═════════════════════════════════════════════════════════════════════

    set_data = read_json(set_json_path, {"ok": 0, "start": 100})
    namero_f = read_json(namerof_path, {"ok": "on", "data": "notsend"})

    # ── tpsend: forward to all (prepare) ─────────────────────────────────
    if s_p_p1 == "tpsend":
        s_all4 = len(file_lines(alluser_path))
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": f"،🖇:ارسل رسالتك وسيتم توجيهها لـ [ {s_all4} ] ",
            "reply_markup": back_kb,
        })
        set_data["ok"] = 0
        set_data["start"] = 100
        write_json(set_json_path, set_data)
        namero_f["ok"] = "on"
        namero_f["data"] = "okoo"
        write_json(namerof_path, namero_f)

    # ── psend: copy to all (prepare) ──────────────────────────────────────
    if s_p_p1 == "psend":
        s_all5 = len(file_lines(alluser_path))
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": f"،🖇:ارسل رسالتك وسيتم ارسالها[ {s_all5} ] مشترك",
            "reply_markup": back_kb,
        })
        set_data["ok"] = 0
        set_data["start"] = 100
        write_json(set_json_path, set_data)
        namero_f["ok"] = "on"
        namero_f["data"] = "oksend"
        write_json(namerof_path, namero_f)

    # ── oksend: copy broadcast execution ─────────────────────────────────
    if msg and namero_f.get("data") == "oksend" and namero_bots == admin:
        if namero_f.get("ok") == "on":
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "،🖇:جاري الارسال",
            })
            namero_f["ok"] = "of"
            write_json(namerof_path, namero_f)
        all_u2 = file_lines(alluser_path)
        v_start = set_data.get("ok", 0)
        v_end = set_data.get("start", 100)
        for v in range(v_start, min(v_end, len(all_u2))):
            await _bot(token, "editMessageText", {
                "chat_id": nameroch,
                "message_id": (mnamero_id or 0) + 1,
                "text": f"تم الوصول الى ~ {v}",
                "reply_markup": back_kb,
            })
        for v in range(v_start, min(v_end, len(all_u2))):
            await _bot(token, "copyMessage", {
                "chat_id": all_u2[v],
                "from_chat_id": admin,
                "message_id": mnamero_id,
            })
        set_data["ok"] = set_data.get("ok", 0) + 100
        set_data["start"] = set_data.get("start", 100) + 100
        write_json(set_json_path, set_data)
        set_data2 = read_json(set_json_path, {"ok": 0, "start": 100})
        if set_data2.get("start", 0) >= len(all_u2):
            await _bot(token, "sendMessage", {
                "chat_id": admin,
                "text": f"،🖇✅:تم الارسال الى {len(all_u2)} اعضاء",
            })
            delete_file(os.path.join(bot_dir, "ok"))
            delete_file(set_json_path)
            namero_f["data"] = "notsend"
            namero_f["ok"] = "on"
            write_json(namerof_path, namero_f)

    # ── okoo: forward broadcast execution ────────────────────────────────
    if msg and namero_f.get("data") == "okoo" and namero_bots == admin:
        if namero_f.get("ok") == "on":
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "،🖇: تم الارسال",
            })
            namero_f["ok"] = "of"
            write_json(namerof_path, namero_f)
        all_u3 = file_lines(alluser_path)
        v_start3 = set_data.get("ok", 0)
        v_end3 = set_data.get("start", 100)
        for v in range(v_start3, min(v_end3, len(all_u3))):
            await _bot(token, "editMessageText", {
                "chat_id": nameroch,
                "message_id": (mnamero_id or 0) + 1,
                "text": f"تم الوصول الى ~ {v}",
                "reply_markup": json.dumps({"inline_keyboard": [[{"text": "🔙", "callback_data": "NameroF"}]]}),
            })
        for v in range(v_start3, min(v_end3, len(all_u3))):
            await _bot(token, "forwardMessage", {
                "chat_id": all_u3[v],
                "from_chat_id": admin,
                "message_id": mnamero_id,
            })
        set_data["ok"] = set_data.get("ok", 0) + 100
        set_data["start"] = set_data.get("start", 100) + 100
        write_json(set_json_path, set_data)
        set_data3 = read_json(set_json_path, {"ok": 0, "start": 100})
        if set_data3.get("start", 0) >= len(all_u3):
            await _bot(token, "sendMessage", {
                "chat_id": admin,
                "text": f"،🖇✅:تم الارسال الى {len(all_u3)} اعضاء",
                "reply_markup": back_kb,
            })
            delete_file(os.path.join(bot_dir, "ok"))
            delete_file(set_json_path)
            namero_f["data"] = "notsend"
            write_json(namerof_path, namero_f)

    # ── allsend: broadcast copy to all users + groups + channels ──────────
    if s_p_p1 == "allsend":
        if namero_bots2 == admin or namero_bots2 in [str(x) for x in sudo_arr]:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• ارسال الان الكليشه ( نص او جميع الميديا ) \n"
                    "• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون"
                ),
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            zune["data"] = "allsend"
            write_json(zune_path, zune)

    if msg and zune.get("data") == "allsend":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            all_u4 = file_lines(alluser_path)
            s_all6 = len(all_u4)
            id_group6 = zune.get("idgroup") or []
            id_ch6 = zune.get("idch") or []
            allcou6 = s_all6 + len(id_group6) + len(id_ch6)
            con6 = len(id_ch6) + len(id_group6)
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": f"• جاري الاذاعة الى ({s_all6}) مستخدم",
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            max_i = max(len(all_u4), len(id_ch6), len(id_group6))
            for i in range(max_i):
                if i < len(all_u4):
                    await _bot(token, "copyMessage", {"chat_id": all_u4[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_ch6):
                    await _bot(token, "copyMessage", {"chat_id": id_ch6[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_group6):
                    await _bot(token, "copyMessage", {"chat_id": id_group6[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
            if max_i <= 3:
                await _bot(token, "sendMessage", {
                    "chat_id": admin,
                    "text": (
                        "• تم الاذاعة بنجاح 🎉\n\n"
                        f"• الاعضاء الذين شاهدو الاذاعه {{{s_all6}}} عضو حقيقي\n\n"
                        f"• تم الارسال الى {{{con6}}} قنوات وكروبات"
                    ),
                })
            zune["data"] = "stop"
            write_json(zune_path, zune)

    # ── tallsend: forward to all users + groups + channels ────────────────
    if s_p_p1 == "tallsend":
        if namero_bots2 == admin or namero_bots2 in [str(x) for x in sudo_arr]:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• ارسال الان الكليشه ( نص او جميع الميديا ) \n"
                    "• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون\n"
                ),
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            zune["data"] = "tallsend"
            write_json(zune_path, zune)

    if msg and zune.get("data") == "tallsend":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            all_u7 = file_lines(alluser_path)
            s_all7 = len(all_u7)
            id_group7 = zune.get("idgroup") or []
            id_ch7 = zune.get("idch") or []
            con7 = len(id_ch7) + len(id_group7)
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": f"• جاري الاذاعة الى ({s_all7}) مستخدم",
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            max_i7 = max(len(all_u7), len(id_ch7), len(id_group7))
            for i in range(max_i7):
                if i < len(all_u7):
                    await _bot(token, "forwardMessage", {"chat_id": all_u7[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_ch7):
                    await _bot(token, "forwardMessage", {"chat_id": id_ch7[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_group7):
                    await _bot(token, "forwardMessage", {"chat_id": id_group7[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
            if max_i7 <= 3:
                await _bot(token, "sendMessage", {
                    "chat_id": admin,
                    "text": (
                        "• تم الاذاعة بنجاح 🎉\n\n"
                        f"• الاعضاء الذين شاهدو الاذاعه {{{s_all7}}} عضو حقيقي\n\n"
                        f"• تم الارسال الى {{{con7}}} قنوات وكروبات"
                    ),
                })
            zune["data"] = "stop"
            write_json(zune_path, zune)

    # ── gsend: copy to groups+channels only ───────────────────────────────
    if s_p_p1 == "gsend":
        if namero_bots2 == admin or namero_bots2 in [str(x) for x in sudo_arr]:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• ارسال الان الكليشه ( نص او جميع الميديا ) \n"
                    "• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون"
                ),
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            zune["data"] = "gsend"
            write_json(zune_path, zune)

    if saleh_text and zune.get("data") == "gsend":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            id_group8 = zune.get("idgroup") or []
            id_ch8 = zune.get("idch") or []
            s_all_gg8 = len(id_group8)
            x8 = len(id_ch8) + len(id_group8)
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": f"• جاري الاذاعة الى ({s_all_gg8}) مستخدم",
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            for i in range(max(len(id_group8), len(id_ch8))):
                if i < len(id_ch8):
                    await _bot(token, "copyMessage", {"chat_id": id_ch8[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_group8):
                    await _bot(token, "copyMessage", {"chat_id": id_group8[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
            if len(id_group8) <= 2:
                await _bot(token, "sendMessage", {
                    "chat_id": admin,
                    "text": f"• تم الاذاعة بنجاح 🎉\n\n• القنوات والكروبات الذين شاهدو الاذاعة {x8}",
                })
            zune["data"] = "stop"
            write_json(zune_path, zune)

    # ── tgsend: forward to groups+channels only ───────────────────────────
    if s_p_p1 == "tgsend":
        if namero_bots2 == admin or namero_bots2 in [str(x) for x in sudo_arr]:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• ارسال الان الكليشه ( نص او جميع الميديا ) \n"
                    "• يمكنك استخدام كود جاهز في الاذاعه او يمكنك استخدام الماركداون"
                ),
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            zune["data"] = "tgsend"
            write_json(zune_path, zune)

    if msg and zune.get("data") == "tgsend":
        if namero_bots == admin or namero_bots in [str(x) for x in sudo_arr]:
            id_group9 = zune.get("idgroup") or []
            id_ch9 = zune.get("idch") or []
            s_all_gg9 = len(id_group9)
            x9 = len(id_ch9) + len(id_group9)
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": f"• جاري الاذاعة الى ({s_all_gg9}) مستخدم",
                "parse_mode": "MarkDown",
                "reply_markup": back_kb,
            })
            for i in range(max(len(id_group9), len(id_ch9))):
                if i < len(id_group9):
                    await _bot(token, "forwardMessage", {"chat_id": id_group9[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
                if i < len(id_ch9):
                    await _bot(token, "forwardMessage", {"chat_id": id_ch9[i], "from_chat_id": namero_bots, "message_id": mnamero_id})
            if len(id_group9) <= 2:
                await _bot(token, "sendMessage", {
                    "chat_id": admin,
                    "text": f"• تم الاذاعة بنجاح 🎉\n\n• القنوات والكروبات الذين شاهدو الاذاعة {x9}",
                })
            zune["data"] = "stop"
            write_json(zune_path, zune)

    # ═════════════════════════════════════════════════════════════════════
    # REPLIES SECTION (rdod)
    # ═════════════════════════════════════════════════════════════════════

    if s_p_p1 == "rdod":
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                " \n• مرحبا بك في قسم الردود 👮‍♀️\n\n"
                "- يمكنك اضافه ردود وحذفها \n"
                "- يمكنك استخدام الاوامر (اضف رد-مسح رد) \n\n"
                "- اضغط على نص الزر لعرض محتواه .\n"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": json.dumps({"inline_keyboard": [
                [{"text": "اضافة رد جديد", "callback_data": "addrd"}, {"text": "الردود", "callback_data": "rdode"}],
                [{"text": "رجوع", "callback_data": "back"}],
            ]}),
        })

    # ── addrd: add reply step 1 ───────────────────────────────────────────
    if s_p_p1 == "addrd":
        if namero_bots2 == admin:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "\n• ارسل الكلمة الان .\n",
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": back_kb,
            })
            zune["addradArmof"] = namero_bots2
            write_json(zune_path, zune)

    elif saleh_text and zune.get("addradArmof") == namero_bots:
        # ── addrd step 2: received trigger word ──────────────────────────
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": (
                "\nف• ارسل الرد الان , يمكنك ارسال ( نص او ميديا ) \n\n"
                "- يمكنك وضع بعض الاضافات الى الرد من خلال استخدام الاهاشتاكات التاليه :\n\n"
                "1. `#id` : لوضع ايدي الشخص \n"
                "2. `#username` : لوضع اسم مستخدم الشخص مع اضافه @ \n"
                "3. `#name` : لوضع اسم الشخص\n"
            ),
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        zune["addradArmof"] = namero_bots + ".don"
        zune["setrad"] = saleh_text
        if "setraddArmof" not in zune:
            zune["setraddArmof"] = []
        zune["setraddArmof"].append(saleh_text)
        write_json(zune_path, zune)

    elif msg and f.get("photo") and zune.get("addradArmof") == namero_bots + ".don":
        photo = f["photo"][0]["file_id"] if f["photo"] else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["photo"] = photo
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and f.get("video") and zune.get("addradArmof") == namero_bots + ".don":
        video = f["video"]["file_id"] if f.get("video") else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["video"] = video
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and f.get("voice") and zune.get("addradArmof") == namero_bots + ".don":
        voice = f["voice"]["file_id"] if f.get("voice") else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["voice"] = voice
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and f.get("audio") and zune.get("addradArmof") == namero_bots + ".don":
        audio = f["audio"]["file_id"] if f.get("audio") else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["audio"] = audio
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and f.get("sticker") and zune.get("addradArmof") == namero_bots + ".don":
        sticker = f["sticker"]["file_id"] if f.get("sticker") else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["sticker"] = sticker
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and saleh_text and zune.get("addradArmof") == namero_bots + ".don":
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["text"] = saleh_text
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    elif msg and f.get("document") and zune.get("addradArmof") == namero_bots + ".don":
        document = f["document"]["file_id"] if f.get("document") else None
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "*تم الحفظ *",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        setrad_key = zune.get("setrad", "")
        if setrad_key not in zune:
            zune[setrad_key] = {}
        zune[setrad_key]["animation"] = document
        zune["addradArmof"] = namero_bots + ".done"
        write_json(zune_path, zune)

    # ── auto replies: respond to matching trigger words ───────────────────
    if saleh_text:
        word_data = zune.get(saleh_text)
        if isinstance(word_data, dict):
            if word_data.get("text") is not None and word_data.get("text") != "{":
                await _bot(token, "sendMessage", {
                    "chat_id": nameroch,
                    "text": word_data["text"],
                    "reply_to_message_id": mnamero_id,
                    "disable_web_page_preview": True,
                })
            elif word_data.get("photo") is not None:
                await _bot(token, "sendPhoto", {
                    "chat_id": nameroch,
                    "photo": zune.get(zune.get("setrad", ""), {}).get("photo"),
                    "reply_to_message_id": mnamero_id,
                })
            elif saleh_text != "اضف رد" and word_data.get("video") is not None:
                await _bot(token, "sendVideo", {
                    "chat_id": nameroch,
                    "video": word_data["video"],
                    "reply_to_message_id": mnamero_id,
                })
            elif word_data.get("animation") is not None:
                await _bot(token, "sendDocument", {
                    "chat_id": nameroch,
                    "document": word_data["animation"],
                    "reply_to_message_id": mnamero_id,
                })
            elif word_data.get("audio") is not None:
                await _bot(token, "sendAudio", {
                    "chat_id": nameroch,
                    "audio": word_data["audio"],
                    "reply_to_message_id": mnamero_id,
                })
            elif word_data.get("voice") is not None:
                await _bot(token, "sendVoice", {
                    "chat_id": nameroch,
                    "voice": word_data["voice"],
                    "reply_to_message_id": mnamero_id,
                })
            elif word_data.get("sticker") is not None:
                await _bot(token, "sendSticker", {
                    "chat_id": nameroch,
                    "sticker": word_data["sticker"],
                    "reply_to_message_id": mnamero_id,
                })

    # ── rdode: list replies ───────────────────────────────────────────────
    if s_p_p1 == "rdode":
        replies_list = zune.get("setraddArmof")
        if replies_list:
            keyboard = {"inline_keyboard": []}
            for tx in replies_list:
                keyboard["inline_keyboard"].append([
                    {"text": tx, "callback_data": "0"},
                    {"text": "🗑", "callback_data": "dll#" + tx},
                ])
            keyboard["inline_keyboard"].append([{"text": "• رجوع •", "callback_data": "back"}])
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "\n• مرحبا بك في قسم الردود 👮‍♀️\n\n"
                    "- يمكنك اضافه ردود وحذفها \n"
                    "- يمكنك استخدام الاوامر (اضف رد-مسح رد) \n\n"
                    "- اضغط على نص الزر لعرض محتواه . "
                ),
                "reply_markup": json.dumps(keyboard),
            })
        else:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "🌀 لم تقم بأضافة ردود ",
                "parse_mode": "Markdown",
                "reply_markup": json.dumps({"inline_keyboard": [[{"text": "• رجوع • ", "callback_data": "back"}]]}),
            })

    # ── dll# delete specific reply ────────────────────────────────────────
    if vss[0] == "dll" and "#" in s_p_p1:
        word_to_del = vss[1] if len(vss) > 1 else ""
        if word_to_del:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "🌀 تم حذف الرد بنجاح ",
                "parse_mode": "Markdown",
                "reply_markup": back_kb,
            })
            replies_arr = zune.get("setraddArmof") or []
            if word_to_del in replies_arr:
                replies_arr.remove(word_to_del)
            zune["setraddArmof"] = replies_arr
            word_entry = zune.get(word_to_del, {})
            for media_key in ("sticker", "photo", "video", "text", "animation", "voice", "audio"):
                word_entry.pop(media_key, None)
            if word_entry:
                zune[word_to_del] = word_entry
            elif word_to_del in zune:
                del zune[word_to_del]
            zune["addradArmof"] = "done"
            write_json(zune_path, zune)

    # ── delrd: delete all replies ─────────────────────────────────────────
    if s_p_p1 == "delrd":
        if namero_bots2 == admin:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": " 🌀تم الحذف ",
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": back_kb,
            })
            setrad_del = zune.get("setrad", "")
            zune.pop("setraddArmof", None)
            for media_key in ("text", "photo", "video", "voice", "animation", "sticker"):
                if setrad_del and isinstance(zune.get(setrad_del), dict):
                    zune[setrad_del].pop(media_key, None)
            write_json(zune_path, zune)

    # ── button editor (azrario) data handler ──────────────────────────────
    elif msg and saleh_text and zune.get("data") == namero_bots + ".don":
        entities = msg.get("entities") or []
        url_type = entities[0].get("type") if entities else ""
        if url_type != "url":
            await _bot(token, "sendMessage", {
                "chat_id": nameroch,
                "text": "*تم الحفظ *",
                "parse_mode": "MARKDOWN",
                "reply_to_message_id": mnamero_id,
                "reply_markup": back_kb,
            })
            if "azrar" not in zune:
                zune["azrar"] = {}
            setrad2 = zune.get("setrad", "")
            if setrad2 not in zune["azrar"]:
                zune["azrar"][setrad2] = {}
            zune["azrar"][setrad2]["text"] = saleh_text
            zune["data"] = namero_bots + ".done"
            write_json(zune_path, zune)

    # ═════════════════════════════════════════════════════════════════════
    # BUTTONS EDITOR SECTION (azrario)
    # ═════════════════════════════════════════════════════════════════════

    if s_p_p1 == "azraaddrd":
        if namero_bots2 == admin:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "\n• ارسل الان اسم الزر المراد اضافته\n",
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": back_kb,
            })
            zune["data"] = "s" + namero_bots2
            write_json(zune_path, zune)

    if msg and saleh_text and zune.get("data") == namero_bots + ".don":
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": (
                "*تم الحفظ *" +
                str(zune.get("azrar", {}).get(zune.get("setrad", ""), {}).get("text", ""))
            ),
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        if "azrar" not in zune:
            zune["azrar"] = {}
        setrad3 = zune.get("setrad", "")
        if setrad3 not in zune["azrar"]:
            zune["azrar"][setrad3] = {}
        zune["azrar"][setrad3]["text"] = saleh_text
        zune.pop("data", None)
        write_json(zune_path, zune)

    elif saleh_text and zune.get("data") == "s" + namero_bots:
        await _bot(token, "sendMessage", {
            "chat_id": nameroch,
            "text": "\n• ارسل الان محتوي الزر 💯\n",
            "parse_mode": "MARKDOWN",
            "reply_to_message_id": mnamero_id,
            "reply_markup": back_kb,
        })
        zune["data"] = namero_bots + ".don"
        zune["setrad"] = saleh_text
        if "azrari" not in zune:
            zune["azrari"] = []
        zune["azrari"].append(saleh_text)
        write_json(zune_path, zune)

    # ── azrario: list edited buttons ─────────────────────────────────────
    if s_p_p1 == "azrario":
        azrari_list = zune.get("azrari")
        if azrari_list:
            keyboard = {"inline_keyboard": []}
            for tx in azrari_list:
                keyboard["inline_keyboard"].append([
                    {"text": tx, "callback_data": "0"},
                    {"text": "🗑", "callback_data": "dll#" + tx},
                ])
            keyboard["inline_keyboard"].append([{"text": " • اضف زر • ", "callback_data": "azraaddrd"}])
            keyboard["inline_keyboard"].append([{"text": " • رجوع • ", "callback_data": "back"}])
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• مرحبا بك في قسم تعديل ازرار البوت 👋🏼\n\n"
                    "- يمكنك اضافه تعديلات للازرار وحذفها \n"
                    "- اضغط على نص الزر لعرض التعديل الذي اصبح عليه الزر ."
                ),
                "reply_markup": json.dumps(keyboard),
            })
        else:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": (
                    "• مرحبا بك في قسم تعديل ازرار البوت 👋🏼\n\n"
                    "- يمكنك اضافه تعديلات للازرار وحذفها \n"
                    "- اضغط على نص الزر لعرض التعديل الذي اصبح عليه الزر "
                ),
                "parse_mode": "Markdown",
                "reply_markup": json.dumps({"inline_keyboard": [
                    [{"text": " • اضف زر • ", "callback_data": "azraaddrd"}],
                    [{"text": "• رجوع • ", "callback_data": "back"}],
                ]}),
            })

    # ── dll# delete specific button ───────────────────────────────────────
    if vss[0] == "dll" and "#" in s_p_p1:
        btn_to_del = vss[1] if len(vss) > 1 else ""
        if btn_to_del:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": "* 🌀 تم حذف الزر بنجاح ",
                "parse_mode": "Markdown",
                "reply_markup": back_kb,
            })
            zune["data"] = "done"
            azrari2 = zune.get("azrari") or []
            if btn_to_del in azrari2:
                azrari2.remove(btn_to_del)
            zune["azrari"] = azrari2
            azrar_data = zune.get("azrar") or {}
            if btn_to_del in azrar_data:
                for mk in ("sticker", "photo", "video", "text", "animation", "voice", "audio"):
                    azrar_data[btn_to_del].pop(mk, None)
                zune["azrar"] = azrar_data
            type_list = zune.get("type") or []
            if isinstance(type_list, list) and btn_to_del in type_list:
                type_list.remove(btn_to_del)
                zune["type"] = type_list
            write_json(zune_path, zune)

    # ── azradelrd: delete all buttons ────────────────────────────────────
    if s_p_p1 == "azradelrd":
        if namero_bots2 == admin:
            await _bot(token, "editMessageText", {
                "chat_id": nameroch2,
                "message_id": mnamero_id2,
                "text": " 🌀 تم الحذف ",
                "parse_mode": "MarkDown",
                "disable_web_page_preview": True,
                "reply_markup": back_kb,
            })
            zune.pop("azrar", None)
            zune.pop("azrari", None)
            zune.pop("type", None)
            write_json(zune_path, zune)

    # ═════════════════════════════════════════════════════════════════════
    # BOT CONTROLLER PANEL (toch)
    # ═════════════════════════════════════════════════════════════════════

    toch_kb = json.dumps({"inline_keyboard": [
        [{"text": "جلب نسخه 🗳", "callback_data": "geet"}],
        [{"text": "رجوع", "callback_data": "back"}],
    ]})

    if s_p_p1 == "ت" and toch_kb:
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "*⚙: اهلا بك عزيزي \n\n"
                "في لوحه الاوامر ألخاصة لبوت الزخرفة\n"
                "*"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": toch_kb,
        })

    if s_p_p1 == "toch" and toch_kb:
        await _bot(token, "editMessageText", {
            "chat_id": nameroch2,
            "message_id": mnamero_id2,
            "text": (
                "*⚙: اهلا بك عزيزي \n\n"
                "في لوحه الاوامر ألخاصة لبوت الزخرفة\n"
                "*"
            ),
            "parse_mode": "MarkDown",
            "disable_web_page_preview": True,
            "reply_markup": toch_kb,
        })

    # ═════════════════════════════════════════════════════════════════════
    # FACTORY-LEVEL st_ch_bots MANDATORY SUBSCRIPTION CHECK (end of file)
    # ═════════════════════════════════════════════════════════════════════

    admin_file = os.path.join(bot_dir, "admin")
    member_file = os.path.join(bot_dir, "sudo", "member")
    ban_file = os.path.join(bot_dir, "sudo", "ban")
    pro_json_path = os.path.join(bot_dir, "pro")
    namero_json_path = os.path.join(os.path.dirname(bot_dir), "NAMERO")

    watawjson = read_json(namero_json_path, {"info": {}})
    st_ch_bots = watawjson.get("info", {}).get("st_ch_bots")
    id_ch_sudo1 = watawjson.get("info", {}).get("id_channel")
    link_ch_sudo1 = watawjson.get("info", {}).get("link_channel")
    id_ch_sudo2 = watawjson.get("info", {}).get("id_channel2")
    link_ch_sudo2 = watawjson.get("info", {}).get("link_channel2")

    projson = read_json(pro_json_path, {"info": {}})
    pro = projson.get("info", {}).get("pro")

    from_id_val = f["from_id"]

    if msg and (st_ch_bots in ("✅", "مفعل")) and pro != "yes":
        if id_ch_sudo1:
            stuts1 = await check_member(token, str(id_ch_sudo1), from_id_val)
            if stuts1 == "no":
                await _bot(token, "sendMessage", {
                    "chat_id": f["chat_id"],
                    "reply_to_message_id": f["message_id"],
                    "text": (
                        "⁦⁉️⁩ عذرا عزيزي يجب الاشتراك في قناة البوت أولا وهذا يساعد مصنع المبرمج ناميرو علي الاستمرار 🗣\n"
                        "            \n• ثم اضغط /start ⚙️️"
                    ),
                    "disable_web_page_preview": True,
                    "parse_mode": "markdown",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "اضغط للاشتراك في القناة", "url": f"https://t.me/{link_ch_sudo1}"}]
                    ]}),
                })
                return True

        if id_ch_sudo2:
            stuts2 = await check_member(token, str(id_ch_sudo2), from_id_val)
            if stuts2 == "no":
                await _bot(token, "sendMessage", {
                    "chat_id": f["chat_id"],
                    "reply_to_message_id": f["message_id"],
                    "text": (
                        "⁦⁉️⁩ عذرا عزيزي يجب الاشتراك في قناة البوت أولا وهذا يساعد مصنع المبرمج ناميرو علي الاستمرار 🗣\n"
                        "            \n• ثم اضغط /start ⚙️️"
                    ),
                    "disable_web_page_preview": True,
                    "parse_mode": "markdown",
                    "reply_markup": json.dumps({"inline_keyboard": [
                        [{"text": "اضغط للاشتراك في القناة", "url": f"https://t.me/{link_ch_sudo2}"}]
                    ]}),
                })
                return True

    return False


# ══════════════════════════════════════════════════════════════════════════════
# نظام Polling — يعمل عند تشغيل الملف مباشرةً:
#   python saleh_handler.py <bot_dir>
#   مثال: python saleh_handler.py botmak/mybotfolder
# ══════════════════════════════════════════════════════════════════════════════

_POLL_TIMEOUT = 30
_RETRY_DELAY  = 0.5  # تقليل من 5 إلى 0.5 ثانية
_MAX_ERRORS   = 10


async def _delete_webhook(token: str, name: str = "SALEH"):
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
        print(f"[SALEH] getUpdates error: {e}")
    return []


async def _run_polling(bot_dir: str):
    token_path = os.path.join(bot_dir, "token")
    admin_path = os.path.join(bot_dir, "admin")

    if not file_exists(token_path):
        print(f"[SALEH] ❌ لم يتم العثور على {token_path}")
        return
    if not file_exists(admin_path):
        print(f"[SALEH] ❌ لم يتم العثور على {admin_path}")
        return

    token    = read_file(token_path).strip()
    admin_id = read_file(admin_path).strip()

    # ─── ds (معرف المشرف العام) من قاعدة البيانات - بدلاً من ملف saleh_admin ───
    ds = get_config("saleh_admin", str(getattr(config, "DEVELOPER_ID", "")))

    if not token:
        print("[SALEH] ❌ token فارغ")
        return

    bot_name = os.path.basename(os.path.abspath(bot_dir))

    print("=" * 55)
    print(f"  NaMero Robots — SALEH Bot Polling")
    print(f"  by @NameroBots | @S_P_P1")
    print(f"  المجلد : {bot_dir}  |  الادمن : {admin_id}")
    print("=" * 55)

    await _delete_webhook(token, bot_name)

    offset      = 0
    error_count = 0

    while True:
        try:
            # ─── إعادة تحميل إعدادات المصنع في كل دورة (يلتقط أي تغييرات) ───
            namero_json = read_json("botmak/NAMERO", {"info": {}})
            makerinve   = namero_json.get("info", {})

            updates = await _get_updates(token, offset)
            error_count = 0

            for update in updates:
                offset = update["update_id"] + 1
                try:
                    await handle_saleh(
                        token     = token,
                        bot_dir   = bot_dir,
                        update    = update,
                        admin_id  = admin_id,
                        ds        = ds,
                        makerinve = makerinve,
                    )
                except Exception as e:
                    print(f"[{bot_name}] ❌ خطأ في التحديث {update.get('update_id')}: {e}")

        except asyncio.CancelledError:
            print(f"[{bot_name}] ⛔ تم إيقاف الـ Polling")
            break
        except Exception as e:
            error_count += 1
            print(f"[{bot_name}] ❌ خطأ ({error_count}/{_MAX_ERRORS}): {e}")
            if error_count >= _MAX_ERRORS:
                await asyncio.sleep(1)
                error_count = 0
            else:
                await asyncio.sleep(0.5)


async def _main():
    bot_dir = sys.argv[1] if len(sys.argv) > 1 else "."

    if not os.path.isdir(bot_dir):
        print(f"[SALEH] ❌ المجلد غير موجود: {bot_dir}")
        sys.exit(1)

    loop = asyncio.get_running_loop()
    task = asyncio.create_task(_run_polling(bot_dir))

    def _stop(sig):
        print(f"\n[SALEH] إشارة إيقاف ({sig.name})")
        task.cancel()

    for sig in (signal.SIGINT, signal.SIGTERM):
        try:
            loop.add_signal_handler(sig, _stop, sig)
        except (NotImplementedError, RuntimeError):
            pass

    await asyncio.gather(task, return_exceptions=True)


if __name__ == "__main__":
    asyncio.run(_main())
