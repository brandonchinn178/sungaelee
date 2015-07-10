<?php
    get_header();

    if ( is_category('events') ) {
        include 'templates/category-events.php';
    } else if ( is_category('lectures') ) {
        include 'templates/category-lectures.php';
    } else if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            printf('<h1>%s</h1>', get_the_title());
            the_content();
        }
    } else {
        include 'templates/404.php';
    }

    get_footer();
?>