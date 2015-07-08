<?php get_header(); ?>

<?php
    if ( have_posts() ):
        while ( have_posts() ):
            the_post();
?>

<h2><?php the_title(); ?></h2>
<p><?php the_content(); ?></p>

<?php endwhile; ?>

<?php else: ?>

    <h2>404 Not Found</h2>
    <p>Sorry, we couldn't find what you were looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>