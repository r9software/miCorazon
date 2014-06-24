<?php
/*
 * @package micorazon
  Template Name: Historial
 */
$bandera = false;

function compararFechas($hoy,$fecha){
$hoy=  explode("-",$hoy);
$fecha= explode("-", $fecha);
$hoy2=mktime(0,0,0,$hoy[1],$hoy[2],$hoy[0]);
$fecha2=mktime(0,0,0,$fecha[1],$fecha[2],$fecha[0]);
if($hoy2<=$fecha2)
{
    //echo"Hoy: ".$hoy[1]."-".$hoy[2]."-".$hoy[0]." es menor o igual que"
	//		.$fecha[1]."-".$fecha[2]."-".$fecha[0]."</br>";
	return true;
}
else
{
     //echo"Hoy: ".$hoy[1]."-".$hoy[2]."-".$hoy[0]." es mayor"
	//		 . ""
	//		.$fecha[1]."-".$fecha[2]."-".$fecha[0]."</br>";
	return false;
	
} 
}

function diaSemana( $fecha ) {
	$valores = explode( "-", $fecha );
	$ano = $valores[0];
	$mes = $valores[1];
	$dia = $valores[2];
	// 0->domingo	 | 6->sabado
	$dia = date( "w", mktime( 0, 0, 0, $mes, $dia, $ano ) );
	return $dia;
}

function operacion_fecha( $fecha, $dias ) {
	list ($ano, $mes, $dia) = explode( "-", $fecha );
	if ( !checkdate( $mes, $dia, $ano ) ) {
		return false;
	}
	$dia = $dia + $dias;
	$fecha = date( "Y-m-d", mktime( 0, 0, 0, $mes, $dia, $ano ) );
	return $fecha;
}

function getdia( $var ) {
	switch ( $var ) {
		case 1: return "Lunes";
			break;
		case 2: return "Martes";
			break;
		case 3: return "Mi&eacute;rcoles";
			break;
		case 4: return "Jueves";
			break;
		case 5: return "Viernes";
			break;
		case 6: return "S&aacute;bado";
			break;
		case 0: return "Domingo";
			break;
	}
}

function getmes( $var ) {
	switch ( $var ) {
		case "01": return "Enero";
			break;
		case "02": return "Febrero";
			break;
		case "03": return "Marzo";
			break;
		case "04": return "Abril";
			break;
		case "05": return "Mayo";
			break;
		case "06": return "Junio";
			break;
		case "07": return "Julio";
			break;
		case "08": return "Agosto";
			break;
		case "09": return "Septiembre";
			break;
		case "10": return "Octubre";
			break;
		case "11": return "Noviembre";
			break;
		case "12": return "Diciembre";
			break;
	}
}

$current_user = wp_get_current_user();
$id = $current_user->ID;
if ( isset( $_GET['fecha'] ) ) {
	$fechaget = explode( "-",$_GET['fecha']);
	if ( count( $fechaget ) > 0 ) {
		$month=$fechaget[1];
		$day=$fechaget[2];
		$year=$fechaget[0];
		if ( checkdate( $month, $day, $year ) ) {
			$fecha_actual=$_GET['fecha'];
			//echo "fecha valida ".$fecha_actual;
			
			$bandera=true;
		} else {
			//echo "No es fecha valida";
			$fecha_actual = date( "Y-m-d" );
		}
	} else {
		//echo "no tiene formato valido";
		$fecha_actual = date( "Y-m-d" );
	}
} else {
	//echo "Es el dia de hoy";
	
	$fecha_actual = date( "Y-m-d" );
}

$lunes;
$domingo;

//echo operacion_fecha( "2014-06-19", 1);
//echo date($fecha_actual, strtotime("+1 day"))." "; 
$semana;


