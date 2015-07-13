<?php

/* Add Video URL menu to Media Library */
add_action('admin_menu', 'register_admin_add_video');
function register_admin_add_video() {
    add_submenu_page('upload.php', 'Add Video URL', 'Add Video URL', 'upload_files', 'add-video-url', 'admin_add_video');
}

function admin_add_video() {
    wp_enqueue_style('add-video-url', get_template_directory_uri() . '/css/admin-add-video-url.css');
    include 'templates/admin-add-video.php';
}

/* Remove Add Media button from posts */
function admin_remove_media_buttons() {
    remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head', 'admin_remove_media_buttons');

?>