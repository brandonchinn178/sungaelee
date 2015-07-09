<?php
    get_header();

    $post = get_post();
    $post_id = $post->ID;

    if ($post == null) {
        echo '<h1>404 Not Found</h1>';
        echo "<p>Sorry, we couldn't find what you were looking for.</p>";
    } else {
        $types = get_page_types();

        if (in_array('single-post-events', $types)) {
            include 'single-events.php';
        } else if (in_array('single-post-lectures', $types)) {
            include 'single-lectures.php';
        } else {
            include 'single-uncategorized.php';
        }
    }

    get_footer();
?>