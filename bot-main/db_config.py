"""
نظام الإعدادات عبر قاعدة البيانات
بديل كامل لملفات النص: userbot, xx, xxx, saleh_admin, base_url
"""

import sqlite3
import os
from threading import Lock

_DB_PATH = os.path.join(os.path.dirname(os.path.abspath(__file__)), "db", "bot_data.db")
_lock = Lock()


def _get_conn() -> sqlite3.Connection:
    conn = sqlite3.connect(_DB_PATH, timeout=10)
    conn.row_factory = sqlite3.Row
    conn.execute("PRAGMA journal_mode=WAL")
    conn.execute('''
        CREATE TABLE IF NOT EXISTS system_config (
            config_key   TEXT PRIMARY KEY,
            config_value TEXT NOT NULL,
            updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ''')
    conn.commit()
    return conn


def get_config(key: str, default: str = "") -> str:
    """قراءة قيمة إعداد من قاعدة البيانات - مع fallback للقيمة الافتراضية"""
    try:
        with _lock:
            conn = _get_conn()
            try:
                row = conn.execute(
                    "SELECT config_value FROM system_config WHERE config_key = ?",
                    (key,)
                ).fetchone()
                return str(row[0]) if row else default
            finally:
                conn.close()
    except Exception:
        return default


def set_config(key: str, value: str) -> bool:
    """حفظ قيمة إعداد في قاعدة البيانات"""
    try:
        with _lock:
            conn = _get_conn()
            try:
                conn.execute(
                    "INSERT OR REPLACE INTO system_config (config_key, config_value, updated_at) "
                    "VALUES (?, ?, CURRENT_TIMESTAMP)",
                    (key, str(value))
                )
                conn.commit()
                return True
            finally:
                conn.close()
    except Exception as e:
        print(f"[DB Config] خطأ في حفظ '{key}': {e}")
        return False


def delete_config(key: str) -> bool:
    """حذف إعداد من قاعدة البيانات"""
    try:
        with _lock:
            conn = _get_conn()
            try:
                conn.execute("DELETE FROM system_config WHERE config_key = ?", (key,))
                conn.commit()
                return True
            finally:
                conn.close()
    except Exception:
        return False


def get_all_configs() -> dict:
    """جلب جميع الإعدادات"""
    try:
        with _lock:
            conn = _get_conn()
            try:
                rows = conn.execute("SELECT config_key, config_value FROM system_config").fetchall()
                return {row[0]: row[1] for row in rows}
            finally:
                conn.close()
    except Exception:
        return {}
