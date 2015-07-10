<?php
    echo '<div class="lecture-list">';

    $query = new WP_Query(array(
        'category_name' => 'lectures'
    ));
    while ($query->have_posts()) {
        $query->the_post();

        $title = get_the_title();
        $permalink = get_the_permalink();
        $short_description = trim_words(get_field('description'), 30);
        $thumbnail_url = get_field('video')->thumbnail_url;
        $highlight = (get_the_ID() == $post_id) ? 'highlight' : '';

        echo(
            "<div class='lecture $highlight'>
                <h2><a href='$permalink'>$title</a></h2>
                <div class='thumbnail'>
                    <a href='$permalink'><img src='$thumbnail_url'></a>
                </div>
                <p class='description'>$short_description</p>
            </div>"
        );
    }

    $title = get_the_title($post_id);
    $description = get_field('description', $post_id);
    $video_html = get_field('video', $post_id)->html;

    echo(
        "</div>
        <div class='video'>
            $video_html
            <div class='info'>
                <h1>$title</h1>
                $description
            </div>
        </div>"
    );
?>