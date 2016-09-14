<div class="container">
	<div class="wrapper upcoming-events-section">

	<h1 class="section-title">Recent Games</h1>

		<?php 
			$count = 0;
			$loop = new WP_Query( 
				array( 
					'post_type' => 'game', 
					'posts_per_page' => 3,
					'order' => 'DES',
					'orderby' => 'date'
				) 
			); 
		?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php if ($count < 1) : ?>

				<a class="event main box-shadow flex transition" href="<?php echo get_permalink(); ?>">
					<div class="image transition" style="background-image: url(<?php the_field('hero'); ?>);"></div>
					<div class="details transition">
						<div class="inner-text">
							<div class="inner-box">					
								<h2 class="title transition"><?php the_title(); ?></h2>
								<h4 class="subtitle transition"><?php the_field('subtitle'); ?></h4>
							</div>
						</div>
					</div>
				</a>

				<?php $count++; ?>

			<?php endif; ?>

		<?php endwhile; ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php if ($count >= 2) : ?>

				<?php if ($count < 3) : ?>
					<div class="sub-events flex">
				<?php endif; ?>
					<a class="event sub box-shadow transition" style="background-image: url(<?php the_field('hero'); ?>);" href="<?php echo get_permalink(); ?>">
						<div class="details transition">
							<div class="inner-text">
								<h2 class="title transition"><?php the_title(); ?></h2>
								<h4 class="subtitle transition"><?php the_field('subtitle'); ?></h4>
							</div>
						</div>
					</a>
				<?php if ($count > 4) : ?>
					</div>
				<?php endif; ?>

				<?php $count++; ?>
			<?php else: ?>
				<?php $count++; ?>
			<?php endif; ?>

		<?php endwhile; wp_reset_query(); ?>

	</div>
</div>