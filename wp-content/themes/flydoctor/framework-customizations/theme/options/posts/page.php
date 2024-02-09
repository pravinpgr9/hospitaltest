<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'    => false,
		'type'     => 'box',
		'priority' => 'high',
		'context'  => 'normal',
		'options'  => array(
			'settings' => array(
				'title'   => esc_html__( 'Header Settings', 'flydoctor' ),
				'type'    => 'tab',
				'options' => array(
					'post_header_type' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'header_type' => array(
								'label'   => esc_html__( 'Header Type', 'flydoctor' ),
								'desc'    => esc_html__( 'Choose header type', 'flydoctor' ),
								'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
								'type'    => 'radio',
								'value'   => 'general',
								'choices' => array(
									'general' => esc_html__( 'General', 'flydoctor' ),
									'none'    => esc_html__( 'None', 'flydoctor' ),
									'image'   => esc_html__( 'Header Image', 'flydoctor' ),
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
				)
			)
		)
	)
);