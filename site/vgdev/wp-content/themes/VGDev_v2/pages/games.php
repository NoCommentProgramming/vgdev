<?php /* Template Name: Games */ ?>

<?php get_header(); ?>

<div class="container m-top-100">
	<div class="wrapper" id="games-page-content">


	<div style="margin: 0 0 50px 0;">
		<input type="text" class="box box-shadow" id="games-search" placeholder="search games" />
	</div>


		<?php 
			$loop = new WP_Query( 
				array( 
					'post_type' => 'game', 
					'posts_per_page' => -1,
					'order' => 'ASC'
				) 
			); 
		?>

		<?php if ($loop->have_posts() ) : ?>

			<div class='flex'>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

						<a class="box box-shadow transition game-box flex" href="<?php echo get_permalink(); ?>">
							<div class="details">
								<div class="inner-text">
									<h2 class="title"><?php the_title(); ?></h2>
									<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
									<h4 class="semester"><?php the_field( 'semester' ); ?></h4>
								</div>
							</div>
							<div class="game-image" style="background-image: url(<?php the_field('hero'); ?>);"></div>
						</a> 

				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>