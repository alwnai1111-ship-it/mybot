import os, sys
target = os.path.join(
    os.path.dirname(os.path.dirname(os.path.abspath(__file__))),
    'mybot-main', 'bot-main', 'run.py'
)
os.execv(sys.executable, [sys.executable, target])
