<?php

/*
  @package micorazon
  Template Name: Dao
 */
//include '../dao/MysqlConnection.php';

if ( isset( $_POST['codigo'] ) ) {
	$codigo = $_POST['codigo'];
	wp_redirect("http://".$codigo.".micorazon.wp:8888");
	//header("Location:". bloginfo('wpurl'));
	//echo $codigo;
	exit;
	
	
}


?>