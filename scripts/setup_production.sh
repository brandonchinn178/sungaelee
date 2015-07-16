echo -e "\nSetting up production server..."

echo -e "\nDownloading the wordpress command line interface..."
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp

echo -e "\nLinking apache directories..."
sudo ln -fs ~/sungaelee ~/public_html/wp-content/themes/sungaelee

echo -e "\nRestarting apache workers..."
sudo /etc/init.d/apache2 restart

./setup.sh