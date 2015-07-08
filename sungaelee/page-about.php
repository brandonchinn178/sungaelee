<?php get_header(); ?>

<h1>About</h1>

<?php
    $page = get_page_by_title( 'About' );
    echo apply_filters( 'the_content', $page->post_content );
?>

<?php get_footer(); ?>