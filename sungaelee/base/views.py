from django.views.generic import TemplateView

# home view (templateview)
class HomeView(TemplateView):
    template_name = 'base/home.html'

# bio view (model view)
