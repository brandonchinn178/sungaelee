<?php
    echo '<h1>Lectures</h1>';
    echo '<div class="lecture-list">';

    if (have_posts()) {
        while(have_posts()) {
            the_post();
            $permalink = get_permalink();
            printf(
                '<div class="lecture" data-permalink=%s>',
                $permalink
            );

            // title
            printf(
                '<h2 class="title"><a href="%s">%s</a></h2>',
                $permalink,
                get_the_title()
            );
            // thumbnail
            printf(
                '<div class="thumbnail"><a href="%s"><img src="%s"></a></div>',
                $permalink,
                get_field('video')->thumbnail_url
            );
            // description
            printf(
                '<div class="description">%s</div>',
                get_field('description')
            );

            // .lecture
            echo '</div>';
        }
    } else {
        echo '<p>No lectures to show.</p>';
    }

    // .lecture-list
    echo '</div>';
?>