<?php
/*
  @package micorazon
  Template Name: Perfil
 */
/*
  if (!is_user_logged_in()) {
  header("Location: " . site_url() . "/login");
  exit;
  } */

$current_user = wp_get_current_user();
$id = $current_user->ID;




/**
 * upload_image()
 * 
 * Sube una imagen al servidor  al directorio especificado teniendo el Atributo 'Name' del campo archivo.
 * 
 * @param string $destination_dir Directorio de destino dónde queremos dejar el archivo
 * @param string $name_media_field Atributo 'Name' del campo archivo
 * @return boolean
 */
//end function
$level = "alto";
$riesgo;
$nombre;
$apaterno;
$amaterno;
$avatar;
$level;
$presion;
$cps;
$cpd;
$glucosa;
$cglucosa;
$colesterol;
$cc;
$trigliceridos;
$ctrigliceridos;
$rfruta;
$rverdura;
$imc;
$nestres;
$afisicas;
$fecha;
$hsueno;
$fumas;
$fam;

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

try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "Select riesgo,nombre,apaterno,amaterno,avatar,fechariesgo from wp_usersinfo where user_id={$id}"
			. " LIMIT 1";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['riesgo'] ) ) {
		$riesgo = $rs2[0]['riesgo'];
		$nombre = $rs2[0]['nombre'] . " " . $rs2[0]['apaterno'] . " " . $rs2[0]['amaterno'];
		$avatar = $rs2[0]['avatar'];
		$fecha = $rs2[0]['fechariesgo'];
		$arras = explode( "-", $fecha );
		$fecha = $arras[2] . "/" . getmes( $arras[1] ) . "/" . $arras[0];
		if ( $riesgo == 1 ) {
			$level = "medio";
		} else if ( $riesgo == 0 ) {
			$level = "bajo";
		} else if ( $riesgo == 2 ) {
			$level = "alto";
		}
	} else {
		wp_safe_redirect( site_url() . "/cuestionario/" );
	}
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
<?php
try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "Select presion,cifra_ps,cifra_pd,glucosa,cifraglucosa,colesterol,cifracolesterol,trigliceridos,cifratrigliceridos,r_fruta,r_verdura, "
			. "imc,nivel_estres,act_fisicas,horas_sueno,fumas,f_fumas,f_fumas2,familiares from wp_usersmedicalinfo where user_id={$id}"
			. " LIMIT 1";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	$presion = $rs2[0]['presion'];
	$cps = $rs2[0]['cifra_ps'];
	$cpd = $rs2[0]['cifra_pd'];
	$glucosa = $rs2[0]['glucosa'];
	$cglucosa = $rs2[0]['cifraglucosa'];
	$colesterol = $rs2[0]['colesterol'];
	$cc = $rs2[0]['cifracolesterol'];
	$trigliceridos = $rs2[0]['trigliceridos'];
	$ctrigliceridos = $rs2[0]['cifratrigliceridos'];
	$rfruta = $rs2[0]['r_fruta'];
	$rverdura = $rs2[0]['r_verdura'];
	$imc = $rs2[0]['imc'];
	$nestres = $rs2[0]['nivel_estres'];
	$afisicas = $rs2[0]['act_fisicas'];
	$hsueno = $rs2[0]['horas_sueno'];
	$fumas = $rs2[0]['fumas'];
	$fumas1 = $rs2[0]['f_fumas'];
	$fumas2 = $rs2[0]['f_fumas2'];
	$fam = $rs2[0]['familiares'];
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Perfíl</title>
		<style>
			.impresion-tabla{ width:550px }
			p{ font-size:12px; }
			body{font-family: 'Open Sans', sans-serif; color:#000}
			span{ font-size:13px; font-weight:700}
			ol{ font-size:12px}
			ol li span{ font-size:12px; color:#000; font-weight: normal}
			.riesgo-bajo{ color:#72D700; font-weight:700}
			.riesgo-medio{ color:#f3a933; font-weight:700}
			.riesgo-alto{ color:#d54254; font-weight:700}
			td{ padding:5px}
			th{ text-align:left}
			h1 {font-size:14px; font-weight: normal}
			h2 {font-size:14px}
			h3 { color:#878787; font-weight: normal; font-size:13px}
			.legal p{ font-size:11px}
			h2 span { font-size:14px}
		</style>
	</head>
	<html>
		<body >
			<div class="perfil-box" >
				<table border="0" class="impresion-tabla">
					<thead>
						<tr>
							<th><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/logo.jpg" /></th>
							<th colspan="2">
								<h1><?php echo $nombre; ?></h1>
								<h2>Mi corazón está en: <span class="riesgo-<?php echo $level; ?>">Riesgo <?php echo $level; ?></span></h2>
								<h3><?php echo $fecha; ?></h3>
							</th>
						</tr>
						<tr>
							<td colspan="3">
								<img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-head.jpg" />
							</td>
						</tr>
					</thead>
					<tbody>

						<tr>
							<td colspan="3">
								<?php if ( $riesgo == 0 ) { ?>
									<span>De acuerdo a lo que respondiste acerca de tus hábitos, tu riesgo de padecer una enfermedad cardiaca es mínimo. Es importante que sigas así y continúes adoptando conductas que te ayuden a llevar una vida sana. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él y juntos crear un plan que beneficie a tu salud. Sigue estos pasos básicos:</span>
								<?php } else if ( $riesgo == 1 ) { ?>
									<span>Algunos hábitos están afectando tu salud y ponen en riesgo a tu corazón. Es importante que empieces a tomar acciones que eviten complicaciones a futuro. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él  y juntos crear un plan que beneficie a tu salud. Estos pasos básicos te ayudarán:</span>

								<?php } else if ( $riesgo == 2 ) { ?>
									<span>Tus hábitos están afectando a tu corazón y presentas un riesgo elevado de tener alguna complicación. Es importante que empieces a realizar cambios en tu vida para evitar que tu salud se deteriore. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él y juntos crear un plan que beneficie a tu salud. Estas recomendaciones te ayudarán a tener una vida sana.</span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<?php if ( $riesgo == 0 ) { ?>
									<ol>
										<li class="riesgo-bajo"><span>No olvides revisar tus niveles de presión arterial, glucosa, colesterol y triglicéridos</span></li>
										<li class="riesgo-bajo"><span>Sigue consumiendo frutas y verduras, limita las grasas</span></li>
										<li class="riesgo-bajo"><span>Muévete por lo menos 30 minutos al día</span></li>
										<li class="riesgo-bajo"><span>Aléjate de las personas que fuman</span></li>
										<li class="riesgo-bajo"><span>Duerme entre 7 a 8 horas al día</span></li>
									</ol>
								<?php } else if ( $riesgo == 1 ) { ?>
									<ol>
										<li class="riesgo-medio"><span>Empieza por consumir alimentos más saludables como frutas y verduras</span></li>
										<li class="riesgo-medio"><span>Revísa periódicamente tus niveles de glucosa, presión arterial, colesterol y triglicéridos</span></li>
										<li class="riesgo-medio"><span>¡Qué esperas para realizar alguna actividad física! Puedes empezar por caminar 10 minutos al día</span></li>
										<li class="riesgo-medio"><span>Ten un peso saludable, si tienes “kilitos de más” es momento de bajarlos</span></li>
										<li class="riesgo-medio"><span>Busca estrategias para reducir tu estrés</span></li>
									</ol>
								<?php } else if ( $riesgo == 2 ) { ?>
									<ol>
										<li class="riesgo-alto"><span>Empieza por consumir alimentos más saludables como frutas y verduras.</span></li>
										<li class="riesgo-alto"><span>Revísate periódicamente tus niveles de glucosa, presión arterial, colesterol y triglicéridos.</span></li>
										<li class="riesgo-alto"><span>Camina por lo menos 10 minutos tres veces al día.</span></li>
										<li class="riesgo-alto"><span>Tener un peso saludable es importante. Acude con un especialista si quieres bajar de peso.</span></li>
										<li class="riesgo-alto"><span>Si fumas es momento de dejar este mal hábito.</span></li>
										<li class="riesgo-alto"><span>Reduce tu estrés al máximo.</span></li>
									</ol>
								<?php } ?>

								<img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-head-s.jpg" />
							</td>
						</tr>

						<tr>
							<td valign="top">
								<?php
								if ( !$presion ) {
									$mensaje = "Desconocido";
									$mylevel="alto";
								} else {
									if ( $cps <= 139 && $cps >= 60 && $cpd <= 89 && $cpd >= 50 ) {
										$mylevel = "bajo";
										$newriesgo = 0;
								} else {
										$mylevel = "alto";
										$newriesgo = 2;
									}
									$mensaje = $cps . "/" . $cpd . "mmHg2";
								}
								?>
								<span>Presión arterial</span>
								<p>Nivel actual: <strong><?php echo $mensaje; ?></strong></p>
								<p>Nivel sano: Menos de 120/80 mmHg).</p>
								<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>

							</td>
							<td valign="top">
								<?php
								if ( !$glucosa ) {
									$mensaje = "Desconocido";
									$mylevel="alto";
								} else if ( $glucosa ) {
									$mylevel;
									if ( $cglucosa >= 70 && $cglucosa <= 100 ) {
										$mylevel = "bajo";
									} else if ( ($cglucosa > 100 && $cglucosa <= 125 ) ) {
										$mylevel = "medio";
									} else {
										$mylevel = "alto";
									}
									$mensaje = $cglucosa . "mg/dL";
								}
								?>
								<span>Glucosa en la sangre</span>
								<p>Nivel actual: <strong><?php echo $mensaje; ?></strong></p>
								<p>Nivel sano: Menor de 140 mg/dL postprandial.</p>
								<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>

							</td>
							<td valign="top">
								<?php
								if ( !$trigliceridos ) {
									$mensaje = "Desconocido";
									$mylevel="alto";
								} else if ( $trigliceridos ) {
									$mylevel;
									if ( $ctrigliceridos <= 199 && $ctrigliceridos >= 50 ) {
										$mylevel = "bajo";
										
									} else {
										$mylevel = "alto";
										
								}
								$mensaje = $ctrigliceridos . "mg/dL";
									}
									?>
									<span>Triglicéridos</span>
									<p>Nivel actual: <strong><?php echo $mensaje; ?></strong></p>
									<p>Nivel sano: 200 a 499 mg/dL</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>

								</td>
							</tr>
							<tr>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
							</tr>
							<tr>
								<td valign="top">
									<?php
									if ( !$colesterol ) {
										$mensaje = "Desconocido";
										$mylevel="alto";
									} else if ( $colesterol ) {
									$mylevel;
									if ( $cc < 200 && $cc > 99 ) {
									$mylevel = "bajo";
									$newriesgo = 0;
									} else if ( ($cc >= 200 && $cc <= 239 ) ) {
									$mylevel = "medio";
									$newriesgo = 1;
									} else {
									$mylevel = "alto";
									$newriesgo = 2;
									}
									$mensaje=$cc . "mg/dL";
									}
									
									?>
									<span>Colesterol</span>
									<p>Nivel actual: <strong><?php echo $mensaje; ?></strong></p>
									<p>Nivel sano: menor a 200 mg/dL</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
								<td valign="top">
									
									<?php
									if ( $imc < 25) {
														$mylevel = "bajo";
														
													} else if ( ($imc >= 25 && $imc < 30 ) ) {
														$mylevel = "medio";
													} else {
														$mylevel = "alto";
													}
									?>
									
									
									<span>Peso (IMC)</span>
									<p>IMC actual: <strong><?php echo $imc; ?></strong></p>
									<p>Nivel sano: 19 a 24.9</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
								<td valign="top">
									<span>Nutrición</span>
									<p>Raciones actuales: <strong><?php
											$rtot = $rfruta + $rverdura;
													if ( $rtot >= 5 ) {
														$mylevel = "bajo";
														$newriesgo = 0;
													} else if ( ($rtot < 5 && $rtot > 3 ) ) {
														$mylevel = "medio";
														$newriesgo = 1;
													} else {
														$mylevel = "alto";
														$newriesgo = 2;
													}
											echo $rtot;
											?></strong></p>
									<p>Raciones recomendadas: 5 raciones de frutas y verduras o más</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
							</tr>
							<tr>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
							</tr>
							<tr>
								<td style="height: 300px;"></td>
								<td style="height: 300px;"></td>
								<td style="height: 300px;"></td>
							</tr>
							<tr>
								<td valign="top">
									<?php
									if ( $nestres <3  ){
													$mylevel = "bajo";
													$newriesgo=0;
													}
													else if ( ($nestres > 2) && $nestres < 4 ){
													$mylevel = "medio";
													$newriesgo = 1;
													}
													else{
													$mylevel = "alto";
													$newriesgo=2;
													}
									?>
									<span>Estrés</span>
									<p>Nivel:<strong><?php echo $nestres; ?></strong></p>
									<p>Nivel sano: 1 - Adopta técnicas para controlar el estrés.</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
								<td valign="top">
									<?php
									if ( $afisicas == 1 ) {

										$mensaje = "No realizo actividad alguna";
									} else if ( $afisicas == 2 ) {
										$mensaje = "Menos de 30 minutos a la semana";
									} else if ( $afisicas == 3 ) {
										$mensaje = "30 a 69 minutos a la semana";
									} else if ( $afisicas == 4 ) {
										$mensaje = "70 a 109 minutos a la semana";
									} else if ( $afisicas == 5 ) {
										$mensaje = "110 a 149 minutos a la semana";
									} else if ( $afisicas == 6 ) {
										$mensaje = "150 minutos o m&aacute;s a la semana";
									}
									
													if ( $afisicas >= 5 ) {
														$mylevel = "bajo";
														$newriesgo=0;
													} else if ( ($afisicas < 5) && $afisicas >= 3 ) {
														$mylevel = "medio";
														$newriesgo = 1;
													} else {
														$mylevel = "alto";
														$newriesgo=2;
														
													}
									?>
									<span>Actividad física</span>
									<p>Minutos: <?php echo $mensaje; ?></p>
									<p>Tu objetivo semanal es realizar más de 110 minutos por semana.</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
								<td valign="top">
									<span>Tabaquismo</span>
									<?php
									if ( $fumas ) {
										$mensaje = "Si";
										$mylevel = "alto";
										$newriesgo = 2;
									} else {
										$mensaje = "No";
										$mylevel = "bajo";
										$newriesgo = 0;
									}
									?>
									<p>Fumas: <strong><?php echo $mensaje; ?></strong></p>
									<p>No utilices productos con tabaco y evita el humo de segunda mano</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
							</tr>
							</tr>
							<tr>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
							</tr>

							<tr>
								<td valign="top">
									<?php
									if ( $hsueno == 2 ) {
														$mensaje = " 7 a 9 horas";
														$mylevel = "bajo";
														$newriesgo=0;
													} else if ( $hsueno == 1 ) {
														$mensaje = "Menos de 7 horas";
														$mylevel = "alto";
															$newriesgo=2;
													} else if ( $hsueno == 3 ) {
														$mensaje = "M&aacute;s de 9 horas";
														$mylevel = "alto";
														$newriesgo=2;
													}
									?>
									<span>Sueño</span>
									<p>Nivel: <strong><?php echo $mensaje; ?></strong></p>
									<p>Nivel sano: Entre 7 y 9 horas</p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>

								<td valign="top">
									<?php
													$myvar;
													$bandera;

													if ( $fam ) {
														$mylevel="alto";
														$myvar = "Presentes";
														$mensaje=" Marcaste que presentas antecedentes heredofamiliares que pueden influir en tu salud cardiovascular.";
														
													} else {
														$mylevel="bajo";
														$myvar = "No presentes";
														$mensaje="Marcaste que no presentas antecedentes heredofamiliares que pueden influir en tu salud cardiovascular.";
													}
													?>
									<span>Padecimientos heredofamiliares</span>
									<p><strong><?php echo $myvar; ?></strong></p>
									<p><?php echo $mensaje; ?></p>
									<p class="riesgo-<?php echo $mylevel; ?>">Riesgo <?php echo $mylevel; ?></p>
								</td>
							</tr>

							<tr>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td><img src="<?php bloginfo( 'template_url' ); ?>/images/impresion/barra-item.jpg" /></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3" class="legal">
									<p>Este documento es una referencia, si quieres ver más información consulta tu página www.micorazonsaludable.com</p> 
									<p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
								</td>
							</tr>
						</tbody>
					</table>



				</div>
<!--
				<div class="cont-submit5">
					<a id="printer" class="submit2">Imprimir</a>
				</div>-->
				<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.11.1.min.js"></script>
				<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-ui-1.10.4.min.js"></script>
				<script src="<?php bloginfo( 'template_url' ); ?>/js/micorazon.js"></script>
				<script src="<?php bloginfo( 'template_url' ); ?>/js/imprimir.js"></script>
			</body>
		</html>