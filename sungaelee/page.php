<?php
    get_header();

    if ( is_page('media') ) {
        include 'templates/page-media.php';
    } else {
        $page = get_post();
        echo '<h1>' . get_the_title($page_id->ID) . '</h1>';
        echo apply_filters('the_content', $page->post_content);
    }

    get_footer();
?>