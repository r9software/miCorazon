<?php
/**
 * The Main Header for our theme.
 *
 * @package micorazon
 */

if ( !is_user_logged_in() ) {
	header( "Location: " . site_url() . "/login" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?> style="margin-top:0px !important; ">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport"  content = "user-scalable=no, width=1000">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php wp_head(); ?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--BASIC CSS-->
        <link href="<?php bloginfo('template_url'); ?>/css/micorazon.css" media="screen" rel="stylesheet" type="text/css"/>
        <!--THEME CSS-->
        <link href="<?php bloginfo('template_url'); ?>/css/intersistemas.css" media="screen" rel="stylesheet" type="text/css"/>
        <link href="<?php bloginfo('template_url'); ?>/css/movil.css" media="screen" rel="stylesheet" type="text/css"/>
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie.css">
        <![endif]-->
	</head>
	<body>
