<?php
function wpct_customize_register($wp_customize) {
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
    //---------------------------------------------------------------------------------------------
    $wp_customize->add_setting('header_top_email', array(
        'default'           => 'example@email.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('header_top_email', array(
        'label'   => __('Email', 'mytheme'),
        'section' => 'header_top_section',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('header_top_phone', array(
        'default'           => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('header_top_phone', array(
        'label'   => __('Phone', 'mytheme'),
        'section' => 'header_top_section',
        'type'    => 'text',
    ));
    
}

add_action('customize_register', 'wpct_customize_register');

function wpct_customize_footer_register($wp_customize) {
    // Add Footer Section
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Settings', 'wpct-theme'),
        'priority' => 40,
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default'           => '© 2024 Your Company. All Rights Reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_copyright_text', array(
        'label'   => __('Copyright Text', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Footer Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => 'support@yourcompany.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_email', array(
        'label'   => __('Footer Email', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Footer Phone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '+123 456 7890',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label'   => __('Footer Phone', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Social Media Links
    $social_media = ['Facebook', 'Twitter', 'Instagram', 'LinkedIn'];

    foreach ($social_media as $platform) {
        $setting_id = 'footer_' . strtolower($platform) . '_link';

        $wp_customize->add_setting($setting_id, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($setting_id, array(
            'label'   => __($platform . ' URL', 'wpct-theme'),
            'section' => 'footer_section',
            'type'    => 'url',
        ));
    }

    //Copy right text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default'           => '© ' . date('Y') . ' Your Company. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_copyright_text', array(
        'label'   => __('Footer Copyright Text', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));
    //Footer menu
    $wp_customize->add_setting('footer_menu', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_menu', array(
        'label'   => __('Footer Menu', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
        'description' => __('Enter the menu slug to display in the footer.', 'wpct-theme'),
    ));
    //footer description
    $wp_customize->add_setting('footer_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_description', array(
        'label'   => __('Footer Description', 'wpct-theme'),
        'section' => 'footer_section',
        'type'    => 'text',
        'description' => __('Enter the footer logo Description.', 'wpct-theme'),
    ));
    $wp_customize->add_setting('footer_custom_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw', // Ensures the URL is safe
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_custom_image', array(
        'label'       => __('Footer Custom Image', 'wpct-theme'),
        'section'     => 'footer_section',
        'settings'    => 'footer_custom_image',
        'description' => __('Upload a custom footer image.', 'wpct-theme'),
    )));
    
    
    
}

add_action('customize_register', 'wpct_customize_footer_register');


//footer menu
function wpct_register_footer_menus() {
    register_nav_menus(array(
        'footer_menu' => __('Footer Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'wpct_register_footer_menus');

function wpct_customize_footer_menu_register($wp_customize) {
    // Add a setting for the footer menu
    $wp_customize->add_setting('footer_menu_location', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add a control to select the menu
    $menus = wp_get_nav_menus();
    $menu_choices = array();

    foreach ($menus as $menu) {
        $menu_choices[$menu->term_id] = $menu->name;
    }

    $wp_customize->add_control('footer_menu_location', array(
        'label'   => __('Select Footer Menu', 'mytheme'),
        'section' => 'footer_section',
        'type'    => 'select',
        'choices' => $menu_choices,
        'description' => __('Choose a menu to display in the footer.', 'wpct-theme'),
    ));
}
add_action('customize_register', 'wpct_customize_footer_menu_register');