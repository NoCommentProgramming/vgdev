<?php /* Template Name: Games */ ?>

<?php get_header(); ?>

<?php 
	if ( get_field( 'image' ) ) {
		$headerBackground = get_field( 'image' );
	} else {
		$headerBackground = get_bloginfo('stylesheet_directory') . '/images/hero.jpg';
	}
	$titleColor = get_field( 'text_color' );
?>

<div class="search-area container" style="background-image: url(<?php echo $headerBackground; ?>);">
	<div class="wrapper" style="height: inherit;">
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Games</h1>
		<input type="text" class="box box-shadow search-input" id="games-search" placeholder="search games by title, semester, or year" />
	</div>	
</div>

<div class="container m-top-100">
	<div class="wrapper" id="games-page-content">

		<?php 
			$current_semester = '';
			$loop = new WP_Query(
				array( 
					'post_type' => 'game', 
					'posts_per_page' => -1,
			    'meta_query' => array(
			    	'the_year' => array(
	        		'key' => 'year',
	        		'compare' => 'EXISTS'
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

	</div>
</div>

<?php get_footer(); ?>