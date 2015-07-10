<?php
    get_header();

    $page = get_post();

    if ( $page == null ) {
        include 'templates/404.php';
    } else {
        printf('<h1>%s</h1>', apply_filters('the_title', $page->post_title));
        echo apply_filters('the_content', $page->post_content);
    }

    get_footer();
?>