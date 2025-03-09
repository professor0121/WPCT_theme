<?php
function mytheme_customize_slider( $wp_customize ) {
    // Section for our slider
    $wp_customize->add_section( 'my_slider_section', array(
        'title'    => __( 'Home Slider', 'mytheme' ),
        'priority' => 30,
    ) );

    // We’ll create 3 slides; each slide has a heading, subheading, and image
    for ( $i = 1; $i <= 3; $i++ ) {
        
        // 1) Heading
        $wp_customize->add_setting( "my_slider_heading_$i", array(
            'default'           => sprintf( __( 'Slide %d Heading', 'mytheme' ), $i ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "my_slider_heading_$i", array(
            'label'   => sprintf( __( 'Slide %d Heading', 'mytheme' ), $i ),
            'section' => 'my_slider_section',
            'type'    => 'text',
        ) );

        // 2) Subheading
        $wp_customize->add_setting( "my_slider_subheading_$i", array(
            'default'           => sprintf( __( 'Slide %d Subheading', 'mytheme' ), $i ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "my_slider_subheading_$i", array(
            'label'   => sprintf( __( 'Slide %d Subheading', 'mytheme' ), $i ),
            'section' => 'my_slider_section',
            'type'    => 'text',
        ) );

        // 3) Image
        $wp_customize->add_setting( "my_slider_image_$i", array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        ) );

        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "my_slider_image_$i", array(
            'label'    => sprintf( __( 'Slide %d Image', 'mytheme' ), $i ),
            'section'  => 'my_slider_section',
            'mime_type'=> 'image',
        ) ) );
    }
}
add_action( 'customize_register', 'mytheme_customize_slider' );
