<?php /* Template Name: Login */ ?>

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
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Login</h1>
	</div>	
</div>

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

			<div id="login" class="box box-shadow m-top-100">

				<h1><?php the_title(); ?></h1>

				<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>

			</div>

			<?php if(is_user_logged_in()) : ?>

				<div id="login" class="box box-shadow m-top-50">

				<a href="../account" class="button">Your Account</a>
				<br />
				<a href="../profile" class="button">Your Profile</a>

				</div>

			<?php endif; ?>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>