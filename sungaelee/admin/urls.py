from django.conf.urls import url
from admin.views import *

urlpatterns = [
    url(r'^$', AdminHomeView.as_view(), name='home'),
]
