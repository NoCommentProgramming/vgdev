
		<!-- footer -->
		<div class="container" id="footer">
			<div class="wrapper">
			</div>
		</div>
		<!-- / footer -->

		<!-- load library javascript -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.1.0.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/hammer.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/hammer-time.min.js"></script>

		<!-- load custom javascript -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
		<?php if (is_page('home')) : ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
		<?php endif; ?>
		<?php if (is_page('games')) : ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/games-page.js"></script>
		<?php endif; ?>
		<?php if (is_page('members')) : ?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/members-page.js"></script>
		<?php endif; ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/navigation.js"></script>		
		<script src="<?php echo get_template_directory_uri(); ?>/js/gallery.js"></script>		

	</body>
</html>