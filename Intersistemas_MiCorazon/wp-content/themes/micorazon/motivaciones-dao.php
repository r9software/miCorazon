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
	$motivation1 = htmlentities($_POST['motivacion1']);
if ( isset( $_POST['motivacion2'] ) )
	$motivation2 = htmlentities($_POST['motivacion2']);
if ( isset( $_POST['motivacion3'] ) )
	$motivation3 = htmlentities($_POST['motivacion3']);


try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "INSERT INTO wp_usersmotivation (user_id,motivation1,motivation2,"
			. "motivation3) "
			. "VALUES (:user_id,:motivation1,:motivation2,:motivation3)";
	$q = $conn->prepare( $sql );
	if ( $q->execute( array( ':user_id' => $id,
				':motivation1' => $motivation1,
				':motivation2' => $motivation2,
				':motivation3' => $motivation3 ) ) ) {

		header( "Location:" . site_url() . "/perfil/" );
	}
	$conn = null;
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
