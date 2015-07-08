<?php

add_theme_support('automatic-feed-links');

register_nav_menu('primary', 'Primary Navigation Menu');

function page_title() {
    bloginfo('name');
    if ( !is_front_page() ) {
        echo ' | ';

        if ( ($id = get_query_var('cat')) != '' ) {
            echo get_category($id)->name;
        } else {
            echo get_post()->post_title;
        }
    }
}

add_filter('show_admin_bar', '__return_false');

function add_script($path) {
    $path = get_bloginfo('template_directory') . '/' . $path;
    printf('<script src="%s"></script>', $path);
}

function add_style($path) {
    $path = get_bloginfo('template_directory') . '/' . $path;
    printf('<link rel="stylesheet" type="text/css" href="%s" />', $path);
}

/* Adds any necessary tags to the <head> section */
function add_to_head() {
    add_script('/vendor/jquery-2.1.4.min.js');
    switch (get_page_title()) {
        case 'events':
            add_script('vendor/moment.min.js');
            add_script('vendor/fullcalendar.min.js');
            add_style('vendor/fullcalendar.min.css');
            add_script('js/events.js');
            break;
    }
}

/* Gets the page title for the current page */
function get_page_title() {
    if (get_post(get_query_var('page_id'))->post_name == 'about') {
        return 'about';
    } else if (get_category(get_query_var('cat'))->slug == 'events') {
        return 'events';
    } else if (get_post(get_query_var('page_id'))->post_name == 'media') {
        return 'media';
    } else if (get_post(get_query_var('page_id'))->post_name == 'lectures') {
        return 'lectures';
    } else if (get_query_var('p') != '') {
        return 'single-post';
    } else {
        return 'other';
    }
}

?>