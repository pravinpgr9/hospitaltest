<?php
/**
* Header Banner Options.
*
* @package Medical Care Unit
*/

$medical_care_unit_default = medical_care_unit_get_default_theme_options();
$medical_care_unit_post_category_list = medical_care_unit_post_category_list();

$wp_customize->add_section( 'header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'medical-care-unit' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('medical_care_unit_display_header_title',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_display_header_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_header_title',
    array(
        'label' => esc_html__('Enable / Disable Title', 'medical-care-unit'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_display_header_text',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'medical-care-unit'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('medical_care_unit_header_banner',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'medical-care-unit'),
        'section' => 'header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'medical_care_unit_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'medical_care_unit_sanitize_select',
    )
);
$wp_customize->add_control( 'medical_care_unit_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'medical-care-unit' ),
    'section'     => 'header_banner_setting',
    'type'        => 'select',
    'choices'     => $medical_care_unit_post_category_list,
    )
);

$wp_customize->add_section( 'header_category_setting',
    array(
    'title'      => esc_html__( 'Category Carousel Settings', 'medical-care-unit' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('medical_care_unit_category_section',
    array(
        'default' => $medical_care_unit_default['medical_care_unit_category_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_checkbox',
    )
);
$wp_customize->add_control('medical_care_unit_category_section',
    array(
        'label' => esc_html__('Enable Category Section', 'medical-care-unit'),
        'section' => 'header_category_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'cat_main_service_title',
    array(
    'default'           => $medical_care_unit_default['cat_main_service_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cat_main_service_title',
    array(
    'label'    => esc_html__( 'Main Title', 'medical-care-unit' ),
    'section'  => 'header_category_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'cat_main_title',
    array(
    'default'           => $medical_care_unit_default['cat_main_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'cat_main_title',
    array(
    'label'    => esc_html__( 'Title', 'medical-care-unit' ),
    'section'  => 'header_category_setting',
    'type'     => 'text',
    )
);

for ($x = 1; $x <= 10; $x++) {

    $wp_customize->add_setting( 'medical_care_unit_category_cat_'.$x,
        array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'medical_care_unit_sanitize_select',
        )
    );
    $wp_customize->add_control( 'medical_care_unit_category_cat_'.$x,
        array(
        'label'       => esc_html__( 'Category ', 'medical-care-unit' ).$x,
        'section'     => 'header_category_setting',
        'type'        => 'select',
        'choices'     => $medical_care_unit_post_category_list,
        )
    );

}