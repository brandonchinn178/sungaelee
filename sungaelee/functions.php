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
        wp_enqueue_style(
            'fullcalendar',
            $root . 'vendor/fullcalendar.min.css'
        );
        wp_enqueue_script(
            'main',
            $root . 'js/events.js',
            array('fullcalendar', 'jquery')
        );
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

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

// ACF fields

if ( function_exists('register_field_group') ) {
    // Event Information
    register_field_group(array(
        'id' => 'acf_event-information',
        'title' => 'Event Information',
        'fields' => array(
            array(
                'key' => 'field_1',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'wysiwyg',
                'required' => 0
            ),
            array(
                'key' => 'field_2',
                'label' => 'Date',
                'name' => 'date',
                'type' => 'date_picker',
                'required' => 1,
                'date_format' => 'yymmdd',
                'display_format' => 'M d, yy',
                'first_day' => 0
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_category',
                    'operator' => '==',
                    'value' => get_category_by_slug('events')->term_id
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array('the_content')
        )
    ));

    // Lecture Information
    register_field_group(array(
        'id' => 'acf_lecture-information',
        'title' => 'Lecture Information',
        'fields' => array(
            array(
                'key' => 'field_3',
                'label' => 'Video',
                'name' => 'video',
                'type' => 'oembed',
                'required' => 1,
                'returned_format' => 'object'
            ),
            array(
                'key' => 'field_4',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'wysiwyg'
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_category',
                    'operator' => '==',
                    'value' => get_category_by_slug('lectures')->term_id
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array('the_content')
        )
    ));
}

?>