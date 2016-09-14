<div class="container m-top-100">
	<div class="wrapper">

	<h1 class="section-title">Upcoming Events</h1>

		<?php 
			$count = 0;
			$loop = new WP_Query( 
				array( 
					'post_type' => 'event', 
					'posts_per_page' => 4,
					'order' => 'ASC',
					'orderby' => 'meta_value',
					'meta_key' => 'date'
				) 
			); 
		?>

		<?php if ($loop->have_posts() ) : ?>

			<?php 
				$numberOfPosts = wp_count_posts('event')->publish; 
				$customMargin = '';
			?>

			<div class="upcoming-events-section flex">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<?php if ($count < 1) : ?>

					<a class="event main box-shadow flex transition" href="<?php echo get_permalink(); ?>">
						<div class="image transition" style="background-image: url(<?php the_field('image'); ?>);"></div>
						<div class="details transition">
							<div class="inner-text">
								<h3 class="date"><?php echo convertDate(get_field('date')); ?></h3>
								<div class="inner-box">					
									<h2 class="title transition"><?php the_title(); ?></h2>
									<h4 class="subtitle transition"><?php the_field('subtitle'); ?></h4>
								</div>
								<h3 class="location"><?php the_field('location'); ?></h3>
							</div>
						</div>
					</a>

				<?php else : ?>

					<?php
						if ($numberOfPosts > 3 && $count == 2) {
							$customMargin = 'center-event';
						} else if ($numberOfPosts == 3 && $count == 1) {
							$customMargin = 'left-event';
						} else {
							$customMargin = '';
						}
					?>

					<a class="event sub box-shadow transition <?php echo $customMargin; ?>" style="background-image: url(<?php the_field('image'); ?>);" href="<?php echo get_permalink(); ?>">
						<div class="details transition">
							<div class="inner-text">
								<h2 class="title transition"><?php the_title(); ?></h2>
								<h4 class="subtitle transition"><?php the_field('subtitle'); ?></h4>
							</div>
						</div>
					</a> 

				<?php endif; ?>

				<?php $count++; ?>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

			</div>

		<?php endif; ?>

	</div>
</div>