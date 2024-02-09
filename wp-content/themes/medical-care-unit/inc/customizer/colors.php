<?php
/**
* Color Settings.
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

$wp_customize->add_setting( 'medical_care_unit_default_text_color',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_default_text_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'medical_care_unit_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'medical-care-unit' ),
        'section'    => 'colors',
        'settings'   => 'medical_care_unit_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'medical_care_unit_border_color',
    array(
    'default'           => $medical_care_unit_default['medical_care_unit_border_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'medical_care_unit_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'medical-care-unit' ),
        'section'    => 'colors',
        'settings'   => 'medical_care_unit_border_color',
    ) ) 
);