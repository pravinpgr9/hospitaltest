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
			'types'    => array(
				'title'   => esc_html__( 'Post View Type', 'flydoctor' ),
				'type'    => 'tab',
				'options' => array(
					'post_type' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'post_type' => array(
								'label'   => esc_html__( 'Post Type', 'flydoctor' ),
								'desc'    => esc_html__( 'Choose post view type', 'flydoctor' ),
								'type'    => 'select',
								'value'   => '',
								'choices' => array(
									'default' => esc_html__( 'Default', 'flydoctor' ),
									'slider'  => esc_html__( 'Slider', 'flydoctor' ),
									'video'   => esc_html__( 'Video', 'flydoctor' ),
									'audio'   => esc_html__( 'Soundcloud Audio', 'flydoctor' ),
									'link'    => esc_html__( 'Link', 'flydoctor' ),
									'quote'   => esc_html__( 'Quote', 'flydoctor' ),
								)
							),
						),
						'choices' => array(
							'slider' => array(
								'images' => array(
									'type'        => 'multi-upload',
									'value'       => '',
									'images_only' => true,
									'label'       => '',
									'desc'        => esc_html__( 'Upload slider images.', 'flydoctor' ),
								),
							),
							'video'  => array(
								'video' => array(
									'type'  => 'textarea',
									'value' => '',
									'label' => '',
									'desc'  => esc_html__( 'Add here the youtube, vimeo video link or a video iframe.', 'flydoctor' ),
								),
							),
							'audio'  => array(
								'audio' => array(
									'type'  => 'textarea',
									'value' => '',
									'label' => '',
									'desc'  => esc_html__( 'Add here soundcloud iframe.', 'flydoctor' ),
								),
							),
							'link'   => array(
								'link' => array(
									'type'  => 'text',
									'value' => '',
									'label' => '',
									'desc'  => esc_html__( 'Add post external link.', 'flydoctor' ),
								),
								'text' => array(
									'type'  => 'text',
									'value' => '',
									'label' => '',
									'desc'  => esc_html__( 'Add post link text.', 'flydoctor' ),
								),
							),
							'quote'  => array(
								'quote' => array(
									'type'  => 'textarea',
									'value' => '',
									'label' => '',
									'desc'  => esc_html__( 'Add post quote text.', 'flydoctor' ),
								),
							),
						)
					)
				)
			),
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
			),
		)
	)
);