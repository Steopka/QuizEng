import logging

# Настройка логирования
logging.basicConfig(level=logging.DEBUG,
                    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
                    datefmt='%Y-%m-%d %H:%M:%S',
                    filename='app.log',
                    filemode='w',
                    encoding='utf-8')  # Указываем кодировку UTF-8

# Создание логгера
logger = logging.getLogger(__name__)

# Пример использования логирования
logger.debug('Это сообщение отладки')
logger.info('Это информационное сообщение')
logger.warning('Это предупреждение')
logger.error('Это сообщение об ошибке')
logger.critical('Это критическое сообщение')

try:
    1 / 0
except ZeroDivisionError as e:
    logger.exception('Произошло исключение')
