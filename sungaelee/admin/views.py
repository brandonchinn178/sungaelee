from django.views.generic import TemplateView
from django.shortcuts import redirect

def admin_mixin(view_cls):
    """
    A function that generates a superclass for all Admin views. This superclass checks to
    see if the user is logged in; otherwise will redirect to the login page.
    """
    class AdminMixin(view_cls):
        def dispatch(self, request, *args, **kwargs):
            if request.user.is_authenticated():
                super(AdminMixin, self).dispatch(request, *args, **kwargs)
            else:
                return redirect('login')
    return AdminMixin

class AdminHomeView(admin_mixin(TemplateView)):
    template_name = 'admin/home.html'
