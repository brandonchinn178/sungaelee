<?php

/* Gets the <title> text */
function page_title() {
    wp_title('|', true, 'right');
    bloginfo('name');
}

/* Adds any necessary tags to the <head> section */
function enqueue_scripts() {
    $root = get_template_directory_uri() . '/';

    if ( is_front_page() ) {
        wp_enqueue_style(
            'home',
            $root . 'css/home.css'
        );
    } else if ( is_category() ) {
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
                'category-events',
                $root . 'js/category-events.js',
                array('fullcalendar')
            );
            wp_enqueue_style(
                'fullcalendar',
                $root . 'vendor/fullcalendar.min.css'
            );
            wp_enqueue_style(
                'category-events',
                $root . 'css/category-events.css'
            );
        } else if ( is_category('lectures') ) {
            wp_enqueue_style(
                'category-lectures',
                $root . 'css/category-lectures.css'
            );
        }
    } else if ( is_single() ) {
        if ( in_category('events') ) {
            wp_enqueue_style(
                'single-events',
                $root . 'css/single-events.css'
            );
        } else if ( in_category('lectures') ) {
            wp_enqueue_style(
                'single-lectures',
                $root . 'css/single-lectures.css'
            );
        } else if ( is_attachment() ) {
            wp_enqueue_style(
                'attachment',
                $root . 'css/attachment.css'
            );
        }
    } else if ( is_page() ) {
        wp_enqueue_style(
            'page',
            $root . 'css/page.css'
        );
        if ( is_page('media') ) {
            wp_enqueue_script(
                'page-media',
                $root . 'js/page-media.js',
                array('jquery')
            );
            wp_enqueue_style(
                'page-media',
                $root . 'css/page-media.css'
            );
        } else if ( is_page('about') ) {
            wp_enqueue_style(
                'page-about',
                $root . 'css/page-about.css'
            );
        }
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

?>