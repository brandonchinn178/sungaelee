from django.views.generic import TemplateView
from django.shortcuts import redirect
from django.core.urlresolvers import reverse_lazy

LOGIN_URL = reverse_lazy('login')

def admin_mixin(view_cls):
    """
    A function that generates a superclass for all Admin views. This superclass checks to
    see if the user is logged in; otherwise will redirect to the login page.
    """
    class AdminMixin(view_cls):
        def dispatch(self, request, *args, **kwargs):
            if request.user.is_authenticated():
                return super(AdminMixin, self).dispatch(request, *args, **kwargs)
            else:
                return redirect('%s?next=%s' % (LOGIN_URL, request.path))
    return AdminMixin

class AdminHomeView(admin_mixin(TemplateView)):
    template_name = 'admin/home.html'
