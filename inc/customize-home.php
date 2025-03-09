<?php
function wpct_customize_home($wp_customize)
{
    // Top Header Text Settings
    $wp_customize->add_section('home-page-sections', [
        'title'    => __('HOME PAGE', 'WPCT_theme'),
        'priority' => 30,
    ]);
    //home section 1 editable
    $wp_customize->add_setting('home_section1_description', [
        'default'           => 'Elegantiško dizaino, ilgaamžiai, dėmėsingi ekologijai sprendimai Jūsų namams, balkonui, terasai ar biurui!',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('home_section1_description', [
        'label'   => __('Description of first Section', 'WPCT_theme'),
        'section' => 'home-page-sections',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('home_section1_color_description', [
        'default'           => 'Nes kokybė atsipeka.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('home_section1_color_description', [
        'label'   => __('Description of first Section color', 'WPCT_theme'),
        'section' => 'home-page-sections',
        'type'    => 'text',
    ]);

    //home section 2 editable
    $wp_customize->add_setting('home_section2_produkcija_description', [
        'default'           => 'Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('home_section2_produkcija_description', [
        'label'   => __('Description of second Section', 'WPCT_theme'),
        'section' => 'home-page-sections',
        'type'    => 'text',
    ]);

    //home section Paslaugos description editable
    $wp_customize->add_setting('home_Paslaugos_description', [
        'default'           => 'Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('home_Paslaugos_description', [
        'label'   => __('Description of Paslaugos Section 3rd', 'WPCT_theme'),
        'section' => 'home-page-sections',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'wpct_customize_home');
