<?php

add_theme_support('automatic-feed-links');

register_nav_menu('primary', 'Primary Navigation Menu');

add_filter('show_admin_bar', '__return_false');

add_action('admin_menu', 'register_admin_add_video');
function register_admin_add_video() {
    add_submenu_page('upload.php', 'Add Video URL', 'Add Video URL', 'upload_files', 'add-video-url', 'admin_add_video');
}

function admin_add_video() {
    wp_enqueue_style('add-video-url', get_template_directory_uri() . '/css/admin-add-video-url.css');
    include 'templates/admin-add-video.php';
}

include 'php/html_head.php';
include 'php/acf_fields.php';
include 'php/utils.php';

?>