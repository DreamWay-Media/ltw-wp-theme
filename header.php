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
        <div class="wrap bg-primary text-white">
            <div class="content break-all">
                <?php if (is_active_sidebar('top-bar-left')) : ?>
                    <aside class="w-full sm:w-fit">
                        <?php dynamic_sidebar('top-bar-left'); ?>
                    </aside>
                <?php endif; ?>
                <?php if (is_active_sidebar('top-bar-right')) : ?>
                    <aside class="hidden sm:block">
                        <?php dynamic_sidebar('top-bar-right'); ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Header -->
        <div class="wrap">
            <div class="grid grid-cols-3 place-items-center xl:flex xl:content xl:h-[104px] py-5 w-full">
                <!-- logo -->
                <div class="row-start-1 col-start-2 col-span-1 site-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="font-bold sm:col-start-2 lg:col-start-1 col-span-1">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- logo -->
                <div class="hidden xl:flex xl:items-center xl:h-[68px] flex-1">
                    <!-- navigation -->
                    <nav class="w-full">
                        <?php
                        // Check if there is a primary menu assigned
                        if (has_nav_menu('primary')) {
                            // Desktop Menu
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'inline-flex items-start gap-14 w-full justify-evenly' // CSS for nav menu
                            ));
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
                </div>
                <div class="relative xl:hidden col-start-3 col-span-1 row-start-1">
                    <input type="checkbox" id="hamburger-toggle" class="hidden" />
                    <label for="hamburger-toggle" class="flex flex-col items-center cursor-pointer p-2">
                        <div class="hamburger-line w-8 h-1 bg-primary mb-1 transition-transform duration-300"></div>
                        <div class="hamburger-line w-8 h-1 bg-primary mb-1 transition-opacity duration-300"></div>
                        <div class="hamburger-line w-8 h-1 bg-primary transition-transform duration-300"></div>
                    </label>

                    <div class="bg-[rgba(68,68,68,0.95)] overlay">
                        <nav id="nav-menu" class="absolute w-full left-0 top-full hidden transition-all duration-300">
                            <ul class="flex flex-col p-4">
                                <?php
                                // Mobile Menu
                                wp_nav_menu(array('theme_location' => 'primary'));
                                ?>
                            </ul>
                        </nav>
                        <!-- navigation -->
                    </div>
                </div>
                <div class="row-start-1 col-start-1 col-span-1">
                    <a class="ltw-btn pl-4 pr-4 pt-2 pb-2" href="#contact-us-form">
                        <p class="hidden xl:flex xl:justify-center xl:items-center">Contact Us<span class="arrow-right"></span></p>
                        <span class="inline lg:hidden"><span class="mail"></span></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Header -->
    </header>