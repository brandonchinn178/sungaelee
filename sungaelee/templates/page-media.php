<?php
    $posts = get_posts('post_type=attachment');

    echo '<h1>' . get_the_title() . '</h1>';

    if ( count($posts) == 0 ) {
        echo '<p>No media to display</p>';
    } else {
        require_once( ABSPATH . WPINC . '/class-oembed.php' );
        $WP_oEmbed = new WP_oEmbed();

        foreach ($posts as $post) {
            $title = $post->post_title;
            $description = $post->post_content;
            $short_description = trim_words($description, 35);
            $url = $post->guid;

            if ( $post->post_mime_type == 'video/x-flv' ) {
                $provider = $WP_oEmbed->discover($url);
                $data = $WP_oEmbed->fetch( $provider, $url );

                $thumbnail_url = $data->thumbnail_url;
                $focus = $data->html;
            } else {
                $thumbnail_url = $url;
                $focus = "<img src=$url>";
            }

            echo(
                "<div class='media'>
                    <h2>
                        <a href='#' class='zoom'>$title</a>
                    </h2>
                    <a href='#' class='zoom'>
                        <img src=$thumbnail_url class='thumbnail'>
                    </a>
                    <p class='short-description'>$short_description</p>
                    <div class='focus-container'>
                        <div class='focus'>
                            <h2>$title</h2>
                            $focus
                            <div class='description'>$description</div>
                            <a href='#' class='close'>[ Close ]</a>
                        </div>
                    </div>
                </div>"
            );
        }
    }

?>