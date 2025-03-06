<?php
function your_theme_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'your_theme_woocommerce_support');

// Remove WooCommerce default styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
  
