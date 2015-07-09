<?php

/* Gets the <title> text */
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

/* Adds any necessary tags to the <head> section */
function enqueue_scripts() {
    $root = get_template_directory_uri() . '/';
    $page_types = get_page_types();

    if ( in_array('events', $page_types) ) {
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
        wp_enqueue_script(
            'events',
            $root . 'js/events.js',
            array('fullcalendar', 'jquery')
        );
        wp_enqueue_style(
            'fullcalendar',
            $root . 'vendor/fullcalendar.min.css'
        );
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

?>