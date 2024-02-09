<header id="header" class="header" itemprop="WPHeader">
	<?php get_template_part( 'templates/header/top-bar' ); ?>

	<div class="logo">
		<?php flydoctor_theme_type_logo(); ?>
	</div>

	<nav class="navigation clearfix" data-become-sticky="600">
		<div class="container">
			<div class="hamburger"><a href="#"></a></div>

			<?php /* Logo in menu only for sticky */ ?>
			<div class="logo logo-sticky">
				<?php flydoctor_theme_type_logo(); ?>
			</div>

			<?php flydoctor_theme_nav_menu( 'primary' ); ?>
		</div>
	</nav>
</header>