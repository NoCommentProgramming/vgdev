<div class="container m-top-100">
	<div class="wrapper" id="games-page-content">
		<h1>Featured Games</h1>

		<?php 
			$current_semester = '';
			$loop = new WP_Query(
				array( 
					'post_type' => 'game', 
					'posts_per_page' => 4,
			    'meta_query' => array(
			    	'the_year' => array(
	        		'key' => 'year',
	        		'compare' => 'EXISTS'
	        	),
	        	'is_featured' => array(
	        		'key' => 'featured',
	        		'value' => true,
	        	)
			    ),
			    'meta_key' => 'semester',
					'orderby' => array(
						'the_year' => 'DESC',
						'semester' => 'ASC'
					)
				) 
			); 
		?>

		<?php if ($loop->have_posts() ) : ?>

			<div class='flex'>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="flex-1-container game">
						<a class="box box-shadow transition game-box flex" href="<?php echo get_permalink(); ?>">
							<div class="details">
								<div class="inner-text">
									<h2 class="title"><?php the_title(); ?></h2>
									<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
									<h4 class="semester"><?php the_field( 'semester' ); ?> <?php the_field( 'year' ); ?></h4>
								</div>
							</div>
							<div class="game-image" style="background-image: url(<?php the_field('hero'); ?>);"></div>
						</a> 
					</div>

				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div>

		<?php endif; ?>

		<h1 class="m-top-100">Recent Games</h1>

		<?php 
			$current_semester = '';
			$loop = new WP_Query(
				array( 
					'post_type' => 'game', 
					'posts_per_page' => 4,
			    'meta_query' => array(
			    	'the_year' => array(
	        		'key' => 'year',
	        		'compare' => 'EXISTS'
	        	),
	        	'is_featured' => array(
	        		'key' => 'featured',
	        		'value' => 0,
	        	)
			    ),
			    'meta_key' => 'semester',
					'orderby' => array(
						'the_year' => 'DESC',
						'semester' => 'ASC'
					)
				) 
			); 
		?>

		<?php if ($loop->have_posts() ) : ?>

			<div class='flex'>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="flex-1-container game">
						<a class="box box-shadow transition game-box flex" href="<?php echo get_permalink(); ?>">
							<div class="details">
								<div class="inner-text">
									<h2 class="title"><?php the_title(); ?></h2>
									<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
									<h4 class="semester"><?php the_field( 'semester' ); ?> <?php the_field( 'year' ); ?></h4>
								</div>
							</div>
							<div class="game-image" style="background-image: url(<?php the_field('hero'); ?>);"></div>
						</a> 
					</div>

				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div>

		<?php endif; ?>

		<a class="button box-shadow all-games" href="games"><h2>See All Games</h2></a>

	</div>
</div>