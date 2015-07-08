<?php get_header(); ?>

<div class="event-list">
    <h1>Upcoming Events</h1>

    <?php
        $query = new WP_Query(array(
            'category_name' => 'events',
            'meta_query' => array(
                array(
                    'key'     => 'date',
                    'compare' => '>=',
                    'value'   => date('Ymd')
                )
            ),
            'order' => 'ASC',
            'orderby' => 'meta_value',
            'meta_key' => 'date'
        ));

        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();
    ?>

    <div class="event" data-permalink="<?php echo get_permalink(); ?>">
        <h2 class="title">
            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_field('description'); ?>
        <?php $date = DateTime::createFromFormat('Ymd', get_field('date')); ?>
        <span class="date" data-date="<?php echo $date->format('Y-m-d'); ?>">
            <?php echo $date->format('M j, Y'); ?>
        </span>
    </div>

    <?php endwhile; ?>

    <?php else: ?>

    <p>No events to show</p>

    <?php endif; ?>
</div>

<div class="calendar"></div>

<?php get_footer(); ?>