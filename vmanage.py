import os
import sys

BASE_COMMAND = 'vagrant ssh -c "source ~/venv/bin/activate; cd /vagrant/sungaelee; %s"'


def print_and_run_system(cmd):
    print "[Exec] " + BASE_COMMAND % cmd
    os.system(BASE_COMMAND % cmd)

if __name__ == '__main__':
    if sys.argv[1] == 'runserver':
        if len(sys.argv) == 2:
            sys.argv.append('[::]:8000')
        else:
            sys.argv[2] = '[::]:' + sys.argv[2]
    print_and_run_system("python manage.py " + " ".join(sys.argv[1:]))
