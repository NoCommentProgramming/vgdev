<?php

	// add theme support
	if (function_exists('add_theme_support')) {
	    // Add Menu Support
	    add_theme_support('menus');
	}

	// main navigation
	function navigation($input) {
		if ($input == 'main' ||
			$input == 'secondary' ||
			$input == 'mobile' ||
			$input == 'footer') {

			wp_nav_menu(
			array(
				'theme_location'  => $input + '-menu',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => $input + '_navigation',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				)
			);
		}
	}

	// register custom menus
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
			  'main_menu' => __( 'Main Menu', 'cake' ), // main navigation
			  'secondary_menu' => __( 'Secondary Menu', 'cake' ), // secondary navigation
			  'mobile_menu' => __( 'Mobile Menu', 'cake' ), // mobile navigation
			  'footer_menu' => __( 'Footer Menu', 'cake' ) // footer navigation
			)
		);
	}

	// converts ACF date into 
	function convertDate($date) {
		$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

		$year = substr($date, 0, 4);
		$numMonth = intval(substr($date, 4, 2));
		$month = $months[$numMonth];
		$day = substr($date, 6, 2);
		return $month . ' ' . $day . ', ' . $year;
	}


//Populate the Select field field_5587fccf24f38 with dynamic values
function acf_load_user_field_choices( $field ) {
	$field['choices'] = array();
	$users = get_users( );
	foreach ( $users as $user ) {
		$firstName = $user->first_name;
		$lastName = $user->last_name;
		$value = $firstName . '-' . $lastName;
		$display = $firstName . ' ' . $lastName;
  	$field['choices'][$value] = $display;
	}
  return $field;
}
add_filter('acf/load_field/name=users', 'acf_load_user_field_choices');

function fontawesome_dashboard() {
   wp_enqueue_style('fontawesome',  get_template_directory_uri() . '/css/font-awesome.css');
}

add_action('admin_init', 'fontawesome_dashboard');

function fontawesome_icon_dashboard() {
   echo "<style type='text/css' media='screen'>
   		icon16.icon-media:before, #adminmenu .menu-icon-game div.wp-menu-image:before {
   		font-family: Fontawesome !important;
   		content: '\\f11b';
     }
   		icon16.icon-media:before, #adminmenu .menu-icon-talk div.wp-menu-image:before {
   		font-family: Fontawesome !important;
   		content: '\\f075';
     }
     	</style>";
 }
add_action('admin_head', 'fontawesome_icon_dashboard');

?>