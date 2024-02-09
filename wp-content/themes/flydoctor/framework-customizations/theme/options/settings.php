<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general'             => array(
		'title'   => esc_html__( 'General', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'general_options' => array(
				'title'   => esc_html__( 'General Tab Settings', 'flydoctor' ),
				'type'    => 'tab',
				'options' => array(
					'general_box' => array(
						'title'   => esc_html__( 'General Settings', 'flydoctor' ),
						'type'    => 'box',
						'options' => array(
							'header_type'    => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'    => 'short-select',
										'value'   => 'header-2',
										'attr'    => array(),
										'label'   => esc_html__( 'Header Type', 'flydoctor' ),
										'desc'    => esc_html__( 'Select the header type', 'flydoctor' ),
										'choices' => array(
											'header-1' => esc_html__( 'Header 1', 'flydoctor' ),
											'header-2' => esc_html__( 'Header 2', 'flydoctor' ),
										)
									),
								),
								'choices' => array()
							),
							'header_top_bar' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'attr'         => array(),
										'label'        => esc_html__( 'Header Top Bar', 'flydoctor' ),
										'desc'         => esc_html__( 'Enable the header top bar?', 'flydoctor' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => esc_html__( 'No', 'flydoctor' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__( 'Yes', 'flydoctor' ),
										),
									),
								),
								'choices' => array(
									'yes' => array(
										'enable_header_search' => array(
											'type'         => 'switch',
											'value'        => 'yes',
											'label'        => esc_html__( 'Header Search', 'flydoctor' ),
											'desc'         => esc_html__( 'Enable header search?', 'flydoctor' ),
											'left-choice'  => array(
												'value' => 'no',
												'label' => esc_html__( 'No', 'flydoctor' ),
											),
											'right-choice' => array(
												'value' => 'yes',
												'label' => esc_html__( 'Yes', 'flydoctor' ),
											),
										),
										'enable_header_rss'    => array(
											'type'         => 'switch',
											'value'        => 'yes',
											'label'        => esc_html__( 'Header RSS', 'flydoctor' ),
											'desc'         => esc_html__( 'Enable header RSS?', 'flydoctor' ),
											'left-choice'  => array(
												'value' => 'no',
												'label' => esc_html__( 'No', 'flydoctor' ),
											),
											'right-choice' => array(
												'value' => 'yes',
												'label' => esc_html__( 'Yes', 'flydoctor' ),
											),
										),
									),
								)
							),
						)
					),
				)
			),
			'social_options'  => array(
				'title'   => esc_html__( 'Social Profiles', 'flydoctor' ),
				'type'    => 'tab',
				'options' => array(
					'social_box'   => array(
						'title'   => esc_html__( 'Social', 'flydoctor' ),
						'type'    => 'box',
						'options' => array(
							'socials' => array(
								'type'          => 'addable-popup',
								'label'         => esc_html__( 'Social Links', 'flydoctor' ),
								'desc'          => esc_html__( 'Add your social profiles', 'flydoctor' ),
								'template'      => '{{=social_name}}',
								'popup-options' => array(
									'social_name' => array(
										'label' => esc_html__( 'Name', 'flydoctor' ),
										'desc'  => esc_html__( 'Enter social name', 'flydoctor' ),
										'type'  => 'text',
									),
									'social_icon' => array(
										'label' => esc_html__( 'Icon', 'flydoctor' ),
										'desc'  => esc_html__( 'Select social icon', 'flydoctor' ),
										'type'  => 'icon',
										'value' => 'fa fa-adn',
									),
									'social_link' => array(
										'label' => esc_html__( 'Link', 'flydoctor' ),
										'desc'  => esc_html__( 'Enter your social URL link', 'flydoctor' ),
										'type'  => 'text',
										'value' => '#',
									)
								),
							),
						)
					),
					'social_title' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'attr'         => array(),
						'label'        => esc_html__( 'Show Social Title', 'flydoctor' ),
						'desc'         => esc_html__( 'Show social title in frontend?', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				)
			),

		)
	),
	'pages_settings'      => array(
		'title'   => esc_html__( 'Pages', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'page_header' => array(
				'title'   => esc_html__( 'Page Settings', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'page_header_type' => array(
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
				)
			)
		)
	),
	'posts'               => array(
		'title'   => esc_html__( 'Blog Posts', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'posts_header'  => array(
				'title'   => esc_html__( 'Posts Header Settings', 'flydoctor' ),
				'type'    => 'box',
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
				)
			),
			'post_settings' => array(
				'title'   => esc_html__( 'Blog Posts Settings', 'flydoctor' ),
				'type'    => 'box',
				'attr'    => array( 'class' => 'prevent-auto-close' ),
				'options' => array(
					'posts_view_type'        => array(
						'type'    => 'short-select',
						'value'   => 'list',
						'label'   => esc_html__( 'Posts View Type', 'flydoctor' ),
						'desc'    => esc_html__( 'Select the posts view type', 'flydoctor' ),
						'choices' => array(
							'list' => esc_html__( 'List', 'flydoctor' ),
							'grid' => esc_html__( 'Grid', 'flydoctor' ),
						),
					),
					'enable_post_author'     => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Author', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts author.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_date'       => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Date', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts date.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_comments'   => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Comments', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts comments number.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_categories' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Categories', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts categories.', 'flydoctor' ),
						'help'         => esc_html__( 'Only in post details page.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_tags'       => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Tags', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts tags.', 'flydoctor' ),
						'help'         => esc_html__( 'Only in post details page.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_author_box' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Author Box', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts author box.', 'flydoctor' ),
						'help'         => esc_html__( 'Only in post details page.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_related_posts'   => array(
						'label'        => esc_html__( 'Related Posts', 'flydoctor' ),
						'desc'         => esc_html__( 'Choose header type', 'flydoctor' ),
						'help'         => esc_html__( 'Only in post details page.', 'flydoctor' ),
						'type'         => 'switch',
						'value'        => 'no',
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'enable_post_pagination' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Enable Pagination', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable posts pagination.', 'flydoctor' ),
						'help'         => esc_html__( 'Only in post details page.', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				)
			),
		)
	),
	'homepage'            => array(
		'title'   => esc_html__( 'Home Page', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'homepage_header' => array(
				'title'   => esc_html__( 'Homepage Settings (Front page displays : Your latest posts)', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'homepage_header_type' => array(
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
				)
			)
		)
	),
	'blogpage'            => array(
		'title'   => esc_html__( 'Blog Page', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'homepage_header' => array(
				'title'   => esc_html__( 'Blog Page (When is selected a page as Blog Page)', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'blogpage_header_type' => array(
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
				)
			)
		)
	),
	'searchpage_settings' => array(
		'title'   => esc_html__( 'Search Page', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'search_header' => array(
				'title'   => esc_html__( 'Search Header Settings', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'search_header_type' => array(
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
				)
			)
		)
	),
	'404_settings'        => array(
		'title'   => esc_html__( '404 Page', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'404_header' => array(
				'title'   => esc_html__( '404 Header Settings', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'404_header_type' => array(
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
				)
			)
		)
	),
	'footer'              => array(
		'title'   => esc_html__( 'Footer', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'footer_info' => array(
				'title'   => esc_html__( 'Footer Info', 'flydoctor' ),
				'type'    => 'box',
				'options' => array(
					'enable_footer_widgets'   => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'type'         => 'switch',
								'value'        => 'no',
								'label'        => esc_html__( 'Enable Widgets', 'flydoctor' ),
								'desc'         => esc_html__( 'Enable widgets in footer?', 'flydoctor' ),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'flydoctor' ),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'flydoctor' ),
								),
							),
						),
						'choices' => array(
							'yes' => array(
								'number' => array(
									'label'   => '',
									'desc'    => esc_html__( 'Select the number of widgets in footer', 'flydoctor' ),
									'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
									'type'    => 'radio',
									'value'   => '4',
									'choices' => array(
										'1' => esc_html__( '1', 'flydoctor' ),
										'2' => esc_html__( '2', 'flydoctor' ),
										'3' => esc_html__( '3', 'flydoctor' ),
										'4' => esc_html__( '4', 'flydoctor' ),
									)
								),
							)
						)
					),
					'enable_footer_socials'   => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'type'         => 'switch',
								'value'        => 'yes',
								'label'        => esc_html__( 'Enable Socials', 'flydoctor' ),
								'desc'         => esc_html__( 'Enable footer socials?', 'flydoctor' ),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'flydoctor' ),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'flydoctor' ),
								),
							),
						),
						'choices' => array()
					),
					'enable_go_to_top'        => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Go To Top', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable go to top button?', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
					'copyright'               => array(
						'label' => esc_html__( 'Copyright', 'flydoctor' ),
						'desc'  => esc_html__( 'Footer Copyright', 'flydoctor' ),
						'type'  => 'text',
					)
				)
			),
		)
	),
	'fonts'               => array(
		'title'   => esc_html__( 'Typography', 'flydoctor' ),
		'type'    => 'tab',
		'options' => array(
			'site_color' => array(
				'type'  => 'color-picker',
				'value' => '',
				'label' => esc_html__( 'Color 1', 'flydoctor' ),
				'desc'  => esc_html__( 'Choose the website color 1', 'flydoctor' ),
			),
			'color_2'    => array(
				'type'  => 'color-picker',
				'value' => '',
				'label' => esc_html__( 'Color 2', 'flydoctor' ),
				'desc'  => esc_html__( 'Choose the website color 2', 'flydoctor' ),
			),
			'font1'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'font1' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'attr'         => array(),
						'label'        => esc_html__( 'Font 1', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable custom font 1', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'general_font_family' => array(
							'type'       => 'typography-v2',
							'value'      => array(
								'value' => array(
									'family' => 'Noto Serif'
								),
							),
							'components' => array(
								'size'           => false,
								'line-height'    => false,
								'letter-spacing' => false,
								'color'          => false
							),
							'label'      => '',
							'desc'       => esc_html__( 'Choose theme font 1', 'flydoctor' )
						),
					),
					'no'  => array(),
				),
			),
			'font2'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'font2' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'attr'         => array(),
						'label'        => esc_html__( 'Font 2', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable custom font 2', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'general_font_family' => array(
							'type'       => 'typography-v2',
							'value'      => array(
								'family' => 'Montserrat'
							),
							'components' => array(
								'size'           => false,
								'line-height'    => false,
								'letter-spacing' => false,
								'color'          => false
							),
							'label'      => '',
							'desc'       => esc_html__( 'Choose theme font 2', 'flydoctor' )
						),
					),
					'no'  => array(),
				),
			),
			'font3'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'font3' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'attr'         => array(),
						'label'        => esc_html__( 'Font 3', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable custom font 3', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'general_font_family' => array(
							'type'       => 'typography-v2',
							'value'      => array(
								'family' => 'Raleway'
							),
							'components' => array(
								'size'           => false,
								'line-height'    => false,
								'letter-spacing' => false,
								'color'          => false
							),
							'label'      => '',
							'desc'       => esc_html__( 'Choose theme font 3', 'flydoctor' )
						),
					),
					'no'  => array(),
				),
			),
			'font4'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'font4' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'attr'         => array(),
						'label'        => esc_html__( 'Font 4', 'flydoctor' ),
						'desc'         => esc_html__( 'Enable custom font 4', 'flydoctor' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'flydoctor' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'flydoctor' ),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'general_font_family' => array(
							'type'       => 'typography-v2',
							'value'      => array(
								'family' => 'Roboto Slab'
							),
							'components' => array(
								'size'           => false,
								'line-height'    => false,
								'letter-spacing' => false,
								'color'          => false
							),
							'label'      => '',
							'desc'       => esc_html__( 'Choose theme font 4', 'flydoctor' )
						),
					),
					'no'  => array(),
				),
			),
		)
	)
);