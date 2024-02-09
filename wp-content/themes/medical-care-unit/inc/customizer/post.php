<?php
/**
* Posts Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Metainformation Settings', 'medical-care-unit' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('medical_care_unit_post_author',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'medical-care-unit'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_date',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'medical-care-unit'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_category',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'medical-care-unit'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_post_tags',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'medical-care-unit'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);