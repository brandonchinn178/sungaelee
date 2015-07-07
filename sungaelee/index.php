<?php get_header(); ?>

<?php if (have_posts()): ?>

<?php
    while (have_posts()) {
        the_post();
        the_content();
    }
?>

<?php else: ?>

    <h2>404 Not Found</h2>
    <p>Sorry, we couldn't find what you were looking for.</p>

<?php endif; ?>

<?php get_footer(); ?>