<?php
    get_header();

    if ( is_category('events') ) {
        include 'templates/category-events.php';
    } else if ( is_category('lectures') ) {
        include 'templates/category-lectures.php';
    } else {
        printf('<h1>%s</h1>', get_category(get_query_var('cat'))->name);
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                printf('<h2>%s</h2>', get_the_title());
                the_content();
            }
        } else {
            echo '<p>No posts to show.</p>';
        }
    }

    get_footer();
?>