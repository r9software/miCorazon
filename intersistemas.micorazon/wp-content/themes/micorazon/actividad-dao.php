<?php

/*
  @package micorazon
  Template Name: actividad-dao
 */
$current_user = wp_get_current_user();
$id = $current_user->ID;
$valor = "";
if ( isset( $_POST['chuno'] ) )
	$valor = "actividad1";
if ( isset( $_POST['chdos'] ) )
		$valor = "actividad2";
if ( isset( $_POST['chtres'] ) )
		$valor = "actividad3";


try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "UPDATE wp_usersactivity SET {$valor}=1 where user_id={$id} and fecha= CURDATE() ";
	$q = $conn->prepare( $sql );
	if ( $q->execute() ) {
		echo "{"
	. "\"success\":true,";
		echo "\"hola\": true}";
	}
	$conn = null;
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
