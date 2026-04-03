import httpx
import asyncio
import json
import os
import threading
from datetime import datetime
from typing import Any, Optional

TELEGRAM_API = "https://api.telegram.org/bot{token}/{method}"

async def bot_call(token: str, method: str, data: dict = None, timeout: float = 30.0) -> dict:
    url = TELEGRAM_API.format(token=token, method=method)
    try:
        async with httpx.AsyncClient(timeout=timeout) as client:
            if data:
                resp = await client.post(url, data=data)
            else:
                resp = await client.get(url)
            return resp.json()
    except Exception as e:
        return {"ok": False, "description": str(e)}

async def bot_get(token: str, method: str, params: dict = None, timeout: float = 30.0) -> dict:
    url = TELEGRAM_API.format(token=token, method=method)
    try:
        async with httpx.AsyncClient(timeout=timeout) as client:
            resp = await client.get(url, params=params)
            return resp.json()
    except Exception as e:
        return {"ok": False, "description": str(e)}

# ============================================================================
# استخدام نظام الملفات العادي - أسرع وأبسط من SQLite
# ============================================================================

_FS_LOCK = threading.RLock()  # RLock لتجنب deadlock

def ensure_dir(path: str) -> None:
    """إنشاء المجلد إذا لم يكن موجود"""
    try:
        if path and not os.path.exists(path):
            os.makedirs(path, exist_ok=True)
    except:
        pass

def read_file(path: str, default: str = "") -> str:
    """قراءة الملف بسرعة من النظام الملفات"""
    try:
        if os.path.exists(path):
            with open(path, 'r', encoding='utf-8') as f:
                return f.read()
    except:
        pass
    return default

def write_file(path: str, content: str) -> None:
    """كتابة الملف بسرعة"""
    try:
        # تأكد من وجود المجلد الأب
        dir_path = os.path.dirname(path)
        if dir_path:
            ensure_dir(dir_path)
        
        with _FS_LOCK:
            with open(path, 'w', encoding='utf-8') as f:
                f.write(content)
    except Exception as e:
        print(f"خطأ في كتابة {path}: {e}")

def append_file(path: str, content: str) -> None:
    """إضافة للملف بسرعة"""
    try:
        dir_path = os.path.dirname(path)
        if dir_path:
            ensure_dir(dir_path)
        
        with _FS_LOCK:
            with open(path, 'a', encoding='utf-8') as f:
                f.write(content)
    except Exception as e:
        print(f"خطأ في إضافة لـ {path}: {e}")

def read_json(path: str, default: dict = None) -> dict:
    """قراءة ملف JSON"""
    if default is None:
        default = {}
    try:
        content = read_file(path, "")
        if content:
            return json.loads(content)
    except:
        pass
    return default

def write_json(path: str, data: dict) -> None:
    """كتابة ملف JSON"""
    try:
        text = json.dumps(data, ensure_ascii=False, indent=2)
        write_file(path, text)
    except Exception as e:
        print(f"خطأ في كتابة JSON {path}: {e}")

def file_lines(path: str) -> list:
    """قراءة أسطر الملف"""
    content = read_file(path, "")
    if not content:
        return []
    return [l.strip() for l in content.split("\n") if l.strip()]

def file_exists(path: str) -> bool:
    """التحقق من وجود الملف"""
    return os.path.exists(path)

def delete_file(path: str) -> None:
    """حذف الملف"""
    try:
        if os.path.exists(path):
            with _FS_LOCK:
                os.remove(path)
    except:
        pass

def get_chat_member_status(response_text: str) -> str:
    if '"status":"left"' in response_text or '"Bad Request:' in response_text or '"status":"kicked"' in response_text:
        return "no"
    return "yes"

async def check_member(token: str, channel_id: str, user_id) -> str:
    result = await bot_get(token, "getChatMember", {"chat_id": channel_id, "user_id": user_id})
    status = result.get("result", {}).get("status", "left") if result.get("ok") else "left"
    if status in ("left", "kicked") or not result.get("ok"):
        return "no"
    return "yes"

async def get_chat_admins_ok(token: str, chat_id: str) -> bool:
    result = await bot_get(token, "getChatAdministrators", {"chat_id": chat_id})
    return result.get("ok", False)

def parse_update(body: bytes) -> dict:
    try:
        return json.loads(body)
    except:
        return {}

