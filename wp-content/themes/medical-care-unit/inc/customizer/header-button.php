<?php
/**
* Header Options.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'medical-care-unit' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('medical_care_unit_header_button_ed',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_header_button_ed'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_header_button_ed',
    array(
        'label' => esc_html__('Enable Header Button', 'medical-care-unit'),
        'section' => 'button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'header_layout_button_text',
    array(
    'default'           => $medical_care_unit_default['header_layout_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'header_layout_button_text',
    array(
    'label'    => esc_html__( 'Header Button Text', 'medical-care-unit' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'header_layout_button_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'header_layout_button_link',
    array(
    'label'    => esc_html__( 'Header Button Link', 'medical-care-unit' ),
    'section'  => 'button_header_setting',
    'type'     => 'url',
    )
);