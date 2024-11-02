from django.shortcuts import render
from django.http import JsonResponse
from django.contrib.auth.hashers import make_password
from django.core.exceptions import ValidationError
from .models import User

def register_user(request):
    if request.method == 'POST':
        login = request.POST.get('login')
        password = request.POST.get('password')

        # Валидация данных
        if not login or not password:
            return JsonResponse({'error': 'Login and password are required'}, status=400)

        # Проверка на существование пользователя с таким логином
        if User.objects.filter(login=login).exists():
            return JsonResponse({'error': 'User with this login already exists'}, status=400)

        # Хеширование пароля перед сохранением
        hashed_password = make_password(password)

        # Сохранение пользователя в базе данных
        user = User(login=login, password=hashed_password)
        try:
            user.save()
            return JsonResponse({'message': 'User registered successfully!'})
        except ValidationError as e:
            return JsonResponse({'error': str(e)}, status=400)

    return JsonResponse({'error': 'Invalid request'}, status=400)
