<?php

/*
  @package micorazon
  Template Name: registro-dao

  //mail, pass1, pass2, n, ap,am, dia, mes, ano, "genero", "industria", "trabajo", "acepto"
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
 */

$bandera = true;
$cadena = "?";
$mail;
$password;
$n;
$am;
$ap;
$dia;
$mes;
$ano;
$genero;
$industria;
$trabajo;
$acepto;

if ( isset( $_POST['mail'] ) ) {
	$mail = $_POST['mail'];
	$cadena = $cadena . "mail=" . $mail;
	if ( !filter_var( $_POST['mail'], FILTER_VALIDATE_EMAIL ) ) {
		$bandera = false;
		$cadena = $cadena . "&mailm=";
	}
} if ( isset( $_POST['pass1'] ) && isset( $_POST['pass2'] ) ) {
	if ( empty( $_POST['pass1'] ) || empty( $_POST['pass2'] ) ) {
		$cadena = $cadena . "&passV=";
		$bandera = false;
	} else if ( strcmp( $_POST['pass1'], $_POST['pass2'] ) != 0 ) {
		$cadena = $cadena . "&passC=";
		$bandera = false;
	} else if ( strcmp( $_POST['pass1'], $_POST['pass2'] ) === 0 ) {
		$password = $_POST['pass1'];
	}
} if ( isset( $_POST['n'] ) ) {
	$n = $_POST['n'];
	$cadena = $cadena . "&n=" . $n;
	if ( $n == "" ) {
		$bandera = false;
		$cadena = $cadena . "&name=";
	}
} if ( isset( $_POST['ap'] ) ) {
	$ap = $_POST['ap'];
	$cadena = $cadena . "&ap=" . $ap;
	if ( empty( $ap ) ) {
		$bandera = false;
		$cadena = $cadena . "&apm=";
	}
} if ( isset( $_POST['am'] ) ) {
	$am = $_POST['am'];
	$cadena = $cadena . "&am=" . $am;
	if ( $am == "" ) {
		$bandera = false;
		$cadena = $cadena . "&amm=";
	}
} if ( isset( $_POST['dia'] ) ) {
	$dia = $_POST['dia'];
	$cadena = $cadena . "&d" . $dia . "=" . $dia;
	if ( !is_numeric( $dia ) ) {
		$bandera = false;
		$cadena = $cadena . "&fecha=";
	}
} if ( isset( $_POST['mes'] ) ) {
	$mes = $_POST['mes'];
	$cadena = $cadena . "&mes=" . $mes;
	if ( is_numeric( $mes ) ) {
		$bandera = false;
		$cadena = $cadena . "&fecha=";
	}
} if ( isset( $_POST['ano'] ) ) {
	$ano = $_POST['ano'];
	$cadena = $cadena . "&y" . $ano . "=" . $ano;
	if ( !is_numeric( $ano ) ) {
		$bandera = false;
		$cadena = $cadena . "&y" . $ano . "=" . $ano . "&fecha=";
	}
} if ( isset( $_POST['genero'] ) ) {
	$genero = $_POST['genero'];
	$cadena = $cadena . "&genero=" . $genero;
	if ( !is_numeric( $_POST['genero'] ) ) {
		$bandera = false;
		$cadena = $cadena . "&gm=";
	} else {
		if ( $_POST['genero'] == 1 ) {
			$genero = 'M';
		} else if ( $_POST['genero'] == 2 ) {
			$genero = 'F';
		}
	}
} else if ( !isset( $_POST['genero'] ) ) {
	$bandera = false;
	$cadena = $cadena . "&gm=";
}


$industria = $_POST['industria'];
$trabajo = $_POST['trabajo'];
if ( isset( $_POST['consejos'] ) )
	$acepto = $_POST['consejos'];
else
	$acepto = 0;
if ( $bandera ) {

	try {
		$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		$sql = "SELECT * FROM `wp_users` where user_login='{$mail}'"
				. " LIMIT 1";
		echo $sql;
		$rs = $conn->prepare( $sql );
		$rs->execute();
		$rs2 = $rs->fetchAll();
		if ( isset( $rs2[0]['ID'] ) ) {
			header( "Location:" . site_url() . "/login?existe=true" );
			exit;
		}
		



		$sql = "INSERT INTO wp_users (user_login,user_pass,user_nicename,"
				. "user_email,user_registered,display_name) "
				. "VALUES (:user_login,:user_pass,:user_nicename,:user_email,:user_registered,:display_name)";
		$q = $conn->prepare( $sql );
		if ( $q->execute( array( ':user_login' => $mail,
					':user_pass' => wp_hash_password( $password ),
					':user_nicename' => $n,
					':user_email' => $mail,
					':user_registered' => date( "Y-m-d H:i:s" ),
					':display_name' => $n ) ) ) {
			$sql = "SELECT @@identity AS id";
			$stm = $conn->prepare( $sql );
			$stm->execute();
			$array = $stm->fetchAll();
			$id = $array[0]['id'];
			$sql = "INSERT INTO wp_usersinfo (user_id,nombre,apaterno,"
					. "amaterno,dia,mes,ano,genero,industria,trabajo,acepto) "
					. "VALUES (:user_id,:nombre,:apaterno,:amaterno,:dia,:mes,:ano,:genero,:industria,:trabajo,:acepto)";
			$stm = $conn->prepare( $sql );
			if ( $stm->execute( array( ':user_id' => $id,
						':nombre' => $n,
						':apaterno' => $ap,
						':amaterno' => $am,
						':dia' => $dia,
						':mes' => $mes,
						':ano' => $ano,
						':genero' => $genero,
						':industria' => $industria,
						':trabajo' => $trabajo,
						':acepto' => $acepto
							)
					) ) {
				$creds = array();
				$creds['user_login'] = $mail;
				$creds['user_password'] = $password;
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
				if ( is_wp_error( $user ) ) {
					header( "Location: " . site_url() . "/login?existe=si" );
					exit;
				}
				header( "Location:" . site_url() . "/cuestionario?genero=" . $genero );
			}
		}

		$conn = null;
	} catch ( PDOException $e ) {
		echo "ERROR: " . $e->getMessage();
		die();
	}
} else {
	header( "Location:" . site_url() . "/crea-tu-cuenta/" . $cadena );
}
/*
  echo "<pre>";
  print_r( $_POST);
  echo "</pre>"; */
?>