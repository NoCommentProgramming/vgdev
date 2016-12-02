<!doctype html>
	<head>
	
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

  	<link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
  	<link href="<?php echo get_template_directory_uri(); ?>/images/icons/facivon.png" rel="apple-touch-icon-precomposed">

		<meta name="theme-color" content="#333">
		<meta name="msapplication-navbutton-color" content="#333">
		<meta name="apple-mobile-web-app-status-bar-style" content="#333">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

		<!-- load css -->
		
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" />

		<?php if (is_singular('game')) : ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/circle.css" />			
		<?php endif; ?>

	</head>
	<body>

		<?php include('sections/mobile-navigation.php'); ?>
		<?php include("sections/navigation.php"); ?>
