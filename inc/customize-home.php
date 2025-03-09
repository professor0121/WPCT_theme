<?php
function wpct_customize_home($wp_customize)
{
    // Top Header Text Settings
    $wp_customize->add_section('home-page-sections', [
        'title'    => __('HOME PAGE', 'WPCT_theme'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('home_section2_produkcija_description', [
        'default'           => 'Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('home_section2_produkcija_description', [
        'label'   => __('Description of second Section', 'WPCT_theme'),
        'section' => 'home-page-sections',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'wpct_customize_home');
