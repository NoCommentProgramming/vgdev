<?php /* Template Name: Password Reset */ ?>

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
		<h1 <?php if ($titleColor) { echo 'style="color: ' . $titleColor . ';"';} ?>>Password Reset</h1>
	</div>	
</div>

<div class="container">
	<div class="wrapper">
		<div class="box box-shadow m-top-100">
		<?php
			while (have_posts()) : the_post();
				the_content();
			endwhile;
		?>
		</div>
	</div>
</div>

<?php get_footer(); ?>