<?php
/**
* Custom Functions.
*
* @package Medical Care Unit
*/

if( !function_exists( 'medical_care_unit_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function medical_care_unit_sanitize_sidebar_option( $medical_care_unit_input ){

        $medical_care_unit_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $medical_care_unit_input,$medical_care_unit_metabox_options ) ){

            return $medical_care_unit_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'medical_care_unit_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function medical_care_unit_sanitize_checkbox( $medical_care_unit_checked ) {

		return ( ( isset( $medical_care_unit_checked ) && true === $medical_care_unit_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'medical_care_unit_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function medical_care_unit_sanitize_select( $medical_care_unit_input, $medical_care_unit_setting ) {
        $medical_care_unit_input = sanitize_text_field( $medical_care_unit_input );
        $choices = $medical_care_unit_setting->manager->get_control( $medical_care_unit_setting->id )->choices;
        return ( array_key_exists( $medical_care_unit_input, $choices ) ? $medical_care_unit_input : $medical_care_unit_setting->default );
    }

endif;