<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="bg-gray-800 p-4 text-white flex justify-between items-center">
        <div class="site-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white text-2xl font-bold">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>
        <nav class="site-navigation">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'flex space-x-4',
                ));
            } else {
                echo '<ul class="flex space-x-4">';
                echo '<li><a href="#">Home</a></li>';
                echo '<li><a href="#">About</a></li>';
                echo '</ul>';
            }
            ?>
        </nav>
    </header>
