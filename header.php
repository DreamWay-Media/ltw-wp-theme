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
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">    <title><?php bloginfo('name'); ?></title>

    <!-- title -->
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header>
        <?php get_template_part('inc/components/button'); ?>
        <!-- Top Bar -->
        <div class="py-4 px-16 bg-primary flex justify-between text-white">
            <div class="flex gap-4">
                <p>INSERT PHONE NUMBER HERE</p>
                <p>INSERT EMAIL ADDRESS HERE</p>
            </div>
            <div>
                <p>TWITTER FACEBOOK LINKEDIN INSTAGRAM</p>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Header -->
        <div class="py-8 px-16 grid grid-cols-6 gap-4 place-items-center">
            <!-- logo -->
            <div class="site-logo w-12 h-12">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold col-span-1">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <!-- logo -->
            <!-- navigation -->
            <nav class="site-navigation col-span-4 w-full">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'flex justify-around px-16',
                ));
            } else {
                echo '<ul class="flex space-x-4">';
                echo '<li><a href="#">Home</a></li>';
                echo '<li><a href="#">About</a></li>';
                echo '</ul>';
            }
            ?>
            </nav>
            <div class="col-span-1">
                <?php echo button('Contact Us'); ?>
            </div>
            <!-- navigation -->
        </div>
        <!-- Header -->
    </header>