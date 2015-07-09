<?php
    // Included from single.php
    // Has access to variables: $post, $post_id

    printf('<h1>%s</h1>', apply_filters('the_title', $post->post_title));
    echo apply_filters('the_content', $post->post_content);
?>