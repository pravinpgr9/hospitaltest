<?php
/**
 *
 * Pagination Functions
 *
 * @package Medical Care Unit
 */

if( !function_exists('medical_care_unit_archive_pagination_x') ):

	// Archive Page Navigation
	function medical_care_unit_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('medical_care_unit_archive_pagination','medical_care_unit_archive_pagination_x',20);