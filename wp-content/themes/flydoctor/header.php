<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $flydoctor_header_type = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'header_type/selected', 'header-1' ) : 'header-1'; ?>
<?php get_template_part( 'templates/header/' . $flydoctor_header_type ); ?>