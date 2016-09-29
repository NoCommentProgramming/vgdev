<!-- navigation -->
<div class="container box-shadow" id="navigation">
	<div class="wrapper">

		<div class="button-container float-right">
			<a href="<?php echo home_url(); ?>/login" class="relative-center box-shadow" id="login-button">Login</a>
			<i class="fa fa-bars" id="mobile-navigation-button" aria-hidden="true" onclick="displayMobileNavigation();"></i>
		</div>

		<?php navigation('main'); ?>

		<a id="navigation-logo" href="<?php echo home_url(); ?>"><h1>VGDev</h1></a>

	</div>
</div>
<!-- / navigation -->
