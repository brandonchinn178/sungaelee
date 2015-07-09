<?php

// php_scripts directory, and include here
// echo '$var'

add_theme_support('automatic-feed-links');

register_nav_menu('primary', 'Primary Navigation Menu');

add_filter('show_admin_bar', '__return_false');

/* Gets the page title for the current page */
function get_page_types() {
    if (get_post(get_query_var('page_id'))->post_name == 'about') {
        return array('about');
    } else if (get_category(get_query_var('cat'))->slug == 'events') {
        return array('events');
    } else if (get_post(get_query_var('page_id'))->post_name == 'media') {
        return array('media');
    } else if (get_category(get_query_var('cat'))->slug == 'lectures') {
        return array('lectures');
    } else if ( ($post_id = get_query_var('p')) != '' ) {
        $types = array('single-post');
        $categories = wp_get_post_categories($post_id, array('fields' => 'slugs'));
        foreach ($categories as $type) {
            array_push($types, 'single-post-' . $type);
        }
        return $types;
    } else {
        return array('other');
    }
}

include 'php/html_head.php';
include 'php/acf_fields.php';

?>