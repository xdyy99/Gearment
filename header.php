<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-control" content="no-cache" />

    <link rel="icon" type="image/png" href="<?php echo ASSETS . '/favicon/fav.png'; ?>" />

    <link rel="stylesheet" href="<?php echo ASSETS . '/fonts/inter/stylesheet.css'; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS . '/fonts/fontawesome/css/all.css'; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS . '/css/style.css'; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS . '/css/extend.css'; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS . '/css/extra.css'; ?>" />


    <?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="header-wrap hdJS">
            <div class="container">
                <div class="header-inner">
                    <?php echo get_custom_logo(); ?>

                    <div class="header-menu menu-hd menuBoard">
                        <div class="menu-bg menuBg"></div>
                        <div class="menu-wrap">
                            <?php
                            wp_nav_menu(array(
                                'container' => false,
                                'theme_location' => 'primary-menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'fallback_cb' => false,
                                'walker' => new Align_Walker_Nav_Menu,
                            ));
                            ?>

                            <div class="header-mobile">
                                <?php if (is_active_sidebar('header-button')) dynamic_sidebar('header-button');  ?>
                            </div>
                        </div>
                    </div>
                    <div class="header-lang">
                        <?php echo do_shortcode('[language-switcher]') ?>
                    </div>
                    <div class="header-desktop header-btn-flex">
                        <?php if (is_active_sidebar('header-button')) dynamic_sidebar('header-button');  ?>
                    </div>
                    <div class="header-mobile">
                        <div class="menu-btn menuBtn">
                            <svg class="menu-svg" viewBox="0 0 100 100">
                                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                                <path d="m 30,50 h 40"></path>
                                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main">