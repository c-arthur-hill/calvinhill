from django.urls import reverse_lazy
from django.views.generic import ListView
from django.views.generic.edit import CreateView, DeleteView, UpdateView
from .models import Article, ArticleForm

class ArticleListView(ListView):
    model = Article

class ArticleCreateView(CreateView):
    success_url = reverse_lazy('article-list')
    fields = ['slug', 'content'] 
    model = Article


class ArticleUpdateView(CreateView):
    success_url = reverse_lazy('article-list')
    fields = ['slug', 'content'] 
    model = Article


class ArticleDeleteView(DeleteView):
    success_url = reverse_lazy('article-list')
    model = Article
