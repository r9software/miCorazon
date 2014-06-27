<?php
/*
 * @package micorazon
  Template Name: Actividad
 * 
 * 
 * Con pleno uso de mis facultades mentales, admito que el codigo descrito acontinuacion y en este sistema fue hardcodeado (cualquier aclaracion o duda, o queja acerca del codigo, dont mind!) a peticion de mi project manager, jefe y el cliente XDDDDDDDDDDD
 */
$bandera = false;
$current_user = wp_get_current_user();
$id = $current_user->ID;

function compararFechas( $hoy, $fecha ) {
	$hoy = explode( "-", $hoy );
	$fecha = explode( "-", $fecha );
	$hoy2 = mktime( 0, 0, 0, $hoy[1], $hoy[2], $hoy[0] );
	$fecha2 = mktime( 0, 0, 0, $fecha[1], $fecha[2], $fecha[0] );
	if ( $hoy2 <= $fecha2 ) {
		//echo"Hoy: ".$hoy[1]."-".$hoy[2]."-".$hoy[0]." es menor o igual que"
		//		.$fecha[1]."-".$fecha[2]."-".$fecha[0]."</br>";
		return true;
	} else {
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
	$fechaget = explode( "-", $_GET['fecha'] );
	if ( count( $fechaget ) > 0 ) {
		$month = $fechaget[1];
		$day = $fechaget[2];
		$year = $fechaget[0];
		if ( checkdate( $month, $day, $year ) ) {
			$fecha_actual = $_GET['fecha'];
			//echo "fecha valida ".$fecha_actual;

			$bandera = true;
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
$fechaanterior = operacion_fecha( $domingo, -7 );
$hoy = date( "Y-m-d" );
$fechasiguiente = operacion_fecha( $domingo, 7 );
if ( compararFechas( $hoy, $domingo ) ) {
	$bandera = false;
	$diaSemana=diaSemana( date( "Y-m-d" ) );
	
}
$tabla = array();
try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "Select * from wp_usersregistroaerobicos where user_id={$id} and fechaini='{$lunes}' and fechafin='{$domingo}'  LIMIT 1;";
	/*
	  . "Select * from wp_usersregistroestiramiento where user_id={$id} and fechaini>= CURDATE() and fechafin<=CURDATE()  LIMIT 1;"
	  . "Select * from wp_usersregistrofuerza where user_id={$id} and fechaini>= CURDATE() and fechafin<=CURDATE()  LIMIT 1;";
	 * */
	
	$rs = $conn->prepare( $sql );
	$rs->execute();

	$rs2 = $rs->fetchAll();

	if ( isset( $rs2[0]['user_id'] ) ) {
		array_push( $tabla, $rs2[0] );
		$sql = "Select * from wp_usersregistroestiramiento where user_id={$id} and fechaini='{$lunes}' and fechafin='{$domingo}'  LIMIT 1;";
		$rs = $conn->prepare( $sql );
		$rs->execute();
		$rs3 = $rs->fetchAll();
		array_push( $tabla, $rs3[0] );
		$sql = "Select * from wp_usersregistrofuerza where user_id={$id} and fechaini='{$lunes}' and fechafin='{$domingo}' LIMIT 1;";
		$rs = $conn->prepare( $sql );
		$rs->execute();
		$rs4 = $rs->fetchAll();
		array_push( $tabla, $rs4[0] );
	} else {
		if ( !$bandera ) {
			$sql = " INSERT IGNORE INTO wp_usersregistroaerobicos(`user_id`, `lunes`, `martes`, `miercoles`, `jueves`,`viernes`, `sabado`, `domingo`, `fechaini`, `fechafin`) 
			VALUES ({$id},0,0,0,0,0,0,0,'{$lunes}','{$domingo}');"
					. " INSERT IGNORE INTO wp_usersregistroestiramiento(`user_id`, `lunes`, `martes`, `miercoles`, `jueves`,`viernes`, `sabado`, `domingo`, `fechaini`, `fechafin`) 
			VALUES ({$id},0,0,0,0,0,0,0,'{$lunes}','{$domingo}');"
					. " INSERT IGNORE INTO wp_usersregistrofuerza(`user_id`, `lunes`, `martes`, `miercoles`, `jueves`,`viernes`, `sabado`, `domingo`, `fechaini`, `fechafin`) 
			VALUES ({$id},0,0,0,0,0,0,0,'{$lunes}','{$domingo}');";
			$q = $conn->prepare( $sql );
			$q->execute();
		}
		$tabla = array( array( $id, 0, 0, 0, 0, 0, 0, 0, $lunes, $domingo ), array( $id, 0, 0, 0, 0, 0, 0, 0, $lunes, $domingo ), array( $id, 0, 0, 0, 0, 0, 0, 0, $lunes, $domingo ) );
		//echo $sql;
	}
	$conn = null;
} catch ( PDOException $e ) {
	//echo "".$e->getMessage();
//header( "Location:" . site_url() . "/login/" );
	die();
}


//echo "<pre>";
//print_r($tabla);
//echo "</pre>";
?>

<?php get_header(); ?>
<div class="aviso1" id="aviso5">
	<a href="#" class="close"></a>
	<p>Si conoces tus cifras, los campos no pueden estar vacios.</p>
</div>
<div class="aviso1" id="aviso6">
	<a href="#" class="close"></a>
	<p>Solo puedes ingresar valores numéricos.</p>
</div>
<div class="aviso2" id="tabla1">
	<a href="#" class="close"></a>
	<h2>Conoce las porciones por raci&oacute;n</h2>
	<table border="0" width="100%">
		<thead>
			<tr>
				<th>Grupo de alimentos</th>
				<th>Tamaño promedio de la raci&oacute;n</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td><strong>Verduras</strong></td>
				<td>2 tazas de hojas (como lechuga o espinacas) o una taza de s&oacute;lido (como zanahorias)</td>

			</tr>
			<tr>
				<td><strong>Frutas</strong></td>
				<td>1/2 taza rebanada o una pieza mediana (por ejemplo, una manzana)</td>

			</tr>
			<tr>
				<td><strong>Carbohidratos</strong></td>
				<td>1/2 taza de granos (como avena, trigo o linaza) o una rebanada de pan</td>

			</tr>
			<tr>
				<td><strong>Prote&iacute;nas y l&aacute;cteos</strong></td>
				<td>1/2 taza de frijoles, 90 g de pescado, 1 taza de leche descremada, 45 a 60 g de carne o de queso</td>

			</tr>
			<tr>
				<td><strong>Grasas</strong></td>
				<td>1cdta de aceite o 2 cdas de nueces</td>

			</tr>
			<tr>
				<td><strong>Dulces</strong></td>
				<td>1 cdta de az&uacute;car o 177 ml de refresco con azúcar</td>

			</tr>
		</tbody>
	</table>

</div>
<div class="content">

	<div <?php post_class( 'post' ); ?>>
		<select class="actividades-select">
			<option>Actividades</option>
			<option value="../../actividad/registro-de-actividad-fisica/">Registro de actividad fisica</option>
			<option value="../../actividad/registro-de-peso-y-alimentacion/">Registro de peso y alimentaci&oacute;n</option>
			<option value="../../actividad/duerme-bien/">Diario de sueño</option>
		</select>
		<h1><?php the_title(); ?></h1>
		<?php if ( isset( $_GET['guardado'] ) ) { ?>

			<h2>Datos Guardados</h2>
		<?php } ?>
		<p><?php echo $post->post_content; ?></p>
		<?php if ( is_single( 462 ) ) { ?>

			<!--START ACTIVIDAD FISICA-->
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Actividades</a></li>
					<li><a href="#tabs-2">Instrucciones</a></li>
				</ul>
				<div id="tabs-1" class="tab-content">
					<h3><?php echo $semana; ?></h3>
					<div class="cont-margin">
						<?php if ( !$bandera ) { ?>
							<table border="0"  class="actividad1">
								<tbody>
									<tr>
										<td>Día de la semana</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_aero.png" class="ico">Aeróbicos</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_est.png" class="ico">Estiramiento</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_fue.png" class="ico">Fuerza</td>
										<td class="highlight1"><span>Tiempo total</span></td>
									</tr>
								<form action="<?php echo site_url() . "/actividades-dao" ?>" id="formsa" method="post">

									<tr>
										<td>Lunes</td>
										<td><input type="text" name="lun-aero" id="lun-aero" maxlength="4" value="<?php echo $tabla[0][1]; ?>"  class="int-num"></td>
										<td><input type="text" name="lun-est" id="lun-est" maxlength="4" value="<?php echo $tabla[1][1]; ?>" class="int-num"></td>
										<td><input type="text" name="lun-fue" id="lun-fue" maxlength="4" value="<?php echo $tabla[2][1]; ?>" class="int-num"></td>
										<td class="highlight2" id="lun-tot"><?php echo $lunto = $tabla[0][1] + $tabla[1][1] + $tabla[2][1]; ?></td>
									</tr>

									<tr>
										<td>Martes</td>
										<td><input type="text" name="mar-aero" id="mar-aero" maxlength="4" value="<?php echo $tabla[0][2]; ?>" <?php
											if ( $diaSemana < 2 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="mar-est" id="mar-est" maxlength="4" value="<?php echo $tabla[1][2]; ?>" <?php
											if ( $diaSemana < 2 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="mar-fue" id="mar-fue" maxlength="4" value="<?php echo $tabla[2][2]; ?>" <?php
											if ( $diaSemana < 2 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td class="highlight1" id="mar-tot"><?php echo $marto = $tabla[0][2] + $tabla[1][2] + $tabla[2][2]; ?></td>
									</tr>
									<tr>
										<td>Miércoles</td>
										<td><input type="text" name="mier-aero" maxlength="4" value="<?php echo $tabla[0][3]; ?>" id="mier-aero" <?php
											if ( $diaSemana < 3 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="mier-est" maxlength="4" value="<?php echo $tabla[1][3]; ?>" id="mier-est" <?php
											if ( $diaSemana < 3 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="mier-fue" maxlength="4"  value="<?php echo $tabla[2][3]; ?>" id="mier-fue" <?php
											if ( $diaSemana < 3 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td class="highlight2" id="mier-tot"><?php echo $mierto = $tabla[0][3] + $tabla[1][3] + $tabla[2][3]; ?></td>
									</tr>
									<tr>
										<td>Jueves</td>
										<td><input type="text" name="jue-aero" id="jue-aero" value="<?php echo $tabla[0][4]; ?>" maxlength="4" <?php
											if ( $diaSemana < 4 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="jue-est" id="jue-est" value="<?php echo $tabla[1][4]; ?>" maxlength="4" <?php
											if ( $diaSemana < 4 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="jue-fue" id="jue-fue" value="<?php echo $tabla[2][4]; ?>" maxlength="4" <?php
											if ( $diaSemana < 4 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td class="highlight1" id="jue-tot"><?php echo $jueto = $tabla[0][4] + $tabla[1][4] + $tabla[2][4]; ?></td>
									</tr>
									<tr>
										<td>Viernes</td>
										<td><input type="text" name="vie-aero" id="vie-aero" value="<?php echo $tabla[0][5]; ?>" maxlength="4" <?php
											if ( $diaSemana < 5 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="vie-est" id="vie-est" value="<?php echo $tabla[1][5]; ?>" maxlength="4" <?php
											if ( $diaSemana < 5 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="vie-fue" id="vie-fue" value="<?php echo $tabla[2][5]; ?>" maxlength="4" <?php
											if ( $diaSemana < 5 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td class="highlight2" id="vie-tot"><?php echo $vieto = $tabla[0][5] + $tabla[1][5] + $tabla[2][5]; ?></td>
									</tr>
									<tr>
										<td>Sábado</td>
										<td><input type="text" name="sab-aero" id="sab-aero" value="<?php echo $tabla[0][6]; ?>" maxlength="4" <?php
											if ( $diaSemana < 6 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="sab-est" id="sab-est" value="<?php echo $tabla[1][6]; ?>" maxlength="4" <?php
											if ( $diaSemana < 6 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="sab-fue" id="sab-fue" value="<?php echo $tabla[2][6]; ?>" maxlength="4" <?php
											if ( $diaSemana < 6 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
									<input type="hidden" name="lunes" value="<?php echo $lunes; ?>">
									<input type="hidden" name="domingo" value="<?php echo $domingo; ?>">
									<input type="hidden" name="mysingle" value="462">


									<td class="highlight1" id="sab-tot"><?php echo $sabto = $tabla[0][6] + $tabla[1][6] + $tabla[2][6]; ?></td>
									</tr>
									<tr>
										<td>Domingo</td>
										<td><input type="text" name="dom-aero" id="dom-aero" value="<?php echo $tabla[0][7]; ?>" maxlength="4" <?php
											if ( $diaSemana < 7 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="dom-est" id="dom-est" value="<?php echo $tabla[1][7]; ?>" maxlength="4" <?php
											if ( $diaSemana < 7 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td><input type="text" name="dom-fue" id="dom-fue" value="<?php echo $tabla[2][7]; ?>" maxlength="4" <?php
											if ( $diaSemana < 7 ) {
												echo "disabled";
											}
											?> class="int-num"></td>
										<td class="highlight2" id="dom-tot"><?php echo $domto = $tabla[0][7] + $tabla[1][7] + $tabla[2][7]; ?></td>
									</tr>
									<tr>

										<td  class="empty"><a href="#" class="actividad-btn"  id="sguardar" value="Guardar">Guardar</a></td>

										<td colspan="3" class="empty">Suma de todos los tiempos</td>
										<td class="highlight3" id="sumatot"><?php echo $lunto + $marto + $mierto + $jueto + $vieto + $sabto + $domto; ?></td>
									</tr>

								</form>
								</tbody>
							</table>
						<?php } else {
							?>
							<table border="0"  class="actividad1">
								<tbody>
									<tr>
										<td>Día de la semana</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_aero.png" class="ico">Aeróbicos</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_est.png" class="ico">Estiramiento</td>
										<td><img src="<?php bloginfo( 'template_url' ); ?>/images/actividades/icon_fue.png" class="ico">Fuerza</td>
										<td class="highlight1"><span>Tiempo total</span></td>
									</tr>
									<tr>
										<td>Lunes</td>
										<td><?php echo $tabla[0][1]; ?></td>
										<td><?php echo $tabla[1][1]; ?></td>
										<td><?php echo $tabla[2][1]; ?></td>
										<td class="highlight2" id="lun-tot"><?php echo $lunto = $tabla[0][1] + $tabla[1][1] + $tabla[2][1]; ?></td>
									</tr>

									<tr>
										<td>Martes</td>
										<td><?php echo $tabla[0][2]; ?></td>
										<td><?php echo $tabla[1][2]; ?></td>
										<td><?php echo $tabla[2][2]; ?></td>
										<td class="highlight1" id="mar-tot"><?php echo $marto = $tabla[0][2] + $tabla[1][2] + $tabla[2][2]; ?></td>
									</tr>
									<tr>
										<td>Miércoles</td>
										<td><?php echo $tabla[0][3]; ?></td>
										<td><?php echo $tabla[1][3]; ?></td>
										<td><?php echo $tabla[2][3]; ?></td>
										<td class="highlight2" id="mier-tot"><?php echo $mierto = $tabla[0][3] + $tabla[1][3] + $tabla[2][3]; ?></td>
									</tr>
									<tr>
										<td>Jueves</td>
										<td><?php echo $tabla[0][4]; ?></td>
										<td><?php echo $tabla[1][4]; ?></td>
										<td><?php echo $tabla[2][4]; ?></td>
										<td class="highlight1" id="jue-tot"><?php echo $jueto = $tabla[0][4] + $tabla[1][4] + $tabla[2][4]; ?></td>
									</tr>
									<tr>
										<td>Viernes</td>
										<td><?php echo $tabla[0][5]; ?></td>
										<td><?php echo $tabla[1][5]; ?></td>
										<td><?php echo $tabla[2][5]; ?></td>
										<td class="highlight2" id="vie-tot"><?php echo $vieto = $tabla[0][5] + $tabla[1][5] + $tabla[2][5]; ?></td>
									</tr>
									<tr>
										<td>Sábado</td>
										<td><?php echo $tabla[0][6]; ?></td>
										<td><?php echo $tabla[1][6]; ?></td>
										<td><?php echo $tabla[2][6]; ?></td>
								<input type="hidden" name="lunes" value="<?php echo $lunes; ?>">
								<input type="hidden" name="domingo" value="<?php echo $domingo; ?>">
								<input type="hidden" name="mysingle" value="462">


								<td class="highlight1" id="sab-tot"><?php echo $sabto = $tabla[0][6] + $tabla[1][6] + $tabla[2][6]; ?></td>
								</tr>
								<tr>
									<td>Domingo</td>
									<td><?php echo $tabla[0][7]; ?></td>
									<td><?php echo $tabla[1][7]; ?></td>
									<td><?php echo $tabla[2][7]; ?></td>
									<td class="highlight2" id="dom-tot"><?php echo $domto = $tabla[0][7] + $tabla[1][7] + $tabla[2][7]; ?></td>
								</tr>
								<tr>

									<td colspan="4" class="empty">Suma de todos los tiempos</td>
									<td class="highlight3" id="sumatot"><?php echo $lunto + $marto + $mierto + $jueto + $vieto + $sabto + $domto; ?></td>
								</tr>

								</form>
								</tbody>
							</table>

						<?php }
						?>
					</div>
					<div class="semanas">
						<a href="<?php echo site_url() . "/actividad/registro-de-actividad-fisica/?fecha={$fechaanterior}" ?>" class="prev">Semana anterior</a>
						<?php if ( $bandera ) { ?>
							<a href="<?php echo site_url() . "/actividad/registro-de-actividad-fisica/" ?>" ><span>Regresar a mi registro de hoy</span></a>
							<a href="<?php echo site_url() . "/actividad/registro-de-actividad-fisica/?fecha={$fechasiguiente}" ?>" class="next">Semana siguiente</a>

						<?php } ?>
					</div>


				</div>
				<div id="tabs-2" class="tab-content">
					<div class="inst-pad">
						<?php
						$my_postid = 792; //This is page id or post id
						$content_post = get_post( $my_postid );
						$content = $content_post->post_content;
						$content = apply_filters( 'the_content', $content );
						$content = str_replace( ']]>', ']]&gt;', $content );
						echo $content;
						?>
					</div>
				</div>
			</div>
			<!--END ACTIVIDAD FISICA-->
		<?php } elseif ( is_single( 461 ) ) { ?>
			<!--START PESO & ALIMENTACION-->
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Actividades</a></li>
					<li><a href="#tabs-2">Instrucciones</a></li>
				</ul>
				<a href="#" class="hist">Ver historial</a>
				<div id="tabs-1" class="tab-content">
					<form action="<?php echo site_url() . "/actividades-dao" ?>" id="formpeso" method="post">
						<h3><?php echo $semana; ?></h3>
						<div class="cont-margin">
							<div class="int-pesos">
								<div class="peso-single"><input type="text" name="peso-inicial" class="int-num"><p>Peso inicial</p></div><label>-</label>
								<div class="peso-single"><input type="text" name="peso-hoy" class="int-num"><p>Peso de hoy</p></div><label>=</label>
								<div class="peso-single"><input type="text" name="cambio-peso" class="int-num2"><p>Cambio de peso</p></div>
								<div class="int-sentirse">
									<p>Me siento</p>
									<select name="siento-alimento" name="siento" class="int-select2">
										<option value="b">Bien</option>
										<option value="r">Regular</option>
										<option value="m">Mal</option>
									</select>
								</div>
							</div>
						</div>
						<table class="actividad2" border="0"  >
							<tr>
								<td class="width180">Grupo de alimentos</td>
								<td>Raciones diarias</td>
								<td>Dia 1</td>
								<td>Dia 2</td>
								<td>Dia 3</td>
								<td>Dia 4</td>
								<td>Dia 5</td>
								<td>Dia 6</td>
								<td>Dia 7</td>
							</tr>
							<tr>
								<td>Verduras</td> 
								<td><input type="text" name="meta-verduras" class="int-num"></td>
								<td><input type="checkbox" name="lun-v" class="int-check"></td>
								<td><input type="checkbox" name="mar-v" class="int-check"></td>
								<td><input type="checkbox" name="mier-v" class="int-check"></td>
								<td><input type="checkbox" name="jue-v" class="int-check"></td>
								<td><input type="checkbox" name="vie-v" class="int-check"></td>
								<td><input type="checkbox" name="sab-v" class="int-check"></td>
								<td><input type="checkbox" name="dom-v" class="int-check"></td>
							</tr>
							<tr>
								<td>Frutas</td>
								<td><input type="text" name="meta-frutas" class="int-num"></td>
								<td><input type="checkbox" name="lun-f" class="int-check"></td>
								<td><input type="checkbox" name="mar-f" class="int-check"></td>
								<td><input type="checkbox" name="mier-f" class="int-check"></td>
								<td><input type="checkbox" name="jue-f" class="int-check"></td>
								<td><input type="checkbox" name="vie-f" class="int-check"></td>
								<td><input type="checkbox" name="sab-f" class="int-check"></td>
								<td><input type="checkbox" name="dom-f" class="int-check"></td>
							</tr>
							<tr>
								<td>Carbohidratos</td>
								<td><input type="text" name="meta-carbo" class="int-num"></td>
								<td><input type="checkbox" name="lun-c" class="int-check"></td>
								<td><input type="checkbox" name="mar-c" class="int-check"></td>
								<td><input type="checkbox" name="mier-c" class="int-check"></td>
								<td><input type="checkbox" name="jue-c" class="int-check"></td>
								<td><input type="checkbox" name="vie-c" class="int-check"></td>
								<td><input type="checkbox" name="sab-c" class="int-check"></td>
								<td><input type="checkbox" name="dom-c" class="int-check"></td>
							</tr>
							<tr>
								<td>Proteína / Lácteos</td>
								<td><input type="text" name="meta-proteina" class="int-num"></td>
								<td><input type="checkbox" name="lun-p" class="int-check"></td>
								<td><input type="checkbox" name="mar-p" class="int-check"></td>
								<td><input type="checkbox" name="mier-p" class="int-check"></td>
								<td><input type="checkbox" name="jue-p" class="int-check"></td>
								<td><input type="checkbox" name="vie-p" class="int-check"></td>
								<td><input type="checkbox" name="sab-p" class="int-check"></td>
								<td><input type="checkbox" name="dom-p" class="int-check"></td>
							</tr>
							<tr>
								<td>Grasas</td>
								<td><input type="text" name="meta-grasas" class="int-num"></td>
								<td><input type="checkbox" name="lun-g" class="int-check"></td>
								<td><input type="checkbox" name="mar-g" class="int-check"></td>
								<td><input type="checkbox" name="mier-g" class="int-check"></td>
								<td><input type="checkbox" name="jue-g" class="int-check"></td>
								<td><input type="checkbox" name="vie-g" class="int-check"></td>
								<td><input type="checkbox" name="sab-g" class="int-check"></td>
								<td><input type="checkbox" name="dom-g" class="int-check"></td>
							</tr>
							<tr>
								<td>Dulces</td>
								<td><input type="text" name="meta-dulces" class="int-num"></td>
								<td><input type="checkbox" name="lun-d" class="int-check"></td>
								<td><input type="checkbox" name="mar-d" class="int-check"></td>
								<td><input type="checkbox" name="mier-d" class="int-check"></td>
								<td><input type="checkbox" name="jue-d" class="int-check"></td>
								<td><input type="checkbox" name="vie-d" class="int-check"></td>
								<td><input type="checkbox" name="sab-d" class="int-check"></td>
								<td><input type="checkbox" name="dom-d" class="int-check"></td>
							<input type="hidden" name="lunes" value="<?php echo $lunes; ?>">
							<input type="hidden" name="domingo" value="<?php echo $domingo; ?>">
							<input type="hidden" name="mysingle" value="461">
							</tr>
							<tr>
								<td colspan="9"><a href="#" id="Conoce">Conoce las porciones por raci&oacute;n</a></td>
							</tr>

						</table>

						<div class="half-area">
							<div class="head-area"><h1>Lo que te funcionó bien:</h1></div>
							<textarea class="int-textarea" col="4" rows="6" name="funciono-bien"></textarea>
						</div>
						<div class="half-area2">
							<div class="head-area"><h1>Lo que no funcionó tan bien:</h1></div>
							<textarea  class="int-textarea" name="no-funciono-bien"></textarea>
						</div>
						<div class="full-area">
							<div class="head-area"><h1>Estoy muy orgulloso de:</h1></div>
							<textarea class="int-textarea2" name="orgulloso"></textarea>
						</div>
						<a href="#" class="actividad-btn"  id="pesoguardar" value="Guardar">Guardar</a>
					</form>
				</div>
				<div id="tabs-2" class="tab-content">
					<div class="inst-pad">
						<?php
						$my_postid = 800; //This is page id or post id
						$content_post = get_post( $my_postid );
						$content = $content_post->post_content;
						$content = apply_filters( 'the_content', $content );
						$content = str_replace( ']]>', ']]&gt;', $content );
						echo $content;
						?>
					</div>
				</div>
			</div>


			<!--END PESO & ALIMENTACION-->
		<?php } elseif ( is_single( 61 ) ) { ?>
			<!--START DIARIO DE SUENO-->
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Actividades</a></li>
					<li><a href="#tabs-2">Instrucciones</a></li>
				</ul>
				<a href="#" class="hist">Ver historial</a>
				<div id="tabs-1" class="tab-content">
					<h3><?php echo $semana; ?></h3>
					<div class="cont-margin">
						<table border="0"  class="actividad1">
							<tbody>
							<form action="<?php echo site_url() . "/actividades-dao" ?>" id="formhoras" method="post">
								<tr>
									<td>Día de la semana</td>
									<td>Menos de 7 horas</td>
									<td>De 7 a 9 horas</td>
									<td>Más de 9 horas</td>
									<td class="highlight1"><span>Califica tu sueño</span></td>
								</tr>
								<tr>
									<td>Domingo</td>
									<td><input type="radio" name="horasd" value="7" class="int-check"></td>
									<td><input type="radio" name="horasd" value="8" class="int-check"></td>
									<td><input type="radio" name="horasd" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenod" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Lunes</td>
									<td><input type="radio" name="horasl" value="7" class="int-check"></td>
									<td><input type="radio" name="horasl" value="8" class="int-check"></td>
									<td><input type="radio" name="horasl" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenol" class="int-select">
											<o<option value="b">Excelente</option>
												<option value="r">Regular</option>
												<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Martes</td>
									<td><input type="radio" name="horasm" value="7" class="int-check"></td>
									<td><input type="radio" name="horasm" value="8" class="int-check"></td>
									<td><input type="radio" name="horasm" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenom" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Miércoles</td>
									<td><input type="radio" name="horasmi" value="7" class="int-check"></td>
									<td><input type="radio" name="horasmi" value="8" class="int-check"></td>
									<td><input type="radio" name="horasmi" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenomi" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Jueves</td>
									<td><input type="radio" name="horasj" value="7" class="int-check"></td>
									<td><input type="radio" name="horasj" value="8" class="int-check"></td>
									<td><input type="radio" name="horasj" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenoj" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Viernes</td>
									<td><input type="radio" name="horasv" value="7" class="int-check"></td>
									<td><input type="radio" name="horasv" value="8" class="int-check"></td>
									<td><input type="radio" name="horasv" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenov" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Sábado</td>
									<td><input type="radio" name="horass" value="7" class="int-check"></td>
									<td><input type="radio" name="horass" value="8" class="int-check"></td>
									<td><input type="radio" name="horass" value="9" class="int-check"></td>
									<td class="highlight2">
										<select name="calidad-suenos" class="int-select">
											<option value="b">Excelente</option>
											<option value="r">Regular</option>
											<option value="m">Muy Malo</option>
										</select>
									</td>
								</tr>
								<input type="hidden" name="lunes" value="<?php echo $lunes; ?>">
								<input type="hidden" name="domingo" value="<?php echo $domingo; ?>">
								<input type="hidden" name="mysingle" value="61">

								<!-- 
								<tr>
									<td class="highlight1">Tiempo total</td>
									<td class="highlight2"></td>
									<td class="highlight2"></td>
									<td class="highlight2"></td>
									<td class="highlight4">Promedio</td>
								</tr>
								-->
								</tbody>
								</table> 
							</form>

					</div>
					<a href="#" class="actividad-btn"  id="horasguardar" value="Guardar">Guardar</a>

				</div>
				<div id="tabs-2" class="tab-content">
					<div class="inst-pad">
						<?php
						$my_postid = 802; //This is page id or post id
						$content_post = get_post( $my_postid );
						$content = $content_post->post_content;
						$content = apply_filters( 'the_content', $content );
						$content = str_replace( ']]>', ']]&gt;', $content );
						echo $content;
						?>
					</div>
				</div>
			</div>
			<!--END DIARIO DE SUENO-->
		<?php } ?>
	</div>
</div>
</div><!--main-->
<?php get_sidebar(); ?>
<div class="clear"></div>
</div><!--page-->

<?php get_footer(); ?>