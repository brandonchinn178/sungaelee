<?php
    get_header();

    $post = get_post();
    $title = get_the_title();

    if ($post->post_mime_type == 'video/x-flv') {
        $url = $post->guid;
        $provider = $WP_oEmbed->discover($url);
        $data = $WP_oEmbed->fetch( $provider, $url );

        $attachment = $data->html;
    } else {
        $attachment = wp_get_attachment_image(null, 'full');
    }

    $description = apply_filters('the_content', $post->post_content);

    echo(
        "<h1>$title</h1>
        <div class='attachment'>$attachment</div>
        <div class='description'>
            <h2>Description</h2>
            $description
        </div>"
    );

    get_footer();
?>