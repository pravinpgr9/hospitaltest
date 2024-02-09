<?php
$footer_widgets_number = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'enable_footer_widgets/yes/number', '4' ) : '4';

// check if exist some sidebar seted
$flydoctor_footer_sidebars = false;
for ( $i = 1; $i <= $footer_widgets_number; $i ++ ) {
	if ( is_active_sidebar( 'footer-' . $i ) ) {
		$flydoctor_footer_sidebars = true;
	}
}

if ( ! $flydoctor_footer_sidebars ) {
	return;
}

$footer_widgets_number = (int) $footer_widgets_number;
if ( $footer_widgets_number == 3 ) {
	$footer_column_class = 'col-md-4 col-sm-4';
} elseif ( $footer_widgets_number == 2 ) {
	$footer_column_class = 'col-sm-6';
} elseif ( $footer_widgets_number == 1 ) {
	$footer_column_class = 'col-md-12';
} else {
	$footer_column_class = 'col-md-3 col-sm-6';
}
?>
<div class="fly-footer-widgets fly-widget-number-<?php echo esc_attr( $footer_widgets_number ); ?>">
	<div class="container">
		<div class="row">
			<?php for ( $i = 1; $i <= $footer_widgets_number; $i ++ ) : ?>
				<div class="<?php echo esc_attr( $footer_column_class ); ?>">
					<?php dynamic_sidebar( 'footer-' . $i ); ?>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>