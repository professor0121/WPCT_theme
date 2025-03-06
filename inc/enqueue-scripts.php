<?php
function your_theme_enqueue_styles() {
    // Custom CSS
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', ['tailwind'], '1.0');
    
    // JavaScript
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'your_theme_enqueue_styles');
 
