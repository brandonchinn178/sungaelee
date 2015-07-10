<?php
    get_header();

    $post = get_post();
    $post_id = $post->ID;

    if ( in_category('events') ) {
        include 'templates/single-events.php';
    } else if ( in_category('lectures') ) {
        include 'templates/single-lectures.php';
    } else {
        printf('<h1>%s</h1>', apply_filters('the_title', $post->post_title));
        echo apply_filters('the_content', $post->post_content);
    }

    get_footer();
?>