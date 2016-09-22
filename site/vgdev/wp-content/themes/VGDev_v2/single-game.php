<?php get_header(); ?>

		<div class="container">

			<?php while (have_posts()) : the_post(); ?>

				<div id="game-header-image" style="background-image: url(<?php the_field('hero'); ?>);"></div>

				<div class="wrapper">

				<!-- game title -->
					<div class="box box-shadow m-top-neg-50">
							<h1 id="game-title"><?php the_title(); ?></h1>
					</div>

				<!-- game genres and release semester -->
					<div id="game-genres-and-release-semester" class="flex m-top-50">
						<div id="game-genres" class="box box-shadow flex">
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
						</div>
						<div id="game-release-semester" class="box box-shadow">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<h3><?php the_field( 'semester' ); ?></h3>
						</div>
					</div>

					<!-- game gallery images -->
					<div id="gallery" class="m-top-50 box box-shadow">
						<?php
							if( have_rows('gallery') ):
								$firstImage = get_field('gallery')[0]['image'];
								$index = 0;
						?>

						<div id="gallery-current" style="background-image: url('<?php echo $firstImage; ?>');">
							<i class="fa fa-expand" id="expand-gallery-image" aria-hidden="true" onclick="expandCurrentGalleryImage();"></i>
						</div>

						<div id="gallery-options" class="flex">

						<?php while ( have_rows('gallery') ) : the_row(); ?>
							<div class="option" id="gallery-image-<?php echo sprintf("%02d", $index); ?>" style="background-image: url('<?php the_sub_field('image'); ?>');" onclick="swapCurrentGalleryImage(this);"></div>
							<?php $index++; ?>
						<?php endwhile; ?>

						</div>

						<?php
							else : ?>

							<h3>No Gallery Images</h3>

						<?php
							endif;
						?>
					</div>

				</div>

			<?php endwhile; ?>

		</div>

<?php get_footer(); ?>