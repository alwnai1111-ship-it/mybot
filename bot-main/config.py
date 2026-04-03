"""
Central Configuration File - ملف التكوين المركزي
جميع الإعدادات الأساسية في مكان واحد
"""

from pathlib import Path

# ============ المسارات ============
BASE_DIR = Path.cwd()
DB_DIR = BASE_DIR / "db"
LOGS_DIR = BASE_DIR / "logs"
CACHE_DIR = BASE_DIR / ".cache"

DB_DIR.mkdir(exist_ok=True)
LOGS_DIR.mkdir(exist_ok=True)
CACHE_DIR.mkdir(exist_ok=True)

# ============ قاعدة البيانات ============
DATABASE_PATH = str(DB_DIR / "bot_data.db")

# ============ بيانات الاعتماد ============
TOKEN = "5892582536:AAGnc7hxSfEque9vSKK5BueykFDYFhFnoaY"  # توكن البوت
DEVELOPER_ID = 1116907157  # معرف المطور الرئيسي
DEVELOPER_USERNAME = "namero"  # اسم مستخدم المطور (بدون @)
ADMIN_IDS = [1116907157, 123456789, 987654321]  # معرفات الأدمنية

TELEGRAM_API_URL = "https://api.telegram.org"

# ============ إعدادات الأداء ============
POLLING_TIMEOUT = 30
POLLING_INTERVAL = 1
MAX_RETRIES = 3
RETRY_DELAY = 5
CONNECTION_POOL_SIZE = 10
REQUEST_TIMEOUT = 30.0

# ============ إعدادات الإذاعة ============
BROADCAST_BATCH_SIZE = 50  # عدد الرسائل في كل دفعة
BROADCAST_DELAY = 0.1  # التأخير بين الرسائل (ثانية)

# ============ أنماط البوتات المدعومة ============
BOT_TYPES = {
    "1": "تواصل",
    "2": "متجر",
    "3": "تذكير",
    "4": "إحصائيات",
    "5": "ألعاب",
}

# قائمة القنوات الإلزامية التي يجب أن ينضم إليها المستخدم قبل استخدام المصنع
REQUIRED_CHANNELS = [
    # أضف هنا القنوات مثل "@mychannel" حسب بيانات NaMero
]

# نص الرسالة التوضيحية عند طلب الانضمام للقنوات
REQUIRED_CHANNELS_MESSAGE = (
    "🛡️ لتستخدم بوت المصنع، يرجى الاشتراك في القنوات التالية أولاً:\n"
    "- @example_channel1\n"
    "- @example_channel2\n\n"
    "بعد الإشتراك، أرسل /start مجدداً."
)


# ============ الرسائل الافتراضية ============
DEFAULT_MESSAGES = {
    "welcome": "👋 مرحباً {name}! أهلاً بك في البوت.",
    "start": "🚀 البوت يعمل الآن.",
    "bot_off": "🔌 البوت موقوف حالياً. حاول لاحقاً.",
    "not_admin": "❌ هذا الأمر مخصص للأدمنية فقط.",
    "broadcast_sent": "✅ تمّت الإذاعة! تم الإرسال إلى: {success}, فشل: {failed}",
}

# ============ إعدادات السجل (Logging) ============
LOG_LEVEL = "INFO"
LOG_FORMAT = "%(asctime)s - %(name)s - %(levelname)s - %(message)s"

# ============ إعدادات الكاش ============
CACHE_TTL = 3600  # ثانية
CACHE_SIZE = 1000  # عدد العناصر

# ============ إعدادات الأمان ============
MAX_MESSAGE_LENGTH = 4096
MAX_BROADCAST_SIZE = 1000
RATE_LIMIT = 30  # رسالة في الدقيقة

# ============ وظائف المساعدة ============
def get_database_path() -> str:
    """الحصول على مسار قاعدة البيانات"""
    return DATABASE_PATH

def get_admin_ids() -> list:
    """الحصول على قائمة معرّفات الأدمنية"""
    return ADMIN_IDS

def is_admin(user_id: int) -> bool:
    """التحقق من كون المستخدم أدمن"""
    return user_id in ADMIN_IDS

def get_bot_type_name(bot_type_id: str) -> str:
    """الحصول على اسم نوع البوت"""
    return BOT_TYPES.get(bot_type_id, "غير معروف")
