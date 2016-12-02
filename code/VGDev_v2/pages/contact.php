<?php /* Template Name: Contact */ ?>

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
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Contact Us</h1>
	</div>	
</div>

		<!-- content -->

		<div class="container m-top-100" id = "contact_content">
			<div class="wrapper">

				<div class="box box-shadow">
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>