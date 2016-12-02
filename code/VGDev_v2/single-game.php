<?php get_header(); ?>

<!-- single game page content -->
<div class="container">

	<?php while (have_posts()) : the_post(); ?>

		<div id="game-header-image" style="background-image: url(<?php the_field('hero'); ?>);"></div>

		<div class="wrapper">

		<!-- game title -->
			<div class="box box-shadow m-top-neg-50">
				<h1 id="game-title"><?php the_title(); ?></h1>
					<?php if (get_field('subtitle')): ?>
						<h2 id="game-subtitle"><?php the_field('subtitle'); ?></h2>
					<?php endif; ?>
			</div>
		<!-- / game title -->

		<!-- game genres and release semester -->
			<div id="game-genres-and-release-semester" class="flex m-top-50">

			<!-- game genres -->
				<div id="game-genres" class="box box-shadow flex">
					<?php
						$genres = get_field('genre');
						if( $genres ): 
							foreach( $genres as $genre ): 
					?>
						<div class="box genre <?php echo $genre; ?>"><?php echo $genre; ?></div>
					<?php 
							endforeach; 
						else:
							echo "No genres associated with this game.";
						endif; 
					?>
				</div>
			<!-- / game genres -->

			<!-- release semester -->
				<div id="game-release-semester" class="box box-shadow">
					<div class="absolute-center">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<h3><?php the_field( 'semester' ); ?> <?php the_field( 'year' ); ?></h3>
					</div>
				</div>
			<!-- / release semester -->

			</div>
		<!-- / game genres and release semester -->

		<!-- game info -->
			<div id="game-info" class="box box-shadow m-top-50">
				<?php 
					if( get_the_content() ) {
						echo "<h2>Game Description</h2>";
						the_content();
					} else {
						echo '<p>No game description added.</p>';
					}
				?>
			</div>
		<!-- / game info -->

		<!-- download links -->
			<div id="download-links" class="box box-shadow m-top-50">

				<h2>Downloadable Content</h2>

				<div class="flex">

					<?php if( get_field('all_content') ): ?>
						<div class="flex-1-container">
							<a class="all-content download-button" href="<?php the_field('all_content')['url']; ?>"><i class="fa fa-download" aria-hidden="true"></i><span>All Content</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('windows_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('windows_game'); ?>"><i class="fa fa-windows" aria-hidden="true"></i><span>Windows</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('mac_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('mac_game')['url']; ?>"><i class="fa fa-apple" aria-hidden="true"></i><span>OSX</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('linux_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('linux_game')['url']; ?>"><i class="fa fa-linux" aria-hidden="true"></i><span>Linux</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('android_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('android_game')['url']; ?>"><i class="fa fa-android" aria-hidden="true"></i><span>Android</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('ios_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('ios_game')['url']; ?>"><i class="fa fa-apple" aria-hidden="true"></i><span>IOS</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('flash_game') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('flash_game')['url']; ?>"><img class="download-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/flash-icon.png" /><span>Flash</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('unity_web') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('unity_web')['url']; ?>"><img class="download-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/unity-icon.png" /><span>Unity</span></a>
						</div>
					<?php endif; ?>

					<?php if( get_field('graphics') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('graphics')['url']; ?>"><i class="fa fa-file-image-o" aria-hidden="true"></i><span>Graphics</span></a>
						</div>
					<?php endif;?>

					<?php if( get_field('audio') ): ?>
						<div class="flex-1-container">
							<a class="download-button" href="<?php the_field('audio')['url']; ?>"><i class="fa fa-file-audio-o" aria-hidden="true"></i><span>Audio</span></a>
						</div>
					<?php endif; ?>

				</div>

			</div>
		<!-- end of download links -->

		<!-- game gallery -->
			<div id="gallery" class="box box-shadow flex m-top-50">
				<?php
					if( have_rows('gallery') ):
						$firstImage = get_field('gallery')[0]['image'];
						$index = 0;
				?>

				<div id="gallery-current" style="background-image: url('<?php echo $firstImage; ?>');">
					<i class="fa fa-expand" id="expand-gallery-image" aria-hidden="true" onclick="expandCurrentGalleryImage();"></i>
				</div>

				<div class="hidden-overflow-x">
					<div id="gallery-options">

					<?php while ( have_rows('gallery') ) : the_row(); ?>
						<div class="option" id="gallery-image-<?php echo sprintf("%02d", $index); ?>" style="background-image: url('<?php the_sub_field('image'); ?>');" onclick="swapCurrentGalleryImage(this);"></div>
						<?php $index++; ?>
					<?php endwhile; ?>

					</div>
				</div>

				<?php
					else : ?>

					<h3>No Gallery Images</h3>

				<?php
					endif;
				?>
			</div>
		<!-- / game gallery -->

		<!-- user contributers -->
			<div class="flex m-top-50">
				<div class="box box-shadow" id="game-contributers">

				<?php if ( have_rows('contributer')) : ?>
					<h2>Contributors</h2>
					<div class="flex">
						<?php 
								while ( have_rows('contributer') ) : the_row(); 
									$field = get_sub_field_object('role');
									$value = $field['value'];
									$label = $field['choices'][$value];
									$user = get_sub_field('user');
									$firstname = $user['user_firstname'];
									$lastname = $user['user_lastname'];
									$displayName = $user['user_nicename'];
									$homeurl = home_url() . '/profile/' . $displayName;																
						?>
						<div class="flex-1-container contributer">
							<a href="<?php echo $homeurl; ?>" class="game-contributer">
								<div class="contributer-image"><?php echo $user['user_avatar']; ?></div>
								<div class="contributer-content">
									<h3><?php echo $firstname . ' ' . $lastname; ?></h3>
									<span><?php echo $label; ?></span>
								</div>
							</a>
						</div>
						<?php endwhile; ?>
					</div>
						<?php 
							else:
								echo '<p>No contributers have been listed for this game yet.</p>';
							endif; 
						?>

				</div>
			</div>
		<!-- / user contributers -->

	</div>

	<?php endwhile; ?>

</div>
<!-- / single game page content -->

<!-- gallery expansion container -->
<div id="gallery-expansion">
	<i class="fa fa-chevron-left slider-button" id="left-button" aria-hidden="true" onclick="prevImage();"></i>
	<i class="fa fa-chevron-right slider-button" id="right-button" aria-hidden="true" onclick="nextImage();"></i>
	<i class="fa fa-times" id="close-gallery" aria-hidden="true" onclick="closeGallery();"></i>
	<div id="current-image"></div>
</div>
<!-- / gallery expansion container -->

<?php get_footer(); ?>