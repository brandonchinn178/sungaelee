<?php
    get_header();

    echo '<div class="event-list-container">';
    echo '<h1>Upcoming Events</h1>';
    echo '<div class="event-list">';

    $query = new WP_Query(array(
        'category_name' => 'events',
        'meta_query' => array(
            array(
                'key' => 'date',
                'compare' => '>=',
                'value' => date('Ymd')
            )
        ),
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'date'
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $permalink = get_permalink();
            $date = DateTime::createFromFormat('Ymd', get_field('date'));
            printf('<div class="event" data-permalink="%s">', $permalink);

            // title
            printf(
                '<h2 class="title">
                    <a href="%s">%s</a>
                    <span class="date" data-date="%s">%s</span>
                </h2>',
                $permalink,
                get_the_title(),
                $date->format('Y-m-d'),
                $date->format('M j, Y')
            );

            // description
            printf(
                '<div class="description">%s</div>',
                get_field('description')
            );

            // .event
            echo '</div>';
        }
    } else {
        echo '<p>No events to show.</p>';
    }

    // .event-list
    echo '</div>';
    // .event-list-container
    echo '</div>';
    echo '<div class="calendar"></div>';

    get_footer();
?>