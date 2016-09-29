<?php /* Template Name: Members */ ?>

<?php get_header(); ?>

		<!-- content -->
		<div class="container" id="content">
			<div class="wrapper">

				<div class="m-top-100">

					<div style="margin: 0 0 50px 0;">
						<input type="text" class="box box-shadow" id="members-search" placeholder="search members" />
					</div>

					<div id="all-members" class="flex">

						<?php
							$blogusers = get_users();
							foreach ( $blogusers as $user ) :
						?>

						<a href="<?php echo home_url() . '/profile/' . $user->first_name . $user->last_name; ?>" class="member-box box box-shadow flex">
							<?php echo get_wp_user_avatar(get_the_author_meta('ID'), 100); ?>
							<span><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></span>
						</a>

						<?php endforeach; ?>

					</div>

				</div>

			</div>
		</div>
		<!-- / content -->

<?php get_footer(); ?>