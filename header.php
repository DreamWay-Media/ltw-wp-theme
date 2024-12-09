<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); ?></title>

    <!-- title -->
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header>
        <?php get_template_part('inc/components/button'); ?>
        <!-- Top Bar -->
        <div class="px-2 py-4 md:px-16 bg-primary sm:flex sm:justify-around text-white">
            <?php if (is_active_sidebar('top-bar-left')) : ?>
                <aside>
                    <?php dynamic_sidebar('top-bar-left'); ?>
                </aside>
            <?php endif; ?>
            <?php if (is_active_sidebar('top-bar-right')) : ?>
                <aside class="hidden sm:block">
                    <?php dynamic_sidebar('top-bar-right'); ?>
                </aside>
            <?php endif; ?>
        </div>
        <!-- Top Bar -->
        <!-- Header -->
        <div class="py-8 px-2 md:py-8 md:px-16 grid grid-cols-3 md:grid-cols-6 gap-4 place-items-center">
            <!-- logo -->
            <div class="site-logo col-start-2 col-span-1 md:col-start-1 md:col-span-1">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="font-bold sm:col-start-2 lg:col-start-1 col-span-1">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <!-- logo -->
            <!-- navigation -->
            <nav class="site-navigation md:col-span-4 md:w-full">
                <?php
                // Check if there is a primary menu assigned
                if (has_nav_menu('primary')) {
                    // Desktop Menu
                    echo '<div class="hidden md:inline px-16">';
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'md:flex md:flex-row justify-around'
                    ));
                    echo '</div>';
                } else {
                    // Fallback Menu for Desktop
                    echo '<div class="hidden md:flex justify-around px-16">';
                    echo '<ul class="flex space-x-4">';
                    echo '<li><a href="#">Home</a></li>';
                    echo '<li><a href="#">About</a></li>';
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
            </nav>
            <div class="relative md:hidden col-start-3 col-span-1 row-start-1">
                <input type="checkbox" id="hamburger-toggle" class="hidden" />
                <label for="hamburger-toggle" class="flex flex-col items-center cursor-pointer p-2">
                    <div class="hamburger-line w-8 h-1 bg-primary mb-1 transition-transform duration-300"></div>
                    <div class="hamburger-line w-8 h-1 bg-primary mb-1 transition-opacity duration-300"></div>
                    <div class="hamburger-line w-8 h-1 bg-primary transition-transform duration-300"></div>
                </label>

                <div class="bg-[rgba(68,68,68,0.95)] overlay">
                    <!-- The navigation menu -->
                    <nav id="nav-menu" class="absolute w-full left-0 top-full hidden transition-all duration-300">
                        <ul class="flex flex-col p-4">
                            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="row-start-1 col-start-1 md:col-start-6 col-span-1">
                <a class="ltw-btn pl-4 pr-4 pt-2 pb-2" href="#contact-us-form">
                    <p class="hidden md:flex md:justify-center md:items-center">Contact Us<span class="arrow-right"></span></p>
                    <span class="inline md:hidden"><span class="phone"></span></span>
                </a>
            </div>

            <!-- navigation -->
        </div>
        <!-- Header -->
    </header>