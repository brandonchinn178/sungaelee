<?php get_header(); ?>

<?php
    $post = get_post();
    $post_id = $post->ID;
    if ( $post == null ):
?>

    <h1>404 Not Found</h1>
    <p>Sorry, we couldn't find what you were looking for.</p>

<?php else: ?>

    <h1><?php echo apply_filters( 'the_title', $post->post_title ); ?></h1>

    <?php
        $categories = wp_get_post_categories($post_id, array('fields' => 'slugs'));
        if ( in_array('events', $categories) ):
    ?>
        <p class="date">
            <?php
                $date = DateTime::createFromFormat('Ymd', get_field('date', $post_id));
                echo $date->format('l, F j Y');
            ?>
        </p>

        <div class="description">
            <?php the_field('description', $post_id); ?>
        </div>

    <?php elseif ( in_array('lectures', $categories) ): ?>

    <?php else: ?>

    <?php endif; ?>

<?php endif; ?>

<?php get_footer(); ?>