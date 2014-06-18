<?php

/*
  @package micorazon
  Template Name: motivaciones-dao
 */
$current_user = wp_get_current_user();
$id = $current_user->ID;
$motivation1 = "";
$motivation2 = "";
$motivation3 = "";
if ( isset( $_POST['motivacion1'] ) )
	$motivation1 = ($_POST['motivacion1']);
if ( isset( $_POST['motivacion2'] ) )
	$motivation2 = ($_POST['motivacion2']);
if ( isset( $_POST['motivacion3'] ) )
	$motivation3 = ($_POST['motivacion3']);


try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "UPDATE wp_usersmotivation SET motivation1=\"{$motivation1}\",motivation2=\"{$motivation2}\","
			. "motivation3=\"{$motivation3}\" where user_id={$id}";
	$q = $conn->prepare( $sql );
	if ( $q->execute( ) ) {

		header( "Location:" . site_url() . "/perfil/" );
	}
	$conn = null;
} catch ( PDOException $e ) {
	header( "Location:" . site_url() . "/perfil/" );
	echo "ERROR: " . $e->getMessage();
	die();
}
header( "Location:" . site_url() . "/perfil/" );
?>
