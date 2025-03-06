<?php
function your_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    add_theme_support('menus');

    register_nav_menus([
        'primary' => __('Primary Menu', 'your-theme-textdomain'),
        'footer'  => __('Footer Menu', 'your-theme-textdomain'),
    ]);
}
add_action('after_setup_theme', 'your_theme_setup');
