<?php
    get_header();

    $page = get_post();

    if ( is_page('media') ) {
        include 'templates/page-media.php';
    } else if ( is_page('about') ) {
        include 'templates/page-about.php';
    } else {
        echo '<h1>' . get_the_title($page_id->ID) . '</h1>';
        echo apply_filters('the_content', $page->post_content);
    }

    get_footer();
?>