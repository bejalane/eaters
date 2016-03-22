<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=0.75;"/>
	<meta name="google-site-verification" content="OxDzZPnEy0JM3uhuGlN3uGOB3kvVBGJoigQ0qmfTq_A" />
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/chosen.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/responsiveslides.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<!--	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/responsiveslides.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/main.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<?php wp_head(); ?>
</head>