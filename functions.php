<?php
// Theme setup
function skeleton_theme_setup() {
    // Add support for dynamic title tags
    add_theme_support('title-tag');
    
    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'skeleton'),
        'footer' => __('Footer Menu', 'skeleton'),
    ));
}
add_action('after_setup_theme', 'skeleton_theme_setup');

// Enqueue styles and scripts
function skeleton_enqueue_assets() {
    // tailwind CSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/dist/main.css', array(), null);
    // theme's main stylesheet
    wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array('tailwindcss'), null);
}
add_action('wp_enqueue_scripts', 'skeleton_enqueue_assets');
