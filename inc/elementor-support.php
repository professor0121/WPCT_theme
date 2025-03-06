<?php
function your_theme_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'your_theme_elementor_support');
 
