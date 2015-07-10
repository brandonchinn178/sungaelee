<?php

/* Gets the <title> text */
function page_title() {
    wp_title('|', true, 'right');
    bloginfo('name');
}

/* Adds any necessary tags to the <head> section */
function enqueue_scripts() {
    $root = get_template_directory_uri() . '/';

    if ( is_category() ) {
        wp_enqueue_style(
            'category',
            $root . 'css/category.css'
        );
        if ( is_category('events') ) {
            wp_enqueue_script(
                'moment',
                $root . 'vendor/moment.min.js',
                array('jquery')
            );
            wp_enqueue_script(
                'fullcalendar',
                $root . 'vendor/fullcalendar.min.js',
                array('moment')
            );
            wp_enqueue_script(
                'events',
                $root . 'js/events.js',
                array('fullcalendar')
            );
            wp_enqueue_style(
                'fullcalendar',
                $root . 'vendor/fullcalendar.min.css'
            );
            wp_enqueue_style(
                'events',
                $root . 'css/events.css'
            );
        } else if ( is_category('lectures') ) {
            wp_enqueue_style(
                'lectures',
                $root . 'css/lectures.css'
            );
        }
    } else if ( is_single() ) {
        if ( in_category('events') ) {
            wp_enqueue_style(
                'single-post-events',
                $root . 'css/single-post-events.css'
            );
        }
    } else if ( is_page() ) {
        wp_enqueue_style(
            'page',
            $root . 'css/page.css'
        );
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

?>