$diaSemana = diaSemana( $fecha_actual );
switch ( $diaSemana ) {
	case 1:
		$var = explode( "-", $fecha_actual );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 6 ) . " ";
		$lunes = $fecha_actual;
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
	case 2:
		$var = explode( "-", operacion_fecha( $fecha_actual, -1 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 5 ) . " ";
		$lunes = operacion_fecha( $fecha_actual, -1 );
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}

		break;
	case 3:
		$var = explode( "-", operacion_fecha( $fecha_actual, -2 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 4 ) . " ";
		$lunes = operacion_fecha( $fecha_actual, -2 );
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
	case 4:
		$var = explode( "-", operacion_fecha( $fecha_actual, -3 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 3 ) . " ";
		$lunes = operacion_fecha( $fecha_actual, -3 );
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
	case 5:
		$var = explode( "-", operacion_fecha( $fecha_actual, -4 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 2 ) . " ";
		$lunes = operacion_fecha( $fecha_actual, -4 );
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
	case 6:
		$var = explode( "-", operacion_fecha( $fecha_actual, -5 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$dif = operacion_fecha( $fecha_actual, 1 ) . " ";
		$lunes = operacion_fecha( $fecha_actual, -5 );
		$domingo = $dif;
		$varf = explode( "-", $dif );
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
	case 0:
		$var = explode( "-", operacion_fecha( $fecha_actual, -6 ) );
		$isemana = $var[2];
		$mesi = getmes( $var[1] );
		$varf = explode( "-", $fecha_actual );
		$lunes = operacion_fecha( $fecha_actual, -6 );
		$domingo = $fecha_actual;
		$fsemana = $varf[2];
		$mesf = getmes( $varf[1] );
		if ( $mesi == $mesf ) {
			$semana = "Semana del " . $isemana . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		} else {
			$semana = "Semana del " . $isemana . " de " . $mesf . " al " . $fsemana . " de " . $mesf . " de " . $varf[0];
		}
		break;
}
$fechaanterior=operacion_fecha( $domingo, -7 );
	$hoy=date( "Y-m-d" );
	$fechasiguiente=operacion_fecha( $domingo, 7 );
	if(compararFechas($hoy,$domingo)){
		$bandera= false;
	}
try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$sql = "Select * from wp_usersactivity where user_id={$id} and fecha between '{$lunes}' AND '{$domingo}' ";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	$pretabla = array();
	$tabla = array();
	if ( isset( $rs2[0]['user_id'] ) ) {
		$tv = $rs2;
		$dias = count( $tv );
		$diasyacargados = "";
		foreach ( $tv as $row ) {

			array_push( $row, getdia( diasemana( $row["fecha"] ) ) );
			$diasyacargados = $diasyacargados . "-" . $row[5];
			array_push( $pretabla, $row );
		}
		//echo $diasyacargados;
		$d = explode( "-", $diasyacargados );

		if ( $dias == 7 ) {
			$tabla = $pretabla;
		}if ( $dias == 0 ) {
			$columnaVacia = array( 43, 0, 0, 0," ", "Lunes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Martes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0," ", "Mi&eacute;rcoles" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Jueves" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Viernes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","S&aacute;bado" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Domingo" );
			array_push( $tabla, $columnaVacia );
		} else {

			$bc = 1;
			if ( strcmp( $d[$bc], "Lunes" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Lunes" );
				array_push( $tabla, $columnaVacia );
			}
			if ( strcmp( $d[$bc], "Martes" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Martes" );
				array_push( $tabla, $columnaVacia );
			}
			if ( strcmp( $d[$bc], "Mi&eacute;rcoles" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Mi&eacute;rcoles" );
				array_push( $tabla, $columnaVacia );
			}
			if ( strcmp( $d[$bc], "Jueves" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Jueves" );
				array_push( $tabla, $columnaVacia );
			}

			if ( strcmp( $d[$bc], "Viernes" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Viernes" );
				array_push( $tabla, $columnaVacia );
			}

			if ( strcmp( $d[$bc], "S&aacute;bado" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "S&aacute;bado" );
				array_push( $tabla, $columnaVacia );
			}

			if ( strcmp( $d[$bc], "Domingo" ) == 0 ) {
				array_push( $tabla, $pretabla[$bc - 1] );
				$bc++;
			} else {
				$columnaVacia = array( 43, 0, 0, 0, " ", "Domingo" );
				array_push( $tabla, $columnaVacia );
			}
		}
		/*
		  echo "<pre>";
		  print_r( $tabla );
		  echo "</pre>";
		 * */
	} else {
		$tabla = array();
		$columnaVacia = array( 43, 0, 0, 0, " ","Lunes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Martes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Mi&eacute;rcoles" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Jueves" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Viernes" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","S&aacute;bado" );
			array_push( $tabla, $columnaVacia );
			$columnaVacia = array( 43, 0, 0, 0, " ","Domingo" );
			array_push( $tabla, $columnaVacia );
		$sql = "INSERT IGNORE INTO wp_usersactivity (user_id,actividad1,actividad2,actividad3,fecha"
				. ") "
				. "VALUES (:user_id,0,0,0,CURDATE())";
		$q = $conn->prepare( $sql );
		if ( $q->execute( array( ':user_id' => $id
				) ) ) {
			
		}
	}
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
<?php get_header(); ?>
<div class="content">
	<div <?php post_class( 'post' ); ?>>
		<div class="cont-t">
			<h3 class="semana"><?php echo $semana; ?></h3>
            <h1 class="histo"><?php the_title(); ?></h1>
		</div>

		<table border="0" class="historial">
			<thead>
				<tr>
					<th>Día</th>
					<th class="comi">Comí 5 raciones</th>
					<th class="movi">Me moví 10 minutos</th>
					<th class="dormi">Dormí 8 horas</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ( $tabla as $row ) {
					echo "<tr>";
					echo "<td>{$row[5]}</td>";
					if ( $row[1] ) {
						echo "<td class='center'><span class='ok'></span></td>";
					} else if ( !$row[1] ) {
						echo "<td class='center'><span class='no'></span></td>";
					}
					if ( $row[2] ) {
						echo "<td class='center'><span class='ok'></span></td>";
					} else if ( !$row[2] ) {
						echo "<td class='center'><span class='no'></span></td>";
					}
					if ( $row[3] ) {
						echo "<td class='center'><span class='ok'></span></td>";
					} else if ( !$row[3] ) {
						echo "<td class='center'><span class='no'></span></td>";
					}
					echo "</tr>";
				}
				?> 
				<!--
				<tr>
					<td>Martes</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				<tr>
					<td>Mi&eacute;rcoles</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				<tr>
					<td>Jueves</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				<tr>
					<td>Viernes</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				<tr>
					<td>S&aacute;bado</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				<tr>
					<td>Domingo</td>
					<td class="center"><span class="ok"></span></td>
					<td class="center"><span class="no"></span></td>
					<td class="center"><span class="ok"></span></td>
				</tr>
				-->
			</tbody>
		</table>
		<div class="semanas">
			<a href="<?php echo site_url()."/historial-de-registro-hoy?fecha={$fechaanterior}" ?>" class="prev">Semana anterior</a>
		 <?php if($bandera){ ?>
			<a href="<?php echo site_url()."/historial-de-registro-hoy/" ?>" class="prev">Regresar a mi registro de hoy</a>
			<a href="<?php echo site_url()."/historial-de-registro-hoy?fecha={$fechasiguiente}" ?>" class="next">Semana siguiente</a>
			
		 <?php } ?>
		</div>

	</div>
</div>
</div><!--main-->
<?php get_sidebar(); ?>
<div class="clear"></div>
</div><!--page-->
<?php get_footer(); ?>