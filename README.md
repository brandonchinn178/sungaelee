# Professional Website for Dr. SungAe Lee

Designing a new website for Dr. SungAe Lee, which will be used for event announcements and as a portfolio for her work, including a bio and a video gallery of her performances.

## Installation

1. `git clone` this repository
2. Install Virtualbox, Vagrant, and NodeJS
3. `npm install` to install grunt
4. `sudo npm install -g grunt-cli` to allow you to run grunt commands. You may have to use sudo (for OSX, *nix, BSD etc) or run your command shell as Administrator (for Windows) to do this.
5. Install ruby and sass. For Ubuntu users you can run 'sudo apt-get install rubygems-integration', and then run 'sudo gem install sass'.

## Building
1. `vagrant up --provision` to install python and postgres, set up the correct database credentials, and install django and all other pip dependencies
2. `grunt build` to compile the SASS code into the CSS files needed for the HTML pages
3. `python vmanage.py migrate` to migrate Django migrations

## Running
1. `python vmanage.py runserver`
2. Go to `http://localhost:8000`
3. To view the admin page, create a superuser with `python vmanage.py createsuperuser`
