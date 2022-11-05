from django.db import models
from django import forms
from django.forms import CharField, TextInput, ModelForm, Textarea
from django.contrib.auth.models import User

class Media(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True)
    mediaFile = models.FileField(upload_to="user")
    name = models.CharField(max_length=1024) 

class Site(models.Model):
    name = models.CharField(max_length=255, blank=True, unique=True)
    user = models.ForeignKey(User, on_delete=models.CASCADE)

class Article(models.Model):
    slug = models.CharField(max_length=255, blank=True, unique=True)
    content = models.TextField(blank=True)
    site = models.ForeignKey(Site, on_delete=models.CASCADE, null=True)

class ArticleForm(ModelForm):
    class Meta:
        model = Article
        fields = ['slug', 'content'] 
