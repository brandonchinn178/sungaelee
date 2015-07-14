<?php

add_theme_support('automatic-feed-links');

register_nav_menu('primary', 'Primary Navigation Menu');

add_filter('show_admin_bar', '__return_false');

// expose oEmbed variable
require_once( ABSPATH . WPINC . '/class-oembed.php' );
$WP_oEmbed = new WP_oEmbed();


include 'php/html_head.php';
include 'php/acf_fields.php';
include 'php/utils.php';
include 'php/admin.php';

?>