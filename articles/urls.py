from django.urls import path
from .views import ArticleListView, ArticleCreateView, ArticleUpdateView, ArticleDeleteView

urlpatterns = [
    path('', ArticleListView.as_view(), name='article-list'),
    path('create/', ArticleCreateView.as_view(), name='article-create'),
    path('<int:pk>', ArticleUpdateView.as_view(), name='article-update'),
    path('<int:pk>/delete', ArticleDeleteView.as_view(), name='article-delete'),
]