def extract_update_fields(update: dict) -> dict:
    fields = {
        "message": None, "callback": None,
        "chat_id": None, "from_id": None, "message_id": None,
        "text": None, "data": None, "name": None, "user": None,
        "caption": None, "photo": None, "video": None,
        "document": None, "sticker": None, "voice": None, "audio": None,
        "forward_from_chat": None, "forward_from": None,
        "reply_to_message": None, "new_chat_members": None,
        "chat_type": None, "channel_post": None,
    }
    msg = update.get("message")
    cb = update.get("callback_query")
    ch_post = update.get("channel_post")

    if msg:
        fields["message"] = msg
        fields["chat_id"] = msg.get("chat", {}).get("id")
        fields["from_id"] = msg.get("from", {}).get("id")
        fields["message_id"] = msg.get("message_id")
        fields["text"] = msg.get("text", "")
        fields["caption"] = msg.get("caption", "")
        fields["name"] = msg.get("from", {}).get("first_name", "")
        fields["user"] = msg.get("from", {}).get("username", "")
        fields["photo"] = msg.get("photo")
        fields["video"] = msg.get("video")
        fields["document"] = msg.get("document")
        fields["sticker"] = msg.get("sticker")
        fields["voice"] = msg.get("voice")
        fields["audio"] = msg.get("audio")
        fields["forward_from_chat"] = msg.get("forward_from_chat")
        fields["forward_from"] = msg.get("forward_from")
        fields["reply_to_message"] = msg.get("reply_to_message")
        fields["new_chat_members"] = msg.get("new_chat_members")
        fields["chat_type"] = msg.get("chat", {}).get("type")

    if cb:
        fields["callback"] = cb
        fields["data"] = cb.get("data", "")
        if not fields["chat_id"]:
            fields["chat_id"] = cb.get("message", {}).get("chat", {}).get("id")
        fields["from_id"] = cb.get("from", {}).get("id")
        if not fields["message_id"]:
            fields["message_id"] = cb.get("message", {}).get("message_id")
        fields["name"] = cb.get("from", {}).get("first_name", "")
        fields["user"] = cb.get("from", {}).get("username", "")
        if not fields["text"]:
            fields["text"] = ""

    if ch_post:
        fields["channel_post"] = ch_post

    return fields

async def set_webhook(token: str, url: str) -> dict:
    return await bot_get(token, "setWebhook", {"url": url})

async def delete_webhook(token: str) -> dict:
    return await bot_get(token, "deleteWebhook")

async def get_me(token: str) -> dict:
    return await bot_get(token, "getMe")

async def get_webhook_info(token: str) -> dict:
    return await bot_get(token, "getWebhookInfo")


# ========================================
# Lightweight compatibility layer from core/telegram_api.py
# ========================================

from dataclasses import dataclass
from typing import Dict, Optional, Any, List


