<?php
/*
 * @package micorazon
  Template Name: apicentral
 */
/* select count(*) from wp_usersinfo where YEAR(CURDATE())-`wp_usersinfo`.`ano`<20
  //rangoedad
  SELECT SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`<20) THEN 1 ELSE 0 END) campo1, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>20 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<30) THEN 1 ELSE 0 END) campo2, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>30 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<40) THEN 1 ELSE 0 END) campo3, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>40 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<50) THEN 1 ELSE 0 END) campo4, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>50) THEN 1 ELSE 0 END) campo5  FROM wp_usersinfo;
  //genero
 * SELECT SUM(CASE WHEN genero='M' THEN 1 ELSE 0 END) M, SUM(CASE WHEN genero='F' THEN 1 ELSE 0 END) F FROM wp_usersinfo
 * //localidades
 * SELECT industria, COUNT(*) from wp_usersinfo group by industria
 * area
 * SELECT trabajo, COUNT(*) from wp_usersinfo group by trabajo
 * 
 * 
 *  */
$edades = array();
$genero = array();
$localidadmixed = array();
$areamixed = array();
$presion = array();
$presionsi = array();
$presionm = array();
$presionf = array();
$presioneb = array();
$presionea = array();
$glucosa = array();
$glucosasi = array();
$glucosam = array();
$glucosaf = array();
$glucosaeb = array();
$glucosaem = array();
$glucosaea = array();
$masa = array();
$masam = array();
$masaf = array();
$masaeb = array();
$masaem = array();
$masaea = array();

$circfa = array();
$circfb = array();
$circma = array();
$circmb = array();

$circema = array();
$circemb = array();

$circefa = array();
$circefb = array();

$tri = array();
$trisi = array();
$trim = array();
$trif = array();
$trieb = array();
$triea = array();

$frutas = array();
$frutasm = array();
$frutasf = array();
$frutas1 = array();
$frutas2 = array();
$frutas3 = array();


$verduras = array();
$verdurasm = array();
$verdurasf = array();
$verduras1 = array();
$verduras2 = array();
$verduras3 = array();
$capeados=array();
$capeadosm=array();
$capeadosf=array();
$capeados1=array();
$capeados2=array();
$capeados3=array();
$capeados4=array();
$capeados5=array();
$salf=array();
$salm=array();
$sal=array();
$sal1=array();
$sal2=array();
$sal3=array();
$estres=array();
$estresm=array();
$estresf=array();
$estres1=array();
$estres2=array();
$estres3=array();
$estres4=array();
$estres5=array();

$dato1 = "[:alnum:]";
$dato2 = "[:alnum:]"; 
if ( isset( $_GET['dato1'] ) && strcmp( $_GET['dato1'], "todos" ) != 0 ) {
	$dato1 = "[[:<:]]" . $_GET['dato1'] . "[[:>:]]";
}
if ( isset( $_GET['dato2'] ) && strcmp( $_GET['dato2'], "todos" ) != 0 ) {
	$dato2 = "[[:<:]]" . $_GET['dato2'] . "[[:>:]]";
}

