<?php
/**
 * Default Values.
 *
 * @package Medical Care Unit
 */

if ( ! function_exists( 'medical_care_unit_get_default_theme_options' ) ) :
	function medical_care_unit_get_default_theme_options() {

		$medical_care_unit_defaults = array();
		
		// Options.
        $medical_care_unit_defaults['logo_width_range']                           = 300;
		$medical_care_unit_defaults['global_sidebar_layout']					    = 'right-sidebar';
        $medical_care_unit_defaults['medical_care_unit_pagination_layout']      = 'numeric';
		$medical_care_unit_defaults['footer_column_layout']                         = 3;
		$medical_care_unit_defaults['footer_copyright_text'] 						= esc_html__( 'All rights reserved.', 'medical-care-unit' );
        $medical_care_unit_defaults['medical_care_unit_header_button_ed']       = 1;
        $medical_care_unit_defaults['header_layout_button_text']                  = esc_html__('Book Appointment','medical-care-unit');
        $medical_care_unit_defaults['twp_navigation_type']              			= 'theme-normal-navigation';
        $medical_care_unit_defaults['medical_care_unit_post_author']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_post_date']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_post_category']                	= 1;
        $medical_care_unit_defaults['medical_care_unit_post_tags']                		= 1;
        $medical_care_unit_defaults['medical_care_unit_floating_next_previous_nav']       = 1;
        $medical_care_unit_defaults['medical_care_unit_header_banner']               		= 0;
        $medical_care_unit_defaults['medical_care_unit_display_header_title']               = 1;
        $medical_care_unit_defaults['medical_care_unit_category_section']               	= 0;
        $medical_care_unit_defaults['cat_main_service_title']                               = esc_html__('SERVICE WE PROVIDE','medical-care-unit');
        $medical_care_unit_defaults['cat_main_title']                   			= esc_html__('Medical Services to Improve Your Health and Wellbeing.','medical-care-unit');
        $medical_care_unit_defaults['medical_care_unit_background_color']               	= '#fff';
        $medical_care_unit_defaults['medical_care_unit_default_text_color']               = '#000';
        $medical_care_unit_defaults['medical_care_unit_border_color']               		= '#ededed';

		// Pass through filter.
		$medical_care_unit_defaults = apply_filters( 'medical_care_unit_filter_default_theme_options', $medical_care_unit_defaults );

		return $medical_care_unit_defaults;
	}
endif;
