<?php get_header(); ?>

<h1>Upcoming Events</h1>

<?php
    $query = new WP_Query(array(
        'category_name' => 'event',
        'meta_query' => array(
            array(
                'key'     => 'event_date',
                'compare' => '>=',
                'value'   => date('Ymd')
            )
        )
    ));

    if ( $query->have_posts() ):
        while ( $query->have_posts() ):
            $query->the_post();
?>

<div class="event">
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <span class="date">
        <?php
            $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
            echo $date->format('M d, yy');
        ?>
    </span>
</div>

<?php endwhile; ?>

<?php else: ?>

<h2>No events to show</h2>

<?php endif; ?>

<?php get_footer(); ?>