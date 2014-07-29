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
 * 
 * 
 * 
 *  */
$edades = array();
$genero = array();
$localidadmixed = array();
$areamixed = array();
$dato1 = "[:alnum:]";
$dato2 = "[:alnum:]";
if ( isset( $_GET['dato1'] ) && strcmp( $_GET['dato1'], "todos" ) != 0 ) {
	$dato1 = "[[:<:]]" . $_GET['dato1'] . "[[:>:]]";
}
if ( isset( $_GET['dato2'] ) && strcmp( $_GET['dato2'], "todos" ) != 0 ) {
	$dato2 = "[[:>:]]" . $_GET['dato2'] . "[[:>:]]";
}

try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	if ( isset( $_GET['rangoedades'] ) ) {
		$sql = "SELECT SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`<20) THEN 1 ELSE 0 END) menor20, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>20 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<30) THEN 1 ELSE 0 END) de20a30, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>30 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<40) THEN 1 ELSE 0 END) de30a40, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>40 AND YEAR(CURDATE())-`wp_usersinfo`.`ano`<50) THEN 1 ELSE 0 END) de40a50, SUM(CASE WHEN (YEAR(CURDATE())-`wp_usersinfo`.`ano`>50) THEN 1 ELSE 0 END) mas50  FROM wp_usersinfo where industria REGEXP '{$dato1}' and trabajo REGEXP '{$dato2}'";

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

	[{"name": "Genero",
	"data":[<?php
	$count = 0;
	foreach ( $genero as $key => $gen ) {
		if ( is_string( $key ) ) {
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
	
} elseif ( isset( $_GET['presionsi'] ) ) {
	
} elseif ( isset( $_GET['presiongenero'] ) ) {
	
} elseif ( isset( $_GET['presionedad'] ) ) {
	
} elseif ( isset( $_GET['glucosa'] ) ) {
	
} elseif ( isset( $_GET['glucosasi'] ) ) {
	
} elseif ( isset( $_GET['glucosagenero'] ) ) {
	
} elseif ( isset( $_GET['glucosaedad'] ) ) {
	
} elseif ( isset( $_GET['trigliceridos'] ) ) {
	
} elseif ( isset( $_GET['trigliceridossi'] ) ) {
	
} elseif ( isset( $_GET['trigliceridosgenero'] ) ) {
	
} elseif ( isset( $_GET['trigliceridosedad'] ) ) {
	
} elseif ( isset( $_GET['indicemasa'] ) ) {
	
} elseif ( isset( $_GET['indicemasagenero'] ) ) {
	
} elseif ( isset( $_GET['indicemasaedad'] ) ) {
	
} elseif ( isset( $_GET['circunferencia'] ) ) {
	
} elseif ( isset( $_GET['circunferenciagenero'] ) ) {
	
} elseif ( isset( $_GET['circunferenciaedad'] ) ) {
	
} elseif ( isset( $_GET['frutas'] ) ) {
	
} elseif ( isset( $_GET['frutasgenero'] ) ) {
	
} elseif ( isset( $_GET['frutasedad'] ) ) {
	
} elseif ( isset( $_GET['verduras'] ) ) {
	
} elseif ( isset( $_GET['verdurasgenero'] ) ) {
	
} elseif ( isset( $_GET['verdurasedad'] ) ) {
	
} elseif ( isset( $_GET['capeados'] ) ) {
	
} elseif ( isset( $_GET['capeadosgenero'] ) ) {
	
} elseif ( isset( $_GET['capeadosedad'] ) ) {
	
} elseif ( isset( $_GET['sal'] ) ) {
	
} elseif ( isset( $_GET['salgenero'] ) ) {
	
} elseif ( isset( $_GET['saledad'] ) ) {
	
} elseif ( isset( $_GET['estres'] ) ) {
	
} elseif ( isset( $_GET['estresgenero'] ) ) {
	
} elseif ( isset( $_GET['estresedad'] ) ) {
	
}
?>