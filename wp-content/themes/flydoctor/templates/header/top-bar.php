<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'header_top_bar/selected', 'no' ) == 'yes' ) : ?>
	<!-- Top Bar -->
	<div class="top-menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 col-xs-2">
					<div class="social">
						<a href="#" class="social-toggle"><i class="fa fa-share-alt"></i></a>

						<?php flydoctor_socials(); ?>
					</div>
				</div>

				<div class="col-sm-4 col-xs-10 text-right">
					<ul>
						<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'header_top_bar/yes/enable_header_rss', 'no' ) == 'yes' ) : ?>
							<li><a href="<?php bloginfo( 'rss2_url' ); ?>"><i
											class="fa fa-rss"></i><?php esc_html_e( 'RSS', 'flydoctor' ); ?></a></li>
						<?php endif; ?>
						<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'header_top_bar/yes/enable_header_search', 'no' ) == 'yes' ) : ?>
							<li>
								<a class="form-search-open" href="#"><i
											class="fa fa-search"></i><?php esc_html_e( 'Search', 'flydoctor' ); ?></a>
								<!-- Search Form -->
								<?php get_template_part( 'search', 'form' ); ?>
								<!--/ Search Form -->
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/ Top Bar -->
<?php endif;