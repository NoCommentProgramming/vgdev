<?php get_header(); ?>

<!-- single event page content -->
<div class="container">

	<?php while (have_posts()) : the_post(); ?>

		<div id="game-header-image" style="background-image: url(<?php the_field('image'); ?>);"></div>

		<div class="wrapper">

		<!-- event title -->
			<div class="box box-shadow m-top-neg-50">
				<h1 id="game-title"><?php the_title(); ?></h1>
					<?php if (get_field('subtitle')): ?>
						<h2 id="game-subtitle"><?php the_field('subtitle'); ?></h2>
					<?php endif; ?>
			</div>
		<!-- / event title -->

		<div class="event-date-time-and-location m-top-50 flex">
			<div class="event-date-time box box-shadow">
				<div class="event-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo convertDate(get_field('date')); ?></div>
				<div class="event-time"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_field('time'); ?></div>
			</div>
			<div class="event-location box box-shadow">
				<i class="fa fa-map-marker" aria-hidden="true"></i><?php echo get_field('location'); ?>
			</div>
		</div>

		<!-- event info -->
			<div id="game-info" class="box box-shadow m-top-50">
				<?php the_content(); ?>
			</div>
		<!-- / event info -->

	</div>

	<?php endwhile; ?>

</div>
<!-- / single event page content -->

<?php get_footer(); ?>