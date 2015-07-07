Calband 2015 Template
=====================

Installation/Setup
------------------

1. Install Virtualbox and Vagrant.
2. Run `vagrant up --provision`.
3. Go to `localhost:8888` and follow the setup instructions.
4. Go to **Appearance** and activate the **CalBand-2015** theme.
5. Go to **Pages**, and change the Sample Page to be **Home** with the template as **Home Page**. On **Appearance > Customize**, change **Static Front Page** to be **A static page > Front Page > "Home"**.
6. Go to **Appearance > Menus** and add the following menus:

    - Internal Links
    - External Links
    
    Set the Theme locations appropriately, and add links to the pages listed on the sides to the menu. The Internal Links must have 6 main pages, with any number of sub pages (to make a sub page, drag a menu item to the right so it's indented below the appropriate page). The External Links should have 4 links.

7. Go to **Plugins > Add New** and search for and install **Advanced Custom Fields**
8. Go to **Custom Fields** and click **Add New**. Make the title *Home Page Gallery* and add the fields listed below. Add another custom field, with the title *Sidebar Photo* and add the fields listed below as well.
9. Go back to editing the home page, click **Screen Options** on the top right and toggle "Home Page Gallery". The "Home Page Gallery" textbox should show up. Include URLs and captions there (see homepage_gallery.txt for an example or to use as the initial data).

Home Page Gallery
-----------------

This is the field that will hold the URLs for the image slideshow on the home page. See homepage_gallery.txt for an example (or to use as the initial gallery).

When creating, add one field with the following information:

- Field Label: Home Page Gallery
- Field Name: images
- Field Type: Text Area
- Field Instructions: Put your help text here
- Required? Yes
- Formatting: No formatting

And set its Location Rules to show the field group if:

- Post Type is equal to page and
- Page Type is equal to Front Page

Sidebar Photo
-------------

This is the field that will hold the image for each page's sidebar photo. Use the following information for the field:

- Field Label: Sidebar Image
- Field Name: image
- Field Type: Image

And set its Location Rules to show the field group if:

- Post Type is equal to page and
- Page Type is not equal to Front Page