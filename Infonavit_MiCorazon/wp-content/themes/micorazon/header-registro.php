<?php
/* 
@package micorazon
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
       <meta charset="<?php bloginfo( 'charset' ); ?>">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--BASIC CSS-->
        <link href="<?php bloginfo('template_url'); ?>/css/micorazon.css" media="screen" rel="stylesheet" type="text/css"/>
        <!--THEME CSS-->
        <link href="<?php bloginfo('template_url'); ?>/css/infonavit.css" media="screen" rel="stylesheet" type="text/css"/>
		<link href="<?php bloginfo('template_url'); ?>/css/dropkick.css" media="screen" rel="stylesheet" type="text/css">
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie.css">
        <![endif]-->
        <!--JAVASCRIPT-->
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    </head>