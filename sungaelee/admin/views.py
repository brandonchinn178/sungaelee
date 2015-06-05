from django.views.generic import TemplateView

class AdminHomeView(TemplateView):
    template_name = 'admin/home.html'
