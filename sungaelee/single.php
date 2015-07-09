<?php
    get_header();

    $post = get_post();
    $post_id = $post->ID;

    if ($post == null) {
        echo '<h1>404 Not Found</h1>';
        echo "<p>Sorry, we couldn't find what you were looking for.</p>";
    } else {
        $categories = wp_get_post_categories($post_id, array('fields' => 'slugs'));

        if ( in_array('events', $categories) ) {
            $date = DateTime::createFromFormat('Ymd', get_field('date', $post_id));
            printf(
                '<h1>%s</h1>',
                apply_filters('the_title', $post->post_title)
            );
            printf(
                '<p class="date">%s</p>',
                $date->format('l, F j Y')
            );
            printf(
                '<div class="description">%s</div>',
                get_field('description', $post_id)
            );
        } else if ( in_array('lectures', $categories) ) {

        } else {

        }
    }

    get_footer();
?>