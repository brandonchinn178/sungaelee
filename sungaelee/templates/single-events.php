<?php
    if (current_user_can('edit_posts')) {
        $permalink = get_edit_post_link($post_id, '&');
        $edit = "<span class='edit'><a href=$permalink>Edit</a></span>";
    }

    $date = DateTime::createFromFormat('Ymd', get_field('date', $post_id));
    $title = get_the_title($post_id);
    $description = apply_filters( 'the_content', $post->post_content );
    $category = get_category_by_slug('events');
    $link = get_category_link($category->term_id);

    echo(
        "<h1>$title $edit</h1>
        <p class='date'>{$date->format('l, F j Y')}</p>
        <div class='wp-content'>$description</div>
        <p class='back'>
            <a href=$link>Go back to $category->name</a>
        </p>"
    );
?>