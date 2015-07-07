<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php page_title(); ?></title>
        <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/fonts.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <img class="highstepper" src="<?php bloginfo('template_directory'); ?>/img/calband-highstepper.png">
            <h1>
                <a href="<?php bloginfo('url'); ?>">
                    <div class="top">The University of California</div>
                    <div class="bottom">Marching Band</div>
                </a>
            </h1>
            <!-- The nav bar containing Members/Alumni/Parents/Contact -->
            <?php
                wp_nav_menu(array(
                    'container_class' => 'nav',
                    'theme_location' => 'external',
                ));
            ?>
        </header>

        <?php
            wp_nav_menu(array(
                'container' => 'nav',
                'theme_location' => 'internal',
            ));
        ?>

        <div class="container">
            <?php get_sidebar(); ?>
            <div class="content">