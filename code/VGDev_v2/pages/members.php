<?php /* Template Name: Members */ ?>

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
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Members</h1>
		<input type="text" class="box box-shadow search-input" id="members-search" placeholder="search members" />
	</div>	
</div>

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

				<div class="m-top-100">

					<div id="all-members" class="flex">

						<?php
							$blogusers = get_users();
							foreach ( $blogusers as $user ) :
						?>

						<div class="flex-1-container member">

							<a href="<?php echo home_url() . '/profile/' . $user->user_login; ?>" class="member-box box box-shadow">
								<div class="member-image"><?php echo get_avatar($user->id, 100); ?></div>
								<div class="member-name"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></div>
							</a>

						</div>

						<?php endforeach; ?>

					</div>

				</div>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>