try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	if ( isset( $_GET['rangoedades'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>=20 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>=30 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>=40 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>=50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}'";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$edades = $q->fetchAll();
			$edades = $edades[0];
			//echo json_encode($edades);
			//echo $sql;
			//echo "<pre>";
			//print_r($edades);
			//echo "</pre>";
		}
	} elseif ( isset( $_GET['genero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN genero='M' THEN 1 ELSE 0 END) M, SUM(CASE WHEN genero='F' THEN 1 ELSE 0 END) F FROM wp_usersinfo where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$genero = $q->fetchAll();
			$genero = $genero[0];
		}
	} elseif ( isset( $_GET['localidades'] ) ) {
		$sql = "SELECT distinct industria, COUNT(*) from wp_usersinfo where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' group by industria";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$localidades = $q->fetchAll();
			foreach ( $localidades as $localidad ) {
				$localidadmixed[$localidad['industria']] = $localidad[1];
			}
		}
	} elseif ( isset( $_GET['area'] ) ) {
		$sql = "SELECT distinct trabajo, COUNT(*) from wp_usersinfo where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' group by trabajo";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$areas = $q->fetchAll();
			foreach ( $areas as $area ) {
				$areamixed[$area['trabajo']] = $area[1];
			}
		}
	} elseif ( isset( $_GET['presion'] ) ) {
		$sql = "SELECT SUM(CASE WHEN `presion`=1 THEN 1 ELSE 0 END) Si, SUM(CASE WHEN `presion`=0 THEN 1 ELSE 0 END) NO FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presion = $q->fetchAll();
			$presion = $presion[0];
		}
	} elseif ( isset( $_GET['presionsi'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifra_ps`>=140 OR `cifra_ps`<=49) or (`cifra_pd`>=90 OR `cifra_pd`<=59) THEN 1 ELSE 0 END) alto, SUM(CASE WHEN (`cifra_ps`<140 AND `cifra_ps`>49) AND (`cifra_pd`<90 AND `cifra_pd`>59) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presionsi = $q->fetchAll();
			$presionsi = $presionsi[0];
		}
	} elseif ( isset( $_GET['presiongenero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifra_ps`>=140 OR `cifra_ps`<=49) or (`cifra_pd`>=90 OR `cifra_pd`<=59) THEN 1 ELSE 0 END) alto, SUM(CASE WHEN (`cifra_ps`<140 AND `cifra_ps`>49) AND (`cifra_pd`<90 AND `cifra_pd`>59) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presionm = $q->fetchAll();
			$presionm = $presionm[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`cifra_ps`>=140 OR `cifra_ps`<=49) or (`cifra_pd`>=90 OR `cifra_pd`<=59) THEN 1 ELSE 0 END) alto, SUM(CASE WHEN (`cifra_ps`<140 AND `cifra_ps`>49) AND (`cifra_pd`<90 AND `cifra_pd`>59) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presionf = $q->fetchAll();
			$presionf = $presionf[0];
		}
	} elseif ( isset( $_GET['presionedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifra_ps`>=140 OR `cifra_ps`<=49) or (`cifra_pd`>=90 OR `cifra_pd`<=59))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presionea = $q->fetchAll();
			$presionea = $presionea[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifra_ps`<140 AND `cifra_ps`>49) AND (`cifra_pd`<90 AND `cifra_pd`>59))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$presioneb = $q->fetchAll();
			$presioneb = $presioneb[0];
		}
	} elseif ( isset( $_GET['glucosa'] ) ) {
		$sql = "SELECT SUM(CASE WHEN `glucosa`=1 THEN 1 ELSE 0 END) Si, SUM(CASE WHEN `glucosa`=0 THEN 1 ELSE 0 END) NO FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosa = $q->fetchAll();
			$glucosa = $glucosa[0];
		}
	} elseif ( isset( $_GET['glucosasi'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifraglucosa`>=126 OR `cifraglucosa`<=69) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifraglucosa`<126 AND `cifraglucosa`>100) THEN 1 ELSE 0 END) medio, SUM(CASE WHEN (`cifraglucosa`<=100 AND `cifraglucosa`>69) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosasi = $q->fetchAll();
			$glucosasi = $glucosasi[0];
		}
	} elseif ( isset( $_GET['glucosagenero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifraglucosa`>=126 OR `cifraglucosa`<=69) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifraglucosa`<126 AND `cifraglucosa`>100) THEN 1 ELSE 0 END) medio, SUM(CASE WHEN (`cifraglucosa`<=100 AND `cifraglucosa`>69) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosam = $q->fetchAll();
			$glucosam = $glucosam[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`cifraglucosa`>=126 OR `cifraglucosa`<=69) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifraglucosa`<126 AND `cifraglucosa`>100) THEN 1 ELSE 0 END) medio, SUM(CASE WHEN (`cifraglucosa`<=100 AND `cifraglucosa`>69) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosaf = $q->fetchAll();
			$glucosaf = $glucosaf[0];
		}
	} elseif ( isset( $_GET['glucosaedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifraglucosa`>=126 OR `cifraglucosa`<=69))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosaea = $q->fetchAll();
			$glucosaea = $glucosaea[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifraglucosa`<126 AND `cifraglucosa`>100))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosaem = $q->fetchAll();
			$glucosaem = $glucosaem[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifraglucosa`<=100 AND `cifraglucosa`>69))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$glucosaeb = $q->fetchAll();
			$glucosaeb = $glucosaeb[0];
		}
	} elseif ( isset( $_GET['trigliceridos'] ) ) {
		$sql = "SELECT SUM(CASE WHEN `trigliceridos`=1 THEN 1 ELSE 0 END) Si, SUM(CASE WHEN `trigliceridos`=0 THEN 1 ELSE 0 END) NO FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$tri = $q->fetchAll();
			$tri = $tri[0];
		}
	} elseif ( isset( $_GET['trigliceridossi'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifratrigliceridos`>=200 OR `cifratrigliceridos`<=49) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifratrigliceridos`<200 AND `cifratrigliceridos`>49) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$trisi = $q->fetchAll();
			$trisi = $trisi[0];
		}
	} elseif ( isset( $_GET['trigliceridosgenero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`cifratrigliceridos`>=200 OR `cifratrigliceridos`<=49) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifratrigliceridos`<200 AND `cifratrigliceridos`>49) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$trim = $q->fetchAll();
			$trim = $trim[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`cifratrigliceridos`>=200 OR `cifratrigliceridos`<=49) THEN 1 ELSE 0 END) alto,SUM(CASE WHEN (`cifratrigliceridos`<200 AND `cifratrigliceridos`>49) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$trif = $q->fetchAll();
			$trif = $trif[0];
		}
	} elseif ( isset( $_GET['trigliceridosedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifratrigliceridos`>=200 OR `cifratrigliceridos`<=49))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$triea = $q->fetchAll();
			$triea = $triea[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>=50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`cifratrigliceridos`<200 AND `cifratrigliceridos`>49))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$trieb = $q->fetchAll();
			$trieb = $trieb[0];
		}
	} elseif ( isset( $_GET['indicemasa'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`imc`>=25) THEN 1 ELSE 0 END) sobrepeso,SUM(CASE WHEN (`imc`<25 AND `imc`>=19) THEN 1 ELSE 0 END) saludable, SUM(CASE WHEN (`imc`<19) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masa = $q->fetchAll();
			$masa = $masa[0];
		}
	} elseif ( isset( $_GET['indicemasagenero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`imc`>=25) THEN 1 ELSE 0 END) sobrepeso,SUM(CASE WHEN (`imc`<25 AND `imc`>=19) THEN 1 ELSE 0 END) saludable, SUM(CASE WHEN (`imc`<19) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masam = $q->fetchAll();
			$masam = $masam[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`imc`>=25) THEN 1 ELSE 0 END) sobrepeso,SUM(CASE WHEN (`imc`<25 AND `imc`>=19) THEN 1 ELSE 0 END) saludable, SUM(CASE WHEN (`imc`<19) THEN 1 ELSE 0 END) bajo FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masaf = $q->fetchAll();
			$masaf = $masaf[0];
		}
	} elseif ( isset( $_GET['indicemasaedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`imc`>=25))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masaea = $q->fetchAll();
			$masaea = $masaea[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`imc`<25 AND `imc`>=19))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masaem = $q->fetchAll();
			$masaem = $masaem[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`imc`<19))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$masaeb = $q->fetchAll();
			$masaeb = $masaeb[0];
		}
	} elseif ( isset( $_GET['circunferencia'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`ccintura`<=90) THEN 1 ELSE 0 END) Menor90 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circmb = $q->fetchAll();
			$circmb = $circmb[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`ccintura`>90) THEN 1 ELSE 0 END) Mas90 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circma = $q->fetchAll();
			$circma = $circma[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`ccintura`<=80) THEN 1 ELSE 0 END) Menor80 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circfb = $q->fetchAll();
			$circfb = $circfb[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`ccintura`>80) THEN 1 ELSE 0 END) Mas80 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circfa = $q->fetchAll();
			$circfa = $circfa[0];
		}
	} elseif ( isset( $_GET['circunferenciaedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`ccintura`<=90)) AND ui.genero='M'";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circemb = $q->fetchAll();
			$circemb = $circemb[0];
		}

		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`ccintura`>90)) AND ui.genero='M'";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circema = $q->fetchAll();
			$circema = $circema[0];
		}

		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`ccintura`<=80)) AND ui.genero='F'";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circefb = $q->fetchAll();
			$circefb = $circefb[0];
		}

		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`ccintura`>80)) AND ui.genero='F'";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$circefa = $q->fetchAll();
			$circefa = $circefa[0];
		}
	} elseif ( isset( $_GET['frutas'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`r_fruta`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_fruta`<7 AND `r_fruta`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_fruta`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutas = $q->fetchAll();
			$frutas = $frutas[0];
		}
	} elseif ( isset( $_GET['frutasgenero'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (`r_fruta`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_fruta`<7 AND `r_fruta`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_fruta`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutasm = $q->fetchAll();
			$frutasm = $frutasm[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`r_fruta`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_fruta`<7 AND `r_fruta`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_fruta`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutasf = $q->fetchAll();
			$frutasf = $frutasf[0];
		}
	} elseif ( isset( $_GET['frutasedad'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_fruta`<4))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutas1 = $q->fetchAll();
			$frutas1 = $frutas1[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_fruta`<7 AND `r_fruta`>=4))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutas2 = $q->fetchAll();
			$frutas2 = $frutas2[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_fruta`>7 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$frutas3 = $q->fetchAll();
			$frutas3 = $frutas3[0];
		}
	}elseif ( isset( $_GET['verduras'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (`r_verdura`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_verdura`<7 AND `r_verdura`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_verdura`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verduras = $q->fetchAll();
			$verduras = $verduras[0];
		}
} elseif ( isset( $_GET['verdurasgenero'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (`r_verdura`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_verdura`<7 AND `r_verdura`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_verdura`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verdurasm = $q->fetchAll();
			$verdurasm = $verdurasm[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`r_verdura`<4) THEN 1 ELSE 0 END) menora4,SUM(CASE WHEN (`r_verdura`<7 AND `r_verdura`>=4) THEN 1 ELSE 0 END) de4a7, SUM(CASE WHEN (`r_verdura`>7) THEN 1 ELSE 0 END) mayora7 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verdurasf = $q->fetchAll();
			$verdurasf = $verdurasf[0];
		}
} elseif ( isset( $_GET['verdurasedad'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_verdura`<4))";
		
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verduras1 = $q->fetchAll();
			$verduras1 = $verduras1[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_verdura`<7 AND `r_verdura`>=4))";
		
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verduras2 = $q->fetchAll();
			$verduras2 = $verduras2[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`r_verdura`>7 ))";
		
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$verduras3 = $q->fetchAll();
			$verduras3 = $verduras3[0];
		}
}
elseif ( isset( $_GET['capeados'] ) ) {
	
$sql = "SELECT SUM(CASE WHEN (`f_empanizado`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_empanizado`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_empanizado`=3) THEN 1 ELSE 0 END) o3, SUM(CASE WHEN (`f_empanizado`=4) THEN 1 ELSE 0 END) o4, SUM(CASE WHEN (`f_empanizado`=5) THEN 1 ELSE 0 END) o5 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados = $q->fetchAll();
			$capeados = $capeados[0];
		}

} elseif ( isset( $_GET['capeadosgenero'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (`f_empanizado`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_empanizado`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_empanizado`=3) THEN 1 ELSE 0 END) o3, SUM(CASE WHEN (`f_empanizado`=4) THEN 1 ELSE 0 END) o4, SUM(CASE WHEN (`f_empanizado`=5) THEN 1 ELSE 0 END) o5 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeadosm = $q->fetchAll();
			$capeadosm = $capeadosm[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`f_empanizado`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_empanizado`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_empanizado`=3) THEN 1 ELSE 0 END) o3, SUM(CASE WHEN (`f_empanizado`=4) THEN 1 ELSE 0 END) o4, SUM(CASE WHEN (`f_empanizado`=5) THEN 1 ELSE 0 END) o5 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F'";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeadosf = $q->fetchAll();
			$capeadosf = $capeadosf[0];
		}
} elseif ( isset( $_GET['capeadosedad'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_empanizado`=1))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados1 = $q->fetchAll();
			$capeados1 = $capeados1[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_empanizado`=2))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados2 = $q->fetchAll();
			$capeados2 = $capeados2[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_empanizado`=3 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados3 = $q->fetchAll();
			$capeados3 = $capeados3[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_empanizado`=4 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados4 = $q->fetchAll();
			$capeados4 = $capeados4[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_empanizado`=5 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$capeados5 = $q->fetchAll();
			$capeados5 = $capeados5[0];
		}
}elseif ( isset( $_GET['sal'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (`f_sal`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_sal`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_sal`=3) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$sal = $q->fetchAll();
			$sal = $sal[0];
		}
} elseif ( isset( $_GET['salgenero'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (`f_sal`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_sal`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_sal`=3) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$salm = $q->fetchAll();
			$salm = $salm[0];
		}
		$sql = "SELECT SUM(CASE WHEN (`f_sal`=1) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`f_sal`=2) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN (`f_sal`=3) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$salf = $q->fetchAll();
			$salf = $salf[0];
		}
} elseif ( isset( $_GET['saledad'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_sal`=1))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$sal1 = $q->fetchAll();
			$sal1 = $sal1[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_sal`=2))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$sal2 = $q->fetchAll();
			$sal2 = $sal2[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`f_sal`=3 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$sal3 = $q->fetchAll();
			$sal3 = $sal3[0];
		}
} elseif ( isset( $_GET['estres'] ) ) {
	$sql = "SELECT SUM(CASE WHEN ((`nivel_estres`=1) or (`nivel_estres`=2)) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`nivel_estres`=3) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN ((`nivel_estres`=4) or (`nivel_estres`=5)) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estres = $q->fetchAll();
			$estres = $estres[0];
		}
} elseif ( isset( $_GET['estresgenero'] ) ) {
	$sql = "SELECT SUM(CASE WHEN ((`nivel_estres`=1) or (`nivel_estres`=2)) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`nivel_estres`=3) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN ((`nivel_estres`=4) or (`nivel_estres`=5)) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='M' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estresm = $q->fetchAll();
			$estresm = $estresm[0];
		}
		$sql = "SELECT SUM(CASE WHEN ((`nivel_estres`=1) or (`nivel_estres`=2)) THEN 1 ELSE 0 END) o1,SUM(CASE WHEN (`nivel_estres`=3) THEN 1 ELSE 0 END) o2, SUM(CASE WHEN ((`nivel_estres`=4) or (`nivel_estres`=5)) THEN 1 ELSE 0 END) o3 FROM wp_usersmedicalinfo mi join wp_usersinfo ui on mi.user_id=ui.user_id where ui.industria REGEXP '{$dato1}' and ui.trabajo REGEXP '{$dato2}' and genero='F' ";
		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estresf = $q->fetchAll();
			$estresf = $estresf[0];
		}
} elseif ( isset( $_GET['estresedad'] ) ) {
	$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`nivel_estres`>0 ) and(`nivel_estres`<3 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estres1 = $q->fetchAll();
			$estres1 = $estres1[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`nivel_estres`=3))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estres2 = $q->fetchAll();
			$estres2 = $estres2[0];
		}
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>20 AND YEAR(CURDATE())-`ui`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>30 AND YEAR(CURDATE())-`ui`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>40 AND YEAR(CURDATE())-`ui`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`ui`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo ui JOIN wp_usersmedicalinfo mi on ui.user_id=mi.user_id where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}' AND ((`nivel_estres`>3 ) and(`nivel_estres`<6 ))";

		$q = $conn->prepare( $sql );
		if ( $q->execute() ) {
			$estres3 = $q->fetchAll();
			$estres3 = $estres3[0];
		}
}

	$conn = null;
} catch ( PDOException $e ) {
	//header( "Location:" . site_url() . "/central-de-reportes/" );
	echo "ERROR: " . $e->getMessage();
	die();
}
if ( isset( $_GET['rangoedades'] ) ) {
	?>

	[{"name": "Rango de edades",
	"data":[<?php
	$count = 0;
	foreach ( $edades as $key => $edad ) {
		if ( is_string( $key ) ) {
			if ( empty( $edad ) )
				echo 0;
			else
				echo $edad;
			if ( $count < ((count( $edades ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
}elseif ( isset( $_GET['genero'] ) ) {
	?>

	[{"name": "Género",
	"data":[<?php
	$count = 0;
	foreach ( $genero as $key => $gen ) {
		if ( is_string( $key ) ) {
			if ( empty( $gen ) )
				echo 0;
			else
				echo $gen;
			if ( $count < ((count( $genero ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['localidades'] ) ) {
	?>[<?php
	$count = 0;
	foreach ( $localidadmixed as $key => $localidad ) {
		?>
		{"name": "<?php echo $key; ?>",
		"data":[<?php
		if ( is_string( $key ) ) {
			if ( empty( $localidad ) )
				echo 0;
			else
				echo $localidad;
		}
		?>]}<?php
		if ( $count < ((count( $localidadmixed )) - 1) )
			echo ",";
		$count++;
	}
	?>]
	<?php
} elseif ( isset( $_GET['area'] ) ) {
	?>[<?php
	$count = 0;
	foreach ( $areamixed as $key => $area ) {
		?>
		{"name": "<?php echo $key; ?>",
		"data":[<?php
		if ( is_string( $key ) ) {
			if ( empty( $area ) )
				echo 0;
			else
				echo $area;
		}
		?>]}<?php
		if ( $count < ((count( $areamixed )) - 1) )
			echo ",";
		$count++;
	}
	?>]
	<?php
} elseif ( isset( $_GET['presion'] ) ) {
	?>

	[{"name": "Presión",
	"data":[<?php
	$count = 0;
	foreach ( $presion as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presion ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['presionsi'] ) ) {
	?>

	[{"name": "Niveles de riesgo",
	"data":[<?php
	$count = 0;
	foreach ( $presionsi as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presionsi ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['presiongenero'] ) ) {
	?>

	[{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $presionf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presionf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $presionm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presionm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['presionedad'] ) ) {
	?>

	[{"name": "Alto",
	"data":[<?php
	$count = 0;
	foreach ( $presionea as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presionea ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Bajo",
	"data":[<?php
	$count = 0;
	foreach ( $presioneb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $presioneb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['glucosa'] ) ) {
	?>

	[{"name": "Glucosa",
	"data":[<?php
	$count = 0;
	foreach ( $glucosa as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosa ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['glucosasi'] ) ) {
	?>

	[{"name": "Nivel de riesgo",
	"data":[<?php
	$count = 0;
	foreach ( $glucosasi as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosasi ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['glucosagenero'] ) ) {
	?>

	[{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $glucosaf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosaf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $glucosam as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosam ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['glucosaedad'] ) ) {
	?>

	[{"name": "Riesgo alto",
	"data":[<?php
	$count = 0;
	foreach ( $glucosaea as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosaea ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Riesgo medio",
	"data":[<?php
	$count = 0;
	foreach ( $glucosaem as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosaem ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Riesgo bajo",
	"data":[<?php
	$count = 0;
	foreach ( $glucosaeb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $glucosaeb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['trigliceridos'] ) ) {
	?>

	[{"name": "Trigliceridos",
	"data":[<?php
	$count = 0;
	foreach ( $tri as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $tri ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['trigliceridossi'] ) ) {
	?>

	[{"name": "Nivel de riesgo",
	"data":[<?php
	$count = 0;
	foreach ( $trisi as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $trisi ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['trigliceridosgenero'] ) ) {
	?>

	[{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $trif as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $trif ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $trim as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $trim ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['trigliceridosedad'] ) ) {
	?>

	[{"name": "Alto",
	"data":[<?php
	$count = 0;
	foreach ( $triea as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $triea ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Bajo",
	"data":[<?php
	$count = 0;
	foreach ( $trieb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $trieb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['indicemasa'] ) ) {
	?>

	[{"name": "Nivel de riesgo",
	"data":[<?php
	$count = 0;
	foreach ( $masa as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masa ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['indicemasagenero'] ) ) {
	?>

	[{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $masaf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masaf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $masam as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masam ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['indicemasaedad'] ) ) {
	?>

	[{"name": "Sobre Peso",
	"data":[<?php
	$count = 0;
	foreach ( $masaea as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masaea ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Saludable",
	"data":[<?php
	$count = 0;
	foreach ( $masaem as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masaem ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Bajo end peso",
	"data":[<?php
	$count = 0;
	foreach ( $masaeb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $masaeb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['circunferencia'] ) ) {
	?>

	[{"name": "Menos de 90",
	"data":[<?php
	$count = 0;
	foreach ( $circmb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circemb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": " Más de 90",
	"data":[<?php
	$count = 0;
	foreach ( $circma as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circma ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Más de 80",
	"data":[null,<?php
	$count = 0;
	foreach ( $circfa as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circfa ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Menos de 80",
	"data":[null,<?php
	$count = 0;
	foreach ( $circfb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circfb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['circunferenciaedad'] ) ) {
	?>

	[{"name": "Hombres <=90",
	"data":[<?php
	$count = 0;
	foreach ( $circemb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circemb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres >90",
	"data":[<?php
	$count = 0;
	foreach ( $circema as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circema ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres >80",
	"data":[<?php
	$count = 0;
	foreach ( $circefa as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circefa ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres <=80",
	"data":[<?php
	$count = 0;
	foreach ( $circefb as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $circefb ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['frutas'] ) ) {
	?>

	[{"name": "Raciones",
	"data":[<?php
	$count = 0;
	foreach ( $frutas as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutas ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['frutasgenero'] ) ) {
	?>

	[{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $frutasm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutasm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $frutasf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutasf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['frutasedad'] ) ) {
	?>

	[{"name": "Menor a 4",
	"data":[<?php
	$count = 0;
	foreach ( $frutas1 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutas1 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "De 4 a 7",
	"data":[<?php
	$count = 0;
	foreach ( $frutas2 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutas2 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mayor a 7",
	"data":[<?php
	$count = 0;
	foreach ( $frutas3 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $frutas3 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['verduras'] ) ) {
	?>

	[{"name": "Raciones",
	"data":[<?php
	$count = 0;
	foreach ( $verduras as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verduras ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['verdurasgenero'] ) ) {
	?>

	[{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $verdurasm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verdurasm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $verdurasf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verdurasf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['verdurasedad'] ) ) {
	?>

	[{"name": "Menor a 4",
	"data":[<?php
	$count = 0;
	foreach ( $verduras1 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verduras1 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "De 4 a 7",
	"data":[<?php
	$count = 0;
	foreach ( $verduras2 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verduras2 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mayor a 7",
	"data":[<?php
	$count = 0;
	foreach ( $verduras3 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $verduras3 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['capeados'] ) ) {
	?>

	[{"name": "Frecuencia",
	"data":[<?php
	$count = 0;
	foreach ( $capeados as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['capeadosgenero'] ) ) {
	?>

	[{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $capeadosf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeadosf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $capeadosm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeadosm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['capeadosedad'] ) ) {
	?>

	[{"name": "Todos los días",
	"data":[<?php
	$count = 0;
	foreach ( $capeados1 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados1 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Más de 3 veces a la semana",
	"data":[<?php
	$count = 0;
	foreach ( $capeados2 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados2 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "2 a 3 veces a la semana",
	"data":[<?php
	$count = 0;
	foreach ( $capeados3 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados3 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Ocasionalmente",
	"data":[<?php
	$count = 0;
	foreach ( $capeados4 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados4 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Nunca",
	"data":[<?php
	$count = 0;
	foreach ( $capeados5 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $capeados5 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['sal'] ) ) {
	?>

	[{"name": "Uso de sal",
	"data":[<?php
	$count = 0;
	foreach ( $sal as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $sal ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['salgenero'] ) ) {
	?>

	[{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $salm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $salm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $salf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $salf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['saledad'] ) ) {
	?>

	[{"name": "Si",
	"data":[<?php
	$count = 0;
	foreach ( $sal1 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $sal1 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Ocasionalmente",
	"data":[<?php
	$count = 0;
	foreach ( $sal2 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $sal2 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Nunca",
	"data":[<?php
	$count = 0;
	foreach ( $sal3 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $sal3 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['estres'] ) ) {
	?>

	[{"name": "Nivel de estres",
	"data":[<?php
	$count = 0;
	foreach ( $estres as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estres ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['estresgenero'] ) ) {
	?>

	[{"name": "Hombres",
	"data":[<?php
	$count = 0;
	foreach ( $estresm as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estresm ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Mujeres",
	"data":[<?php
	$count = 0;
	foreach ( $estresf as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estresf ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
} elseif ( isset( $_GET['estresedad'] ) ) {
	?>

	[{"name": "Nivel 1 y 2",
	"data":[<?php
	$count = 0;
	foreach ( $estres1 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estres1 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Nivel 3",
	"data":[<?php
	$count = 0;
	foreach ( $estres2 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estres2 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]},{"name": "Nivel 4 y 5",
	"data":[<?php
	$count = 0;
	foreach ( $estres3 as $key => $pres ) {
		if ( is_string( $key ) ) {
			if ( empty( $pres ) )
				echo 0;
			else
				echo $pres;
			if ( $count < ((count( $estres3 ) / 2) - 1) )
				echo ",";
			$count++;
		}
	}
	?>]}]
	<?php
}
?>