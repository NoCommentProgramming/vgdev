<?php /* Template Name: Games */ ?>

<?php get_header(); ?>

<div class="container m-top-100">
	<div class="wrapper">

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

			<div class="box flex">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<a class="box box-shadow transition <?php echo $customMargin; ?>" style="background-image: url(<?php the_field('image'); ?>);" href="<?php echo get_permalink(); ?>">
						<div class="details transition">
							<div class="inner-text">
								<h2 class="title transition"><?php the_title(); ?></h2>
								<h4 class="subtitle transition"><?php the_field('subtitle'); ?></h4>
							</div>
						</div>
					</a> 

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

			</div>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>