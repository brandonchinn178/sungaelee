<?php

add_theme_support('automatic-feed-links');

register_nav_menu('primary', 'Primary Navigation Menu');

add_filter('show_admin_bar', '__return_false');

include 'php/html_head.php';
include 'php/acf_fields.php';

?>