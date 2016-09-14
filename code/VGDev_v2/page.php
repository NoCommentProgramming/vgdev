<?php get_header(); ?>

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

				<h1><?php the_title(); ?></h1>

				<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>