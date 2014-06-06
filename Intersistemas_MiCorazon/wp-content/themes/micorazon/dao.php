<?php

/*
  @package micorazon
  Template Name: Dao
 */
//include '../dao/MysqlConnection.php';


$GLOBALS['errores']=false;

if(isset($_POST['mail'])&& isset($_POST['pass'])){
	$mail=$_POST['mail'];
	$pass=$_POST['pass'];
	$creds = array();
	$creds['user_login'] = $mail;
	$creds['user_password'] = $pass;
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) ){
	header( "Location: ".site_url()."/login?mal=true");
	exit;
	}
	header( "Location: ".site_url()."/");
	
}
	

?>
