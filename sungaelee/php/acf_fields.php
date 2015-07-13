<?php

if ( function_exists('register_field_group') ) {
    // Date
    register_field_group(array(
        'id' => 'acf_date-field',
        'title' => 'Date Picker',
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
            'position' => 'normal',
            'layout' => 'no_box'
        )
    ));

    // Video oEmbed
    register_field_group(array(
        'id' => 'acf_video-oembed',
        'title' => 'Video Embed',
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
            'layout' => 'no_box'
        )
    ));

    // Sidebar Image
    register_field_group(array(
        'id' => 'acf_image-field',
        'title' => 'Sidebar Image',
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
            'layout' => 'seamless'
        )
    ));
}

?>