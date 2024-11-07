from django.views.generic import ListView
from .models import Quiz # type: ignore

class QuizListView(ListView):
    model = Quiz
    template_name = 'quiz_list.html'#поменять имя файл
    context_object_name = 'quizzes'
