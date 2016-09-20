<?php get_header(); ?>

		<!-- slider -->
		<?php include("sections/frontpage-slider.php"); ?>
		<!-- / slider -->

		<!-- content -->
		<div class="container m-top-100" id="content">
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