from django.urls import include, path
from .views import register_user

urlpatterns = [
    path('register/', register_user, name='register_user'),
    path('your_app_name/', include('your_app_name.urls')),  # Замените 'your_app_name' на реальное имя вашего приложения
    # другие пути
]
