<?php
    get_header();

    $post_id = get_post()->ID;

    if ( in_category('events') ) {
        include 'templates/single-events.php';
    } else if ( in_category('lectures') ) {
        include 'templates/single-lectures.php';
    } else {
        printf('<h1>%s</h1>', get_the_title($post_id));
        echo get_the_content($post_id);
    }

    get_footer();
?>