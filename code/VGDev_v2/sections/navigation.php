<!-- navigation -->
<div class="container box-shadow" id="navigation">
	<div class="wrapper">

		<div class="button-container float-right">
			<?php if (is_user_logged_in()) : ?>
				<a href="<?php echo home_url(); ?>/login" class="relative-center box-shadow" id="login-button">Log Out</a>				
			<?php else: ?>
				<a href="<?php echo home_url(); ?>/login" class="relative-center box-shadow" id="login-button">Login</a>
			<?php endif; ?>
			<i class="fa fa-bars" id="mobile-navigation-button" aria-hidden="true" onclick="displayMobileNavigation();"></i>
		</div>

		<?php navigation('main'); ?>

		<a id="navigation-logo" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vg-dev-logo-white-rotated.png" /></a>

	</div>
</div>
<!-- / navigation -->
