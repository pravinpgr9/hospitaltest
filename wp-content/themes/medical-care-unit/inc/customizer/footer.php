<?php
/**
* Footer Settings.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();

$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'medical-care-unit' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $medical_care_unit_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'medical_care_unit_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'medical-care-unit' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'medical-care-unit' ),
		'2' => esc_html__( 'Two Column', 'medical-care-unit' ),
		'3' => esc_html__( 'Three Column', 'medical-care-unit' ),
	    ),
	)
);


$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $medical_care_unit_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'medical-care-unit' ),
	'section'  => 'footer_widget_area',
	'type'     => 'text',
	)
);