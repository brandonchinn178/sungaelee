echo -e "\nUpdating apt-get..."
sudo apt-get update

echo -e "\nInstalling php..."
sudo apt-get install php5 -y

### Add mysql drivers (urgh) for php 5.2
echo -e "\nInstalling mysql drivers for php..."
sudo apt-get install php5-mysql -y

# ### Install mysql and populate database
echo -e "\nInstalling mysql..."
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password root'
sudo apt-get install mysql-server -y

echo -e "\nSetting up mysql database..."
mysql -u root -h localhost -proot < /vagrant/vagrant/setup_database.sql

# echo -e "\nInstalling Grunt and Sass"
# sudo apt-get --purge remove node
# sudo apt-get autoremove
# sudo apt-get install -y nodejs-legacy npm
# sudo npm install -g grunt-cli
# cd /vagrant && npm install
# sudo apt-get install rubygems-integration
# sudo gem install sass
# cd ~

echo -e "\nInstalling wordpress..."
sudo wget http://wordpress.org/latest.tar.gz
sudo tar xzvf latest.tar.gz
sudo mv wordpress /web-root
sudo mv /web-root/wp-config-sample.php /web-root/wp-config.php

echo -e "\nUpdating wp-config..."
sudo sed -i "/DB_NAME/s/database_name_here/wordpress_db/" /web-root/wp-config.php
sudo sed -i "/DB_USER/s/username_here/wordpress_user/" /web-root/wp-config.php
sudo sed -i "/DB_PASSWORD/s/password_here/wordpresspass/" /web-root/wp-config.php

### Remove the default apache files and make a link to deliverable instead
echo -e "\nLinking apache directories..."
sudo rm -rf /var/www/html
sudo ln -fs /web-root /var/www/html
sudo ln -fs /vagrant/sungaelee /web-root/wp-content/themes/sungaelee

echo -e "\nAllowing localhost plugins..."
sudo sed -i "$ a\ \n/** Allows downloading plugins on localhost */\ndefine('FS_METHOD', 'direct');" /web-root/wp-config.php
sudo chmod 777 /web-root/wp-content
sudo chmod 777 /web-root/wp-content/plugins

echo -e "\nRestarting apache workers..."
sudo /etc/init.d/apache2 restart
