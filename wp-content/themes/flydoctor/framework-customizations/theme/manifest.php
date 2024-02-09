<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['id']           = 'flydoctor';
$manifest['name']         = esc_html__( 'FlyDoctor', 'flydoctor' );
$manifest['requirements'] = array(
	'wordpress' => array(
		'min_version' => '4.5',
	)
);

$manifest['supported_extensions'] = array(
	'backups'  => array(),
	'sidebars' => array(),
);