<?php

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