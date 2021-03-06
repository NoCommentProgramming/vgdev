
<?php if( have_rows('slide') ) : ?>

	<div id="homepage-slider" class="container">

		<?php
			$rows = get_field('slide');
			$row_count = count($rows);
			if ( $row_count > 1 ) :
		?>

			<i class="fa fa-chevron-left slider-button" id="left-button" aria-hidden="true" onclick="slide(1);" style="display: none;"></i>
			<i class="fa fa-chevron-right slider-button" id="right-button" aria-hidden="true" onclick="slide(-1);"></i>

		<?php endif; ?>

		<div id="inner-slider-wrapper" class="flex">

		<?php
			while ( have_rows('slide') ) : the_row();
				if ( get_sub_field('visible') ) : 
		?>

			<div class="slide border-box" style="background: <?php echo get_sub_field('background_color'); ?> url('<?php the_sub_field('background_image'); ?>');">

				<?php if ( get_sub_field('slide_content') ) : ?>

				<div class="slide-content">

					<?php the_sub_field('slide_content'); ?>

				</div>

				<?php endif; ?>
									
			</div>

		<?php
				endif;
			endwhile;
		?>

		</div>
	</div>

<?php endif; ?>