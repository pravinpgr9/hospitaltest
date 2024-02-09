<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content.
 */
?>

<?php $footer_widgets = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'enable_footer_widgets/selected', 'no' ) : 'no'; ?>
<?php if( 'yes' == $footer_widgets ) : ?>
	<?php get_template_part('templates/footer/widgets'); ?>
<?php endif; ?>

<!-- Footer -->
<footer class="footer" itemprop="WPFooter">
	<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'enable_footer_socials/selected', 'no' ) == 'yes' ) : ?>
		<?php flydoctor_socials( array( 'class' => 'footer-social' ) ); ?>
	<?php endif; ?>

	<div class="footer-copyright">
		<?php echo defined( 'FW' ) ? do_shortcode( fw_get_db_settings_option( 'copyright' ) ) : ''; ?>
	</div>

	<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'enable_go_to_top', 'no' ) == 'yes' ) : ?>
		<a class="back-to-top anchor" href="#header"></a>
	<?php endif; ?>
</footer>
<!--/ Footer -->
<?php wp_footer(); ?>
</body>
</html>