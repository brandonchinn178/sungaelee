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

echo -e "\nDownloading the wordpress command line interface..."
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp

echo -e "\nInstalling wordpress..."
wp core download --path=wordpress/
sudo mv wordpress /web-root

echo -e "\nSetting up wordpress..."
cd /web-root
sudo rm wp-config-sample.php
# generate wp-config.php and setup wordpress in database
wp core config --dbname=wordpress_db --dbuser=wordpress_user --dbpass=wordpresspass
wp core install --url=localhost:8888 --title="Dr. Sungae Lee" --admin_user=admin --admin_password=password --admin_email=admin@example.com
wp option update timezone_string America/Los_Angeles

### Remove the default apache files and make a link to deliverable instead
echo -e "\nLinking apache directories..."
sudo rm -rf /var/www/html
sudo ln -fs /web-root /var/www/html
sudo ln -fs /vagrant/sungaelee /web-root/wp-content/themes/sungaelee

echo -e "\nRestarting apache workers..."
sudo /etc/init.d/apache2 restart

../scripts/setup.sh
