<?php get_header(); ?>

<?php $page = get_post(); ?>

<h1><?php echo apply_filters( 'the_title', $page->post_title ); ?></h1>
<?php echo apply_filters( 'the_content', $page->post_content ); ?>

<?php get_footer(); ?>