class TelegramAPI:
    """
    واجهة برمجة تطبيقات Telegram محسّنة
    مع دعم connection pooling والـ context manager
    """

    BASE_URL = "https://api.telegram.org"

    def __init__(self, timeout: float = 30.0, pool_size: int = 10):
        self.timeout = timeout
        self.pool_size = pool_size
        self._session: Optional[httpx.AsyncClient] = None

    async def __aenter__(self):
        self._session = httpx.AsyncClient(
            timeout=self.timeout,
            limits=httpx.Limits(max_connections=self.pool_size)
        )
        return self

    async def __aexit__(self, exc_type, exc_val, exc_tb):
        if self._session:
            await self._session.aclose()

    def _get_url(self, token: str, method: str) -> str:
        return f"{self.BASE_URL}/bot{token}/{method}"

    async def call(self, token: str, method: str, data: Dict = None,
                   timeout: float = None) -> Dict:
        if not self._session:
            raise RuntimeError("لم يتم تهيئة الجلسة. استخدم async with")

        url = self._get_url(token, method)
        timeout = timeout or self.timeout

        try:
            response = await self._session.post(url, data=data, timeout=timeout)
            return response.json()
        except httpx.TimeoutException:
            return {"ok": False, "description": "انتهت مهلة الانتظار"}
        except Exception as e:
            return {"ok": False, "description": str(e)}

    async def get(self, token: str, method: str, params: Dict = None,
                  timeout: float = None) -> Dict:
        if not self._session:
            raise RuntimeError("لم يتم تهيئة الجلسة. استخدم async with")

        url = self._get_url(token, method)
        timeout = timeout or self.timeout

        try:
            response = await self._session.get(url, params=params, timeout=timeout)
            return response.json()
        except httpx.TimeoutException:
            return {"ok": False, "description": "انتهت مهلة الانتظار"}
        except Exception as e:
            return {"ok": False, "description": str(e)}

    async def send_message(self, token: str, chat_id: int, text: str, **kwargs) -> Dict:
        data = {
            "chat_id": chat_id,
            "text": text,
            **kwargs
        }

        if "reply_markup" in data and isinstance(data["reply_markup"], (dict, list)):
            import json as _json
            data["reply_markup"] = _json.dumps(data["reply_markup"], ensure_ascii=False)

        return await self.call(token, "sendMessage", data)

    async def send_photo(self, token: str, chat_id: int, photo: str, **kwargs) -> Dict:
        data = {
            "chat_id": chat_id,
            "photo": photo,
            **kwargs
        }
        return await self.call(token, "sendPhoto", data)

    async def send_document(self, token: str, chat_id: int, document: str, **kwargs) -> Dict:
        data = {
            "chat_id": chat_id,
            "document": document,
            **kwargs
        }
        return await self.call(token, "sendDocument", data)

    async def edit_message(self, token: str, chat_id: int, message_id: int,
                           text: str, **kwargs) -> Dict:
        data = {
            "chat_id": chat_id,
            "message_id": message_id,
            "text": text,
            **kwargs
        }
        return await self.call(token, "editMessageText", data)

    async def delete_message(self, token: str, chat_id: int, message_id: int) -> Dict:
        data = {
            "chat_id": chat_id,
            "message_id": message_id
        }
        return await self.call(token, "deleteMessage", data)

    async def get_updates(self, token: str, offset: int = 0, timeout: int = 30) -> Dict:
        params = {
            "offset": offset,
            "timeout": timeout,
            "allowed_updates": []
        }
        return await self.get(token, "getUpdates", params, timeout=timeout + 5)

    async def get_chat_member(self, token: str, chat_id: str, user_id: int) -> Dict:
        params = {
            "chat_id": chat_id,
            "user_id": user_id
        }
        return await self.get(token, "getChatMember", params)

    async def forward_message(self, token: str, chat_id: int, from_chat_id: int,
                             message_id: int) -> Dict:
        data = {
            "chat_id": chat_id,
            "from_chat_id": from_chat_id,
            "message_id": message_id
        }
        return await self.call(token, "forwardMessage", data)

    async def get_me(self, token: str) -> Dict:
        return await self.get(token, "getMe", {})

    async def batch_send_messages(self, token: str, user_ids: list, text: str,
                                 batch_size: int = 50, delay: float = 0.1) -> Dict:
        results = {
            "success": 0,
            "failed": 0,
            "errors": []
        }

        for i in range(0, len(user_ids), batch_size):
            batch = user_ids[i:i + batch_size]
            for user_id in batch:
                try:
                    response = await self.send_message(token, user_id, text,
                                                      parse_mode="Markdown")
                    if response.get("ok"):
                        results["success"] += 1
                    else:
                        results["failed"] += 1
                        results["errors"].append({
                            "user_id": user_id,
                            "error": response.get("description")
                        })
                except Exception as e:
                    results["failed"] += 1
                    results["errors"].append({
                        "user_id": user_id,
                        "error": str(e)
                    })

                await asyncio.sleep(delay)

        return results


# singleton compatibility functions
_telegram_api: Optional[TelegramAPI] = None

async def get_telegram_api() -> TelegramAPI:
    global _telegram_api
    if _telegram_api is None:
        _telegram_api = TelegramAPI()
    return _telegram_api

async def close_telegram_api():
    global _telegram_api
    if _telegram_api and _telegram_api._session:
        await _telegram_api._session.aclose()
        _telegram_api = None


# ========================================
# Event Processor layer from core/event_processor.py
# ========================================


@dataclass
class UpdateContext:
    update_id: int
    timestamp: datetime
    user_id: int
    chat_id: int
    message_id: Optional[int] = None
    text: Optional[str] = None
    command: Optional[str] = None
    callback_data: Optional[str] = None
    message_type: str = "text"
    is_private: bool = True
    is_admin: bool = False
    username: Optional[str] = None
    first_name: Optional[str] = None
    last_name: Optional[str] = None
    reply_to_id: Optional[int] = None
    forwarded: bool = False
    raw_update: Dict = None


