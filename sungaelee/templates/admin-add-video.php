<?php

    if ( !current_user_can('upload_files') ) {
        wp_die('You are not allowed here.');
    }

    // ***** POST ***** //
    if ( !empty($_POST) && check_admin_referer('add_video_url_nonce') ) {
        $title = $_POST['title'];
        $url = $_POST['url'];

        if ( !isset($title) && !isset($url) ) {
            echo(
                '<div id="message" class="error">
                    <p>Please provide the title and URL of the video</p>
                </div>'
            );
        }

        $description = $_POST['description'];
        $date = current_time('Y-m-d G:i:s');

        global $wpdb;
        $sql = $wpdb->prepare(
            "INSERT INTO $wpdb->posts SET
                post_author=1,
                post_date='$date',
                post_date_gmt='$date',
                post_content=%s,
                post_title=%s,
                post_status='inherit',
                comment_status='open',
                ping_status='open',
                post_name=%s,
                post_modified='$date',
                post_modified_gmt='$date',
                guid=%s,
                post_type='attachment',
                post_mime_type='video/x-flv'",
            $description,
            $title,
            $title,
            $url
        );
        $wpdb->query($sql);
        echo(
            '<div id="message" class="updated">
                <p>Successfully added video URL to the Media Library!</p>
            </div>'
        );
    }

    // ***** GET ***** //

    $nonce = wp_nonce_field('add_video_url_nonce');
    $submit_button = get_submit_button();

    echo(
        "<div class='wrap'>
            <h2>Add Video URL</h2>
            <form method='post'>
                $nonce
                <div class='field title'>
                    <h3>Title</h3>
                    <input type='text' name='title' id='title_field' required>
                </div>
                <div class='field url'>
                    <h3>Video URL</h3>
                    <input type='url' name='url' id='url_field' required>
                </div>
                <div class='field description'>
                    <h3>Description</h3>
                    <textarea name='description' id='description_field'></textarea>
                </div>
                $submit_button
            </form>
        </div>"
    );

?>