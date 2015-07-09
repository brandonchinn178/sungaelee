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

/* Adds any necessary tags to the <head> section */
function enqueue_scripts() {
    $root = get_template_directory_uri() . '/';

    switch (get_page_title()) {
        case 'events':
            wp_enqueue_script(
                'moment',
                $root . 'vendor/moment.min.js',
                array('jquery')
            );
            wp_enqueue_script(
                'fullcalendar',
                $root . 'vendor/fullcalendar.min.js',
                array('jquery', 'moment')
            );
            wp_enqueue_style(
                'fullcalendar',
                $root . 'vendor/fullcalendar.min.css'
            );
            wp_enqueue_script(
                'main',
                $root . 'js/events.js',
                array('fullcalendar', 'jquery')
            );
            break;
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

/* Gets the page title for the current page */
function get_page_title() {
    if (get_post(get_query_var('page_id'))->post_name == 'about') {
        return 'about';
    } else if (get_category(get_query_var('cat'))->slug == 'events') {
        return 'events';
    } else if (get_post(get_query_var('page_id'))->post_name == 'media') {
        return 'media';
    } else if (get_category(get_query_var('cat'))->slug == 'lectures') {
        return 'lectures';
    } else if (get_query_var('p') != '') {
        return 'single-post';
    } else {
        return 'other';
    }
}

?>