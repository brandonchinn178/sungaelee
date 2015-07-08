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
                <div class="login-link">
                    <?php
                        if (is_user_logged_in()) {
                            echo '<a href="'. admin_url() . '">Admin Site</a>';
                            echo '<a href="'. wp_logout_url() . '">Logout</a>';
                        } else {
                            echo '<a href="'. wp_login_url() . '">Login</a>';
                        }
                    ?>
                </div>
            </header>
            <div class="content">