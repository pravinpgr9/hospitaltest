<?php
$flydoctor_related_posts = flydoctor_related_posts();

if ( ! empty( $flydoctor_related_posts ) ) : ?>
	<!-- Related Posts -->
	<div class="related-posts">
		<h4 class="title"><?php esc_html_e( 'Related Posts', 'flydoctor' ); ?></h4>

		<div class="related-posts-slider">
			<?php foreach ( $flydoctor_related_posts as $item ) : ?>
				<div class="item">
					<article class="article" itemscope itemtype="http://schema.org/Article">
						<?php $thumbnail_id = get_post_thumbnail_id( $item->ID ); ?>
						<?php if ( ! empty($thumbnail_id) ) : ?>
							<div class="post-media">
								<div class="text-center">
									<div class="position-relative inline-block">
										<?php if( function_exists('fw_resize') ) : ?>
											<img alt="<?php echo esc_attr( $item->post_title ); ?>" src="<?php echo fw_resize( $thumbnail_id, 540, 300 ); ?>" itemprop="image"/>
										<?php else : ?>
											<?php $image = wp_get_attachment_url( get_post_thumbnail_id( $item->ID  ), 'post-thumbnails' ); ?>
											<?php flydoctor_theme_show_default_post_image( $image, $item->ID  ); ?>
										<?php endif; ?>
										<div class="post-label"><i class="fa fa-file-photo-o"></i></div>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<div class="post-meta">
							<?php flydoctor_theme_get_one_post_category( $item->ID ); ?>
						</div>

						<h3 class="post-title"><a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
												  itemprop="name"><?php echo esc_html( $item->post_title ); ?></a></h3>

						<div class="post-meta font2">
							<span class="post-author" itemprop="author"><?php esc_html_e( 'written by', 'flydoctor' ); ?>
								<a href="<?php echo esc_url( get_author_posts_url( $item->post_author ) ); ?>"><?php echo esc_html( get_the_author_meta( 'display_name', $item->post_author ) ); ?></a></span>
							<a href="<?php the_permalink(); ?>" class="post-date" itemprop="dateCreated"
							   datetime="<?php the_time( 'c' ); ?>"><?php echo esc_html( get_the_date( '', $item ) ); ?></a>
						</div>
					</article>
				</div><!--/ item -->
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div><!--/ related-posts-slider -->
	</div><!--/ related-posts -->
<?php endif;