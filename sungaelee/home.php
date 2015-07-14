<?php
    get_header();

    echo '<div class="slideshow">';

    $query = new WP_Query(array(
        'category_name' => 'slideshow',
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'slide_num'
    ));

    while( $query->have_posts() ) {
        $query->the_post();
        $title = get_the_title();
        $description = apply_filters( 'the_content', get_the_content() );
        $image = get_field('image');

        echo(
            "<div class='slide'>
                <img src=$image>
                <h2>$title</h2>
                <div class='description'>$description</div>
            </div>"
        );
    }
    echo '</div>';

    $left = icit_get_spot('Excerpt - Left');
    $center = icit_get_spot('Excerpt - Center');
    $right = icit_get_spot('Excerpt - Right');

    echo(
        "<div class='excerpts'>
            <div class='excerpt left'>$left</div>
            <div class='excerpt center'>$center</div>
            <div class='excerpt right'>$right</div>
        </div>"
    );

    get_footer();
?>