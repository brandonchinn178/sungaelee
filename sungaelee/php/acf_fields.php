<?php

if ( function_exists('register_field_group') ) {
    // Event Information
    register_field_group(array(
        'id' => 'acf_event-info',
        'title' => 'Event Information',
        'fields' => array(
            array(
                'key' => 'field_1',
                'label' => 'Choose a date',
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
            'position' => 'normal'
        )
    ));

    // Lecture Video oEmbed
    register_field_group(array(
        'id' => 'acf_lecture-info',
        'title' => 'Lecture Information',
        'fields' => array(
            array(
                'key' => 'field_2',
                'label' => 'Video',
                'name' => 'video',
                'type' => 'oembed',
                'required' => 1,
                'returned_format' => 'object'
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
            'hide_on_screen' => array()
        )
    ));

    // About page sidebar
    register_field_group(array(
        'id' => 'acf_about-sidebar',
        'title' => 'About Page Sidebar',
        'fields' => array(
            array(
                'key' => 'field_3',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'save_format' => 'url'
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => get_page_by_path('about')->ID
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'hide_on_screen' => array()
        )
    ));

    // Home page slideshow
    register_field_group(array(
        'id' => 'acf_homepage',
        'title' => 'Homepage Slideshow',
        'fields' => array(
            array(
                'key' => 'field_4',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'save_format' => 'url'
            ),
            array(
                'key' => 'field_5',
                'label' => 'Slide number',
                'instructions' => 'Where in the slideshow to put this slide. The slideshow will be ordered lowest to highest.',
                'name' => 'slide_num',
                'type' => 'number',
                'required' => 1
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_category',
                    'operator' => '==',
                    'value' => get_category_by_slug('slideshow')->term_id
                )
            )
        ),
        'options' => array(
            'position' => 'normal',
            'hide_on_screen' => array()
        )
    ));
}

?>