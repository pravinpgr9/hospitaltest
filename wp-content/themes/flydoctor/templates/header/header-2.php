<header id="header" class="header style2" itemprop="WPHeader">
	<?php get_template_part( 'templates/header/top-bar' ); ?>

	<div class="navigation-wrapper" data-become-sticky="600" data-no-placeholder>
		<div class="container">
			<nav class="navigation clearfix">
				<div class="hamburger"><a href="#"></a></div>

				<div class="logo">
					<?php flydoctor_theme_type_logo(); ?>
				</div>

				<?php flydoctor_theme_nav_menu( 'primary' ); ?>
			</nav>
		</div>
	</div>
</header>