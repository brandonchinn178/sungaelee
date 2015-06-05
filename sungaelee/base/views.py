from django.views.generic import TemplateView
from django.contrib.auth.views import login as django_login

def login(request):
    if request.user.is_authenticated():
        return redirect('admin:home')
    else:
        return django_login(request, template_name='base/login.html')

class HomeView(TemplateView):
    template_name = 'base/home.html'

# about view (model view)
