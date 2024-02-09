<?php $flydoctor_search_enable = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'enable_header_search', 'yes' ) : 'no'; ?>

<?php if ( $flydoctor_search_enable == 'yes' ) : ?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-search-header" method="get">
		<div class="inner">
			<div class="row">
				<div class="col-xs-8">
					<input type="search" name="s" class="form-control"
						   placeholder="<?php esc_attr_e( 'Type Keywords', 'flydoctor' ); ?>"/>
				</div>

				<div class="col-xs-4">
					<input type="submit" class="btn btn-small btn-wide"
						   value="<?php esc_attr_e( 'search', 'flydoctor' ); ?>"/>
				</div>
			</div>
		</div>
	</form>
<?php endif;