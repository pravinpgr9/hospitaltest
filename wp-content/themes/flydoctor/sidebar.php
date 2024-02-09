<?php
/**
 * The Sidebar containing the main widget area
 */

$flydoctor_sidebar_position = null;
if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) :
	$flydoctor_sidebar_position = fw_ext_sidebars_get_current_position();
	if ( $flydoctor_sidebar_position !== 'full' && $flydoctor_sidebar_position !== null ) : ?>
		<aside class="sidebar">
			<?php if ( $flydoctor_sidebar_position === 'left' || $flydoctor_sidebar_position === 'right' ) : ?>
				<?php echo fw_ext_sidebars_show( 'blue' ); ?>
			<?php endif; ?>
		</aside>
	<?php endif; ?>
<?php else : ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	<?php endif; ?>
<?php endif;