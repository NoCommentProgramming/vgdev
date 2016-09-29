<?php /* Template Name: Login */ ?>

<?php get_header(); ?>

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

			<div id="login" class="box box-shadow m-top-100">

				<h1><?php the_title(); ?></h1>

				<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>

			</div>

			<?php if(is_user_logged_in()) : ?>

				<div id="login" class="box box-shadow m-top-50">

				<a href="../account" class="button">Your Account</a>
				<br />
				<a href="../profile" class="button">Your Profile</a>

				</div>

			<?php endif; ?>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>