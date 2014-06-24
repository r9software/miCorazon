<?php
/*
 * @package micorazon
  Template Name: Actividad
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
?>
<?php get_header(); ?>
<div class="content">
    <div <?php post_class('post'); ?>>
        <h1><?php the_title(); ?></h1>
        <p><?php echo $post->post_content; ?></p>
        <?php if (is_single(462)) { ?>
            <!--START ACTIVIDAD FISICA-->
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Actividades</a></li>
                    <li><a href="#tabs-2">Instrucciones</a></li>
                </ul>
                <a href="#" class="hist">Ver historial</a>
                <div id="tabs-1" class="tab-content">
                    <h3><?php echo $semana;?></h3>
                    <div class="cont-margin">
                        <table border="0"  class="actividad1">
                            <tbody>
                                <tr>
                                    <td>Día de la semana</td>
                                    <td><img src="<?php bloginfo('template_url'); ?>/images/actividades/icon_aero.png" class="ico">Aeróbicos</td>
                                    <td><img src="<?php bloginfo('template_url'); ?>/images/actividades/icon_est.png" class="ico">Estiramiento</td>
                                    <td><img src="<?php bloginfo('template_url'); ?>/images/actividades/icon_fue.png" class="ico">Fuerza</td>
                                    <td class="highlight1"><span>Tiempo total</span></td>
                                </tr>
                                <tr>
                                    <td>Domingo</td>
                                    <td><input type="text" name="dom-aero" class="int-num"></td>
                                    <td><input type="text" name="dom-est" class="int-num"></td>
                                    <td><input type="text" name="dom-fue" class="int-num"></td>
                                    <td class="highlight2">0</td>
                                </tr>
                                <tr>
                                    <td>Lunes</td>
                                    <td><input type="text" name="lun-aero" class="int-num"></td>
                                    <td><input type="text" name="lun-est" class="int-num"></td>
                                    <td><input type="text" name="lun-fue" class="int-num"></td>
                                    <td class="highlight1">20</td>
                                </tr>
                                <tr>
                                    <td>Martes</td>
                                    <td><input type="text" name="mar-aero" class="int-num"></td>
                                    <td><input type="text" name="mar-est" class="int-num"></td>
                                    <td><input type="text" name="mar-fue" class="int-num"></td>
                                    <td class="highlight2">0</td>
                                </tr>
                                <tr>
                                    <td>Miércoles</td>
                                    <td><input type="text" name="mier-aero" class="int-num"></td>
                                    <td><input type="text" name="mier-est" class="int-num"></td>
                                    <td><input type="text" name="mier-fue" class="int-num"></td>
                                    <td class="highlight1">0</td>
                                </tr>
                                <tr>
                                    <td>Jueves</td>
                                    <td><input type="text" name="jue-aero" class="int-num"></td>
                                    <td><input type="text" name="jue-est" class="int-num"></td>
                                    <td><input type="text" name="jue-fue" class="int-num"></td>
                                    <td class="highlight2">0</td>
                                </tr>
                                <tr>
                                    <td>Viernes</td>
                                    <td><input type="text" name="vie-aero" class="int-num"></td>
                                    <td><input type="text" name="vie-est" class="int-num"></td>
                                    <td><input type="text" name="vie-fue" class="int-num"></td>
                                    <td class="highlight1">0</td>
                                </tr>
                                <tr>
                                    <td>Sábado</td>
                                    <td><input type="text" name="sab-aero" class="int-num"></td>
                                    <td><input type="text" name="sab-est" class="int-num"></td>
                                    <td><input type="text" name="sab-fue" class="int-num"></td>
                                    <td class="highlight2">0</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="empty">Suma de todos los tiempos</td>
                                    <td class="highlight3">195</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
                <div id="tabs-2" class="tab-content">
                    <div class="inst-pad">
                        <?php
                        $my_postid = 792; //This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
            <!--END ACTIVIDAD FISICA-->
        <?php } elseif (is_single(461)) { ?>
            <!--START PESO & ALIMENTACION-->
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Actividades</a></li>
                    <li><a href="#tabs-2">Instrucciones</a></li>
                </ul>
                <a href="#" class="hist">Ver historial</a>
                <div id="tabs-1" class="tab-content">
					<form>
                    <h3><?php echo $semana;?></h3>
                    <div class="cont-margin">
                        <div class="int-pesos">
                            <div class="peso-single"><input type="text" name="dom-aero" class="int-num"><p>Peso inicial</p></div><label>-</label>
                            <div class="peso-single"><input type="text" name="dom-aero" class="int-num"><p>Peso de hoy</p></div><label>=</label>
                            <div class="peso-single"><input type="text" name="dom-aero" class="int-num2"><p>Cambio de peso</p></div>
                            <div class="int-sentirse">
                            <p>Me siento</p>
                            <select name="siento-alimento" class="int-select2">
                                <option>Bien</option>
                                <option>Regular</option>
                                <option>Mal</option>
                            </select>
                        </div>
                        </div>
                        
                    </div>
                    <table border="0"  class="actividad2">
                        <tbody>
                            <tr>
                                <!-- <td class="width180">Grupo de alimentos</td> -->
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
                                <!--<td><input type="text" name="dom-aero" class="int-num"></td>-->
								 <td><input type="text" name="v1"  maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v2" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v3" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v4" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v5" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v6" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="v7" maxlength="1" class="int-check"></td>
                            </tr>
                            <tr>
                                <td>Frutas</td>
                                <td><input type="text" name="f1" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f2" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f3" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f4" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f5" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f6" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="f7" maxlength="1" class="int-check"></td>
                            </tr>
                            <tr>
                                <td>Carbohidratos</td>
                                <td><input type="text" name="c1" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c2" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c3" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c4" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c5" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c6" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="c7" maxlength="1" class="int-check"></td>
                            </tr>
                            <tr>
                                <td>Proteína / Lácteos</td>
                                <td><input type="text" name="p1" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="p2" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="p3" maxlength="1" class="int-check"></td>
                                <td><input type="text" name="p4" maxlength="1"   class="int-check"></td>
                                <td><input type="text" name="p5"  maxlength="1" class="int-check"></td>
                                <td><input type="text" name="p6"  maxlength="1" class="int-check"></td>
                                <td><input type="text" name="p7" maxlength="1"  class="int-check"></td>
                            </tr>
                            <tr>
                                <td>Grasas</td>
                                <td><input type="text" name="g1" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g2" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g3" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g4" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g5" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g6" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="g7" maxlength="1"  class="int-check"></td>
                            </tr>
                            <tr>
                                <td>Dulces</td>
                                <td><input type="text" name="d1" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d2" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d3" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d4" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d5" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d6" maxlength="1"  class="int-check"></td>
                                <td><input type="text" name="d7" maxlength="1"  class="int-check"></td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="half-area">
                        <div class="head-area"><h1>Lo que te funcionó bien:</h1></div>
                        <textarea class="int-textarea" col="4" rows="6"></textarea>
                    </div>
                    <div class="half-area2">
                        <div class="head-area"><h1>Lo que no funcionó tan bien:</h1></div>
                        <textarea  class="int-textarea"></textarea>
                    </div>
                    <div class="full-area">
                        <div class="head-area"><h1>Estoy muy orgulloso de:</h1></div>
                        <textarea class="int-textarea2"></textarea>
                    </div>
					<input type="submit" value="Guardar">
					</form>
                </div>
                            <div id="tabs-2" class="tab-content">
                <div class="inst-pad">
                    <?php
                    $my_postid = 800; //This is page id or post id
                    $content_post = get_post($my_postid);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                    ?>
                </div>
            </div>
            </div>


    <!--END PESO & ALIMENTACION-->
<?php } elseif (is_single(61)) { ?>
    <!--START DIARIO DE SUENO-->
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Actividades</a></li>
            <li><a href="#tabs-2">Instrucciones</a></li>
        </ul>
        <a href="#" class="hist">Ver historial</a>
        <div id="tabs-1" class="tab-content">
            <h3><?php echo $semana;?></h3>
            <div class="cont-margin">
                <table border="0"  class="actividad1">
                    <tbody>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
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
                                    <option value="b">Bueno</option>
                                    <option value="r">Regular</option>
                                    <option value="m">Malo</option>
                                </select>
                            </td>
                        </tr>
						
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
            </div>
        </div>
        <div id="tabs-2" class="tab-content">
            <div class="inst-pad">
                <?php
                $my_postid = 802; //This is page id or post id
                $content_post = get_post($my_postid);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
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