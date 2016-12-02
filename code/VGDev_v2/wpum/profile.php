<?php
/**
 * WPUM Template: Profile.
 * Displays the user profile.
 *
 * @package     wp-user-manager
 * @copyright   Copyright (c) 2015, Alessandro Tesoro
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */

// Display error message if no user has been found.
if ( !is_object( $user_data ) ) {
	$args = array(
		'id'   => 'wpum-profile-not-found',
		'type' => 'error',
		'text' => __( 'User not found.', 'wpum' )
	);
	wpum_message( $args );
	return;
}

do_action( "wpum_before_profile", $user_data );

$userFirstName = $user_data->first_name;
$userLastName = $user_data->last_name;
$userDisplayName = strtolower($user_data->user_login);

?>

<!-- start profile -->

<div class="container" id="wpum-profile-<?php echo $user_data->ID;?>">

	<div id="game-header-image" style="background-image: url('http://xiledesigns.com/vgdev/wp-content/uploads/2016/08/blue-abstract-background-compressor.jpg');">
		<div class="wrapper" style="height: inherit;">
			<?php echo get_avatar( $user_data->ID , 128 ); ?>		
		</div>
	</div>

	<div class="wrapper">
		<div class="box box-shadow m-top-neg-50">
			<h1 id="game-title"><?php echo $userFirstName; ?> <?php echo $userLastName; ?></h1>
			<?php if(is_user_logged_in()) : ?><a class="logged-in" href="<?php echo home_url(); ?>/account">( Edit Your Account )</a><?php endif; ?>
		</div>

		<div class="flex m-top-50 ">
			<?php if ($user_data->user_url && $user_data->user_url != "") : ?>
				<a class="box box-shadow member-link" target="_BLANK" href="<?php echo $user_data->user_url; ?>">
						<i class="fa fa-link" target="_BLANK" aria-hidden="true"></i> WEBSITE
				</a>
			<?php endif; ?>
			<a class="box box-shadow member-link" href="mailto:<?php echo $user_data->user_email; ?>">
					<i class="fa fa-envelope" aria-hidden="true"></i> EMAIL
			</a>
		</div>

		<div class="box box-shadow m-top-50">
			<?php 
				if ($user_data->user_description && $user_data->user_description != "") {
					echo $user_data->user_description; 
				} else {
					echo '<h2 style="text-align: center;">No profile information on this member yet.</h2>';
				}
			?>
		</div>

		<div class="m-top-100">
			<h1>Contributed To</h1>
		</div>
	</div>

	<div class="wrapper">

		<?php 
			$loop = new WP_Query( 
				array( 
					'post_type' => 'game', 
					'posts_per_page' => -1,
					'order' => 'ASC'
				) 
			);
			$count = 0; 
		?>

		<?php if ($loop->have_posts() ) : ?>

			<div class='m-top-50'>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php 

						$contributedToGame = false;

						while ( have_rows('contributer') ) : the_row(); 
							$field = get_sub_field_object('role');
							$value = $field['value'];
							$label = $field['choices'][$value];

							$user = get_sub_field('user');
							$firstname = $user['user_firstname'];
							$lastname = $user['user_lastname'];
							$displayName = $user['user_nicename'];

						if ($displayName === $userDisplayName) {
							$contributedToGame = true;
							$count++;
						}
						endwhile;

						if ($contributedToGame) :
					?>

						<a class="contributed-game box box-shadow" href="<?php echo get_permalink(); ?>">
							<div class="image-square" style="background-image: url('<?php the_field('hero'); ?>');" ></div>
							<div class="contributed-details">
								<h2 class="title"><?php the_title(); ?></h2>
								<h4 class="subtitle"><?php the_field( 'subtitle' ); ?></h4>
								<h4 class="semester"><?php the_field( 'semester' ); ?> <?php the_field( 'year' ); ?></h4>
							</div>
							<div class="contributed-role">
								<h3 class="role"><?php echo $label; ?></h3>
							</div>
						</a>

					<?php endif; ?>

				<?php endwhile; ?>

				<?php if ($count <= 0) : ?>
					<div class="box box-shadow m-top-50 centered">
						<h2>This member has not yet contributed to any games.</h2>
					</div>
				<?php endif; ?>

				<?php wp_reset_query(); ?>

			</div>

		<?php else: ?>
			<div class="box box-shadow m-top-50 centered">
				<h2>Sorry, but there seems there are no games in the database.</h2>
			</div>
		<?php endif; ?>

	</div>

</div>
<!-- end profile -->

<?php do_action( "wpum_after_profile", $user_data ); ?>
