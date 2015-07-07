<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php page_title(); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cinzel+Decorative">
    </head>
    <body>
        <div class="container">
            <header>
                <h1><a href="<?php bloginfo('url'); ?>">Dr. Sungae Lee</a></h1>
                <?php
                    wp_nav_menu(array(
                        'container' => false,
                        'theme_location' => 'primary'
                    ));
                ?>
            </header>
            <div class="content">