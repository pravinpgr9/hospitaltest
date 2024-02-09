<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'blog_header_type' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'header_type' => array(
				'label'   => esc_html__( 'Header Type', 'flydoctor' ),
				'desc'    => esc_html__( 'Choose header type', 'flydoctor' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'value'   => 'none',
				'choices' => array(
					'none'  => esc_html__( 'None', 'flydoctor' ),
					'image' => esc_html__( 'Header Image', 'flydoctor' ),
				)
			),
		),
		'choices' => array(
			'image' => array(
				'img'          => array(
					'type'  => 'upload',
					'value' => '',
					'label' => '',
					'desc'  => esc_html__( 'Upload header image.', 'flydoctor' ),
				),
				'before_title' => array(
					'type'  => 'text',
					'value' => '',
					'label' => '',
					'desc'  => esc_html__( 'Enter before title.', 'flydoctor' ),
				),
				'title'        => array(
					'type'  => 'text',
					'value' => '',
					'label' => '',
					'desc'  => esc_html__( 'Enter title.', 'flydoctor' ),
				),
				'desc'         => array(
					'type'  => 'textarea',
					'value' => '',
					'label' => '',
					'desc'  => esc_html__( 'Enter a short description.', 'flydoctor' ),
				),
			),
		)
	)
);