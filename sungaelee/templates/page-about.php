<?php

    $title = get_the_title();
    $content = apply_filters('the_content', $page->post_content);
    $image = get_field('image');

    echo(
        "<div class='info'>
            <h1>$title</h1>
            <div class='wp-content'>$content</div>
        </div>
        <div class='sidebar'>
            <img src=$image>
        </div>"
    );

?>