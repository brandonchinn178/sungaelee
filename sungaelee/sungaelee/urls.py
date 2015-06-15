from django.conf.urls import include, url
from base.views import HomeView
from admin import urls as admin_urls

urlpatterns = [
    url(r'^$', HomeView.as_view(), name='home'),
    url(r'^admin/$', include(admin_urls, namespace='admin')),
    url(r'^login/$', 'base.views.login', name='login'),
    url(r'^logout/$', 'django.contrib.auth.views.logout', {'next_page': 'home'}, name='logout'),
]
