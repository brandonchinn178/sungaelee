<?php get_header(); ?>

<h1>Lectures</h1>

<div class="lecture-list">
    <?php
        $query = new WP_Query(array(
            'category_name' => 'lectures'
        ));

        if ( $query->have_posts() ):
            while ( $query->have_posts() ):
                $query->the_post();
                $permalink = get_permalink();
    ?>

    <div class="lecture" data-permalink="<?php echo $permalink; ?>">
        <h2 class="title">
            <a href="<?php echo $permalink; ?>"><?php the_title(); ?></a>
        </h2>
        <div class="thumbnail">
            <a href="<?php echo $permalink; ?>">
                <img src="<?php echo get_field('video')->thumbnail_url; ?>">
            </a>
        </div>
        <div class="description">
            <?php the_field('description'); ?>
        </div>
    </div>

    <?php endwhile; ?>
    <?php else: ?>

    <p>No lectures to show</p>

    <?php endif; ?>
</div>

<?php get_footer(); ?>