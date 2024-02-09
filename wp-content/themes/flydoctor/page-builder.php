<?php
/**
 * Template Name: Visual Builder Template
 */

get_header();

flydoctor_theme_header_image();

while ( have_posts() ) : the_post(); ?>
	<?php if ( post_password_required() ) : ?>
		<div class="page-wrapper password-protected-section">
			<div class="container">
				<div class="row">
					<main class="fly-content">
						<?php the_content(); ?>
					</main>
				</div>
			</div>
		</div>
	<?php else: ?>
		<?php the_content(); ?>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<div class="page-wrapper">
			<div class="container">
				<div class="row">
					<main class="fly-content">
						<?php comments_template(); ?>
					</main>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php endwhile;

get_footer();