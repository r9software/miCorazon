<?php

/*
  @package micorazon
  Template Name: imagen-Dao
 */



$current_user = wp_get_current_user();
$id = $current_user->ID;

$target_path = WP_CONTENT_DIR . "/themes/micorazon/images/avatar/";
$target_path = $target_path . basename( $_FILES['uploadImage']['name'] );
/*
  echo $target_path;
  echo $_FILES['uploadImage']['tmp_name'];
  echo "\n" . basename( $_FILES['uploadImage']['name'] );

  echo "<pre>";
  print_r( $_FILES );
  echo "</pre>"; */
if ( ((strpos( $img_type, "jpeg" ) || strpos( $img_type, "jpg" )) || strpos( $img_type, "png" ) ) ) {
	if ( move_uploaded_file( $_FILES['uploadImage']['tmp_name'], $target_path ) ) {
		try {
			$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "UPDATE wp_usersinfo SET avatar=:avatar where user_id=:id";
			$q = $conn->prepare( $sql );
			if ( $q->execute( array( ':avatar' => $_FILES['uploadImage']['name'], ':id' => $id ) ) ) {
				header( "Location:" . site_url() . "/perfil/" );
				echo " subio ";
			} else {
				echo "No subio ";
			}
		} catch ( PDOException $e ) {
			echo "ERROR: " . $e->getMessage();
			header( "Location:" . site_url() . "/perfil/" );
			die();
		}
	} else {
		header( "Location:" . site_url() . "/perfil/" );
	}
}else {
		header( "Location:" . site_url() . "/perfil/" );
	}
?>
