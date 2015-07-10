<?php
    echo '<h1>Lectures</h1>';
    echo '<div class="lecture-list">';

    if (have_posts()) {
        while(have_posts()) {
            the_post();
            $permalink = get_permalink();
            $title = get_the_title();
            $thumbnail_url = get_field('video')->thumbnail_url;
            $description = get_field('description');

            echo(
                "<div class='lecture' data-permalink='$permalink'>
                    <h2 class='title'>
                        <a href='$permalink'>$title</a>
                    </h2>
                    <div class='thumbnail'>
                        <a href='$permalink'><img src='$thumbnail_url'></a>
                    </div>
                    <div class='description'>$description</div>
                </div>"
            );
        }
    } else {
        echo '<p>No lectures to show.</p>';
    }

    echo '</div>'; // .lecture-list
?>