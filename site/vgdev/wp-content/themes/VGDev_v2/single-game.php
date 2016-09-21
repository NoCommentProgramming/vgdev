<?php get_header(); ?>

		<!-- content -->
		<div class="container">
			<div class="wrapper">

				<?php while (have_posts()) : the_post(); ?>

					<div id="game-header" class="flex m-top-50"">
						<div id="game-title-and-genres" class="box box-shadow">
							<h1><?php the_title(); ?></h1>
							<div id="game-genres" class="flex">
								<?php
									$genres = get_field('genre');
									if( $genres ): 
										foreach( $genres as $genre ): 
								?>
											<a href="" class="box box-shadow genre <?php echo $genre; ?>"><?php echo $genre; ?></a>
								<?php 
										endforeach; 
									endif; 
								?>
								<div style="flex: 1;"></div>
							</div>
						</div>
						<div id="game-release-semester" class="box box-shadow">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<h3><?php the_field( 'semester' ); ?></h3>
						</div>
					</div>

				<?php endwhile; ?>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>