<?php get_header(); ?>

		<!-- hero -->
		<div class="container" id="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero.jpg');">
			<div class="wrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/images/vg-dev-logo.png" id="vg-dev-hero-logo" />
			</div>
		</div>
		<!-- / hero -->

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

				<div class="box box-shadow">
					<h1 class="centered">Who We Are</h1>
					<?php while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					`<?php endwhile; ?>
				</div>

			</div>
		</div>
		<!-- / content -->

		<?php include("sections/upcoming-events.php"); ?>

		<?php include("sections/recent-games.php"); ?>


<?php get_footer(); ?>