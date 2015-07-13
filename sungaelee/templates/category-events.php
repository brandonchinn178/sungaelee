<?php
    echo(
        '<div class="event-list-container">
            <h1>Upcoming Events</h1>
            <div class="event-list">'
    );

    $query = new WP_Query(array(
        'category_name' => 'events',
        'meta_query' => array(
            array(
                'key' => 'date',
                'compare' => '>=',
                'value' => current_time('Ymd')
            )
        ),
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'date'
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            $title = get_the_title();
            $permalink = get_permalink();
            $date = DateTime::createFromFormat('Ymd', get_field('date'));
            $description = apply_filters( 'the_content', $post->post_content );

            echo(
                "<div class='event' data-permalink='$permalink'>
                    <h2 class='title'>
                        <a href='$permalink'>$title</a>
                        <span class='date' data-date='{$date->format('Y-m-d')}'>
                            {$date->format('M j, Y')}
                        </span>
                    </h2>
                    <div class='wp-content'>$description</div>
                </div>"
            );
        }
    } else {
        echo '<p>No events to show.</p>';
    }

    echo(
        '   </div>
        </div>
        <div class="calendar"></div>'
    );
?>