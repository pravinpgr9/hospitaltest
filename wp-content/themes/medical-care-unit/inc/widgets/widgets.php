<?php
/**
* Widget Functions.
*
* @package Medical Care Unit
*/

function medical_care_unit_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'medical-care-unit'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'medical-care-unit'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $medical_care_unit_default = medical_care_unit_get_default_theme_options();
    $footer_column_layout = absint( get_theme_mod( 'footer_column_layout',$medical_care_unit_default['footer_column_layout'] ) );

    for( $i = 0; $i < $footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','medical-care-unit'); }
    	if( $i == 1 ){ $count = esc_html__('Two','medical-care-unit'); }
    	if( $i == 2 ){ $count = esc_html__('Three','medical-care-unit'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'medical-care-unit').$count,
	        'id' => 'medical-care-unit-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'medical-care-unit'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'medical_care_unit_widgets_init');