class EventProcessor:
    @staticmethod
    def extract_update_context(update: Dict, admin_ids: list = None) -> Optional[UpdateContext]:
        if admin_ids is None:
            admin_ids = []

        message = update.get("message") or {}
        callback = update.get("callback_query") or {}

        if not message and not callback:
            return None

        if message:
            chat_id = message.get("chat", {}).get("id")
            user_id = message.get("from", {}).get("id")
            message_id = message.get("message_id")
            text = message.get("text") or ""
            timestamp = datetime.fromtimestamp(message.get("date", 0))
            is_private = message.get("chat", {}).get("type") == "private"
        else:
            chat_id = callback.get("message", {}).get("chat", {}).get("id")
            user_id = callback.get("from", {}).get("id")
            message_id = callback.get("message", {}).get("message_id")
            text = ""
            timestamp = datetime.now()
            is_private = True

        username = (message.get("from", {}).get("username") or 
                    callback.get("from", {}).get("username") or "").lower()
        first_name = (message.get("from", {}).get("first_name") or 
                      callback.get("from", {}).get("first_name") or "")
        last_name = (message.get("from", {}).get("last_name") or 
                     callback.get("from", {}).get("last_name") or "")

        message_type = "text"
        if message.get("photo"):
            message_type = "photo"
        elif message.get("video"):
            message_type = "video"
        elif message.get("document"):
            message_type = "document"
        elif message.get("voice"):
            message_type = "voice"
        elif message.get("audio"):
            message_type = "audio"
        elif message.get("sticker"):
            message_type = "sticker"
        elif callback:
            message_type = "callback"

        command = None
        if text.startswith("/"):
            command = text.split()[0][1:]

        callback_data = callback.get("data") if callback else None
        reply_to_id = message.get("reply_to_message", {}).get("message_id") if message else None
        forwarded = bool(message.get("forward_from")) if message else False

        return UpdateContext(
            update_id=update.get("update_id", 0),
            timestamp=timestamp,
            user_id=user_id,
            chat_id=chat_id,
            message_id=message_id,
            text=text,
            command=command,
            callback_data=callback_data,
            message_type=message_type,
            is_private=is_private,
            is_admin=user_id in admin_ids,
            username=username,
            first_name=first_name,
            last_name=last_name,
            reply_to_id=reply_to_id,
            forwarded=forwarded,
            raw_update=update
        )

    @staticmethod
    def should_process_update(context: UpdateContext, bot_status: str = "on") -> bool:
        if bot_status == "off" and not context.is_admin:
            return False

        if not context.text and not context.callback_data and context.message_type == "text":
            return False

        return True

    @staticmethod
    def format_log_entry(context: UpdateContext, action: str, details: str = None) -> Dict:
        return {
            "timestamp": context.timestamp.isoformat(),
            "user_id": context.user_id,
            "chat_id": context.chat_id,
            "action": action,
            "details": details or "",
            "message_type": context.message_type,
            "is_admin": context.is_admin
        }


class CommandRouter:
    def __init__(self):
        self.commands = {}
        self.callback_handlers = {}

    def register_command(self, cmd: str, handler):
        self.commands[cmd] = handler

    def register_callback(self, callback_prefix: str, handler):
        self.callback_handlers[callback_prefix] = handler

    async def route_command(self, context: UpdateContext) -> bool:
        if not context.command:
            return False

        handler = self.commands.get(context.command)
        if handler:
            return await handler(context)
        return False

    async def route_callback(self, context: UpdateContext) -> bool:
        if not context.callback_data:
            return False

        for prefix, handler in self.callback_handlers.items():
            if context.callback_data.startswith(prefix):
                return await handler(context)
        return False


class MessageProcessor:
    @staticmethod
    def clean_text(text: str) -> str:
        return text.strip() if text else ""

    @staticmethod
    def extract_hashtags(text: str) -> List[str]:
        import re
        return re.findall(r"#\w+", text)

    @staticmethod
    def extract_mentions(text: str) -> List[str]:
        import re
        return re.findall(r"@[\w_]+", text)

    @staticmethod
    def extract_urls(text: str) -> List[str]:
        import re
        pattern = r'https?://(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&/=]*)'
        return re.findall(pattern, text)

    @staticmethod
    def truncate_text(text: str, max_length: int = 4096) -> str:
        if len(text) > max_length:
            return text[:max_length - 3] + "..."
        return text

