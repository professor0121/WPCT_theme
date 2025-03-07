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

// Enqueue Tailwind CSS
function enqueue_tailwind_cdn() {
    wp_enqueue_style('tailwind-css', WPCT_THEME_URI . '/dist/style.css', [], null);
}
add_action('wp_enqueue_scripts', 'enqueue_tailwind_cdn');

function mytheme_supports_block_widgets() {
    add_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'mytheme_supports_block_widgets' );

//register sidebar widgets

function mytheme_register_sidebar_widgets() {
    register_sidebar( array(
        'name'          => __( 'Custom Main Sidebar', 'mytheme' ),
        'id'            => 'main-sidebar',
        'description'   => __( 'Add widgets to the main sidebar.', 'mytheme' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mytheme_register_sidebar_widgets' );


//Header customization

function mytheme_customize_register($wp_customize) {
    // Logo Upload
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label' => __('Upload Logo', 'mytheme'),
        'section' => 'title_tagline',
        'settings' => 'header_logo',
    )));

    // Top Header Text Settings
    $wp_customize->add_section('header_top_section', array(
        'title' => __('Top Header', 'mytheme'),
        'priority' => 30,
    ));
    //---------------------------------------------------------------------------------------------

    $wp_customize->add_setting('header_top_warranty', array(
        'default' => '24/7 Support',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_top_warranty', array(
        'label' => __('Top Header Warranty Text', 'mytheme'),
        'section' => 'header_top_section',
        'type' => 'text',
    ));
    //---------------------------------------------------------------------------------------------

    $wp_customize->add_setting('header_top_fast_service', array(
        'default' => 'Fast & Secure',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_top_fast_service', array(
        'label' => __('Top Header Fast Service Text', 'mytheme'),
        'section' => 'header_top_section',
        'type' => 'text',
    ));
    //---------------------------------------------------------------------------------------------

    $wp_customize->add_setting('header-top-experience', array(
        'default' => 'Experience',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header-top-experience', array(
        'label' => __('Top Header Experience', 'mytheme'),
        'section' => 'header_top_section',
        'type' => 'text',
    ));
    //---------------------------------------------------------------------------------------------

    $wp_customize->add_setting('header-top-feedback', array(
        'default' => 'Feedback',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header-top-feedback', array(
        'label' => __('Top Header Feedback', 'mytheme'),
        'section' => 'header_top_section',
        'type' => 'text',
    ));
    //---------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------
    //Header buttons
    $wp_customize->add_setting('header_top_button_1', array(
        'default'           => 'Button 1',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('header_top_button_1', array(
        'label'   => __('Button 1', 'mytheme'),
        'section' => 'header_top_section',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('header_top_button_2', array(
        'default'           => 'Button 2',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('header_top_button_2', array(
        'label'   => __('Button 2', 'mytheme'),
        'section' => 'header_top_section',
        'type'    => 'text',
    ));
    

}

add_action('customize_register', 'mytheme_customize_register');
