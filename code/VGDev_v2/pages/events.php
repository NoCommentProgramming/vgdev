<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<?php 
	if ( get_field( 'image' ) ) {
		$headerBackground = get_field( 'image' );
	} else {
		$headerBackground = get_bloginfo('stylesheet_directory') . '/images/hero.jpg';
	}
	$titleColor = get_field( 'text_color' );
?>

<div class="header-area container" style="background-image: url(<?php echo $headerBackground; ?>);">
	<div class="wrapper" style="height: inherit;">
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Events</h1>
	</div>	
</div>

		<!-- content -->
		<div class="container">
			<div class="wrapper">

				<!-- upcoming events -->
				<div class="m-top-100">
					<h1>Upcoming Events</h1>
						<?php 
								$loop = new WP_Query( 
									array( 
										'post_type' => 'event', 
										'posts_per_page' => -1,
										'meta_key'			=> 'date',
										'orderby'			=> 'meta_value_num',
										'order'				=> 'ASC'
									) 
								); 
								if ($loop->have_posts() ) :
									while ( $loop->have_posts() ) : $loop->the_post(); 
										if ( get_field('date') > date("Ymd")) :
							?>
									<a class="box box-shadow single-event" href="<?php echo get_permalink(); ?>">
										<div class="single-event-image" style="background-image: url(<?php the_field( 'image' ); ?>);"></div>
										<div class="single-event-details">
											<h2 class="title"><?php the_title(); ?></h2>
											<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
											<h4 class="date"><?php echo convertDate( get_field( 'date' )); ?></h4>
										</div>
									</a> 
							<?php 
										endif;
									endwhile;
									wp_reset_query();
								else:
									echo "<h3>There are no Upcoming Events to display.</h3>";
								endif; 
							?>
				</div>

				<!-- past events -->
				<div class="m-top-100">
					<h1>Past Events</h1>
						<?php 
								$loop = new WP_Query( 
									array( 
										'post_type' => 'event', 
										'posts_per_page' => -1,
										'meta_key'			=> 'date',
										'orderby'			=> 'meta_value_num',
										'order'				=> 'DESC'
									) 
								); 
								if ($loop->have_posts() ) :
									while ( $loop->have_posts() ) : $loop->the_post(); 
										if ( get_field('date') < date("Ymd")) :
							?>
									<a class="box box-shadow single-event" href="<?php echo get_permalink(); ?>">
										<div class="single-event-image" style="background-image: url(<?php the_field( 'image' ); ?>);"></div>
										<div class="single-event-details">
											<h2 class="title"><?php the_title(); ?></h2>
											<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
											<h4 class="date"><?php echo convertDate(get_field( 'date' )); ?></h4>
										</div>
									</a> 
							<?php 
										endif;
									endwhile;
									wp_reset_query();
								else:
									echo "<h3>There are no Past Events to display.</h3>";
								endif; 
							?>
				</div>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>