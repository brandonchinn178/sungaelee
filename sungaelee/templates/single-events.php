<?php
    $date = DateTime::createFromFormat('Ymd', get_field('date', $post_id));
    printf(
        '<h1>%s</h1>',
        apply_filters('the_title', $post->post_title)
    );
    printf(
        '<p class="date">%s</p>',
        $date->format('l, F j Y')
    );
    printf(
        '<div class="description">%s</div>',
        get_field('description', $post_id)
    );

    $category = get_category_by_slug('events');
    printf(
        '<p class="back"><a href="%s">Go back to %s</a></p>',
        get_category_link($category->term_id),
        $category->name
    );
?>