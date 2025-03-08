<?php
/*
Theme Name: WPCT Theme
Theme URI: yourwebsite.com
Author: Your Name
Author URI: yourwebsite.com
Description: A professional WooCommerce theme with Tailwind CSS and Elementor support.
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: your-theme-textdomain
*/

define("WPCT_THEME_DIR", get_template_directory());
define("WPCT_THEME_URI", get_template_directory_uri());

// Include essential files
require_once WPCT_THEME_DIR . '/inc/theme-setup.php';
require_once WPCT_THEME_DIR . '/inc/enqueue-scripts.php';
require_once WPCT_THEME_DIR . '/inc/woocommerce-support.php';
require_once WPCT_THEME_DIR . '/inc/elementor-support.php';
require_once WPCT_THEME_DIR . '/inc/widgets.php';
require_once WPCT_THEME_DIR . '/inc/customizer.php';

// Enqueue Tailwind CSS
function enqueue_tailwind_cdn() {
    wp_enqueue_style('tailwind-css', WPCT_THEME_URI . '/dist/style.css', [], null);
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_cdn');

function wpct_supports_block_widgets() {
    add_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'wpct_supports_block_widgets' );

 

 


