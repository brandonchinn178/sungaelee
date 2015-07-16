echo -e "\nSetting up production server..."
cd ~/public_html

echo -e "\nDownloading the wordpress command line interface..."
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar

echo -e "\nSetting up site..."
# activate theme
wp theme activate sungaelee

wp post delete $(wp post list --post_type=page --field=ID)

# menus
wp menu create my-menu
wp menu location assign my-menu primary
wp menu item add-post my-menu $(
    wp post create --post_type=page --post_title=About --post_content="This is the about page." --post_status=publish --porcelain
)
wp menu item add-term my-menu category $(
    wp term create category Events --description="Event announcements" --porcelain
)
wp menu item add-post my-menu $(
    wp post create --post_type=page --post_title=Media --post_status=publish --porcelain
)
wp menu item add-term my-menu category $(
    wp term create category Lectures --description="Lectures" --porcelain
)

# Slideshow category
wp term create category Slideshow --description="A post for the home page slideshow"

# spots plugin
wp plugin install spots --activate
wp post create --post_type=spot --post_title=Footer --post_content="Dr. Sungae Lee | (123) 456-7890" --post_status=publish
wp post create --post_type=spot --post_title="Excerpt - Left" --post_content="This is the left excerpt on the home page!" --post_status=publish
wp post create --post_type=spot --post_title="Excerpt - Center" --post_content="This is the center excerpt on the home page!" --post_status=publish
wp post create --post_type=spot --post_title="Excerpt - Right" --post_content="This is the right excerpt on the home page!" --post_status=publish

# acf plugin
wp plugin install advanced-custom-fields --activate
wp plugin install advanced-custom-fields-oembed-field --activate

echo -e "\nLinking apache directories..."
ln -fs ~/sungaelee ~/public_html/wp-content/themes/sungaelee
