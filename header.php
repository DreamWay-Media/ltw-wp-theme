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
        <div class="wrap min-h-[40px] lg:min-h-[56px] bg-primary text-white">
            <div class="content min-h-[32px] shrink-0 flex justify-between items-center">
                <?php if (is_active_sidebar('top-bar-left')) : ?>
                    <aside class="min-w-full md:min-w-[400px] lg:min-w-[517px] min-h-[29px] lg:shrink-0 break-all">
                        <?php dynamic_sidebar('top-bar-left'); ?>
                    </aside>
                <?php endif; ?>
                <?php if (is_active_sidebar('top-bar-right')) : ?>
                    <aside class="hidden md:flex lg:min-w-[176px] lg:h-[32px] lg:shrink-0 break-all">
                        <?php dynamic_sidebar('top-bar-right'); ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Header -->
        <div class="wrap py-18">
            <div class="content h-[60px] mt-1 w-full grid grid-cols-[auto auto auto] justify-between place-items-center lg:mt-0 lg:py-5 lg:h-[104px] lg:flex lg:justify-center lg:items-center">
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
                <div class="hidden lg:flex lg:items-center lg:h-[68px] flex-1">
                    <!-- navigation -->
                    <nav class="w-full flex justify-center items-center">
                        <?php
                        // Check if there is a primary menu assigned
                        if (has_nav_menu('primary')) {
                            // Desktop Menu
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'inline-flex items-start gap-[52px]' // CSS for nav menu
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
                <div class="col-start-3 col-span-1 row-start-1 lg:hidden">
                    <input type="checkbox" id="hamburger-toggle" class="hidden" />
                    <label for="hamburger-toggle" class="flex flex-col items-center cursor-pointer">
                        <div class="ltw-btn-mobile z-20">
                            <div class="hamburger-line w-[20px] h-1 rounded-[30px] bg-white mb-1 transition-transform duration-300"></div>
                            <div class="hamburger-line w-[20px] h-1 rounded-[30px] bg-white mb-1 transition-opacity duration-300"></div>
                            <div class="hamburger-line w-[20px] h-1 rounded-[30px] bg-white transition-transform duration-300"></div>
                        </div>
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
                    <a class="ltw-btn-mobile leading-[normal] lg:hidden" href="#contact-us-form">
                        <span class="mail text-white w-[22px] h-[22px] text-[22px]"></span>
                    </a>
                    <a class="hidden lg:ltw-btn" href="#contact-us-form">
                        <p class="flex justify-center items-center">Contact US<span class="arrow-right"></span></p>
                    </a>
                </div>
            </div>
        </div>
        <!-- Header -->
    </header>