<?php
    echo '<div class="lecture-list">';

    $query = new WP_Query('category_name', 'lectures');

    // .lecture-list
    echo '</div>';

    printf('<div class="video">%s</div>', get_field('video', $post_id)->html);
?>