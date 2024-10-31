DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql',
        'NAME': 'your_mysql_database_name',
        'USER': 'your_mysql_user',
        'PASSWORD': 'your_mysql_password',
        'HOST': 'localhost',  # или hostname, где запущен MySQL-сервер
        'PORT': '3306',  # или порт, на котором слушает MySQL-сервер
    }
}
