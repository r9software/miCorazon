<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package micorazon
 */
$current_user = wp_get_current_user();
$id = $current_user->ID;
$bandera=false;
$ac1;
$ac2;
$ac3;
$r1="Comer saludable";
$r2="Hacer ejercicio";
$r3="Reducir el estr&eacute;s";
$riesgo;
try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "Select riesgo,nombre,apaterno,amaterno,avatar,motivation1,motivation2,motivation3 from wp_usersinfo join wp_usersmotivation on wp_usersmotivation.user_id=wp_usersinfo.user_id where wp_usersinfo.user_id={$id}"
			. " LIMIT 1";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['riesgo'] ) ) {
		$riesgo = $rs2[0]['riesgo'];
		$nombre = $rs2[0]['nombre'] . " " . $rs2[0]['apaterno'] . " " . $rs2[0]['amaterno'];
		$avatar = $rs2[0]['avatar'];
		$m1 = $rs2[0]['motivation1'];
		$m2 = $rs2[0]['motivation2'];
		$m3 = $rs2[0]['motivation3'];

		if ( $riesgo == 1 ) {
			$level = "medio";
		} else if ( $riesgo == 0 ) {
			$level = "bajo";
		} else if ( $riesgo == 2 ) {
			$level = "alto";
		}
	} else {
		header( "Location:" . site_url() . "/cuestionario/" );
	}
	$sql = "Select * from wp_usersactivity where user_id={$id} and fecha= CURDATE()  LIMIT 1";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['user_id'] ) ) {
		
		$ac1=$rs2[0]['actividad1'];
		$ac2=$rs2[0]['actividad2'];
		$ac3=$rs2[0]['actividad3'];
		if(!$ac1&&!$ac2&&!$ac3){
			$bandera=false;
		}else{
			$bandera=true;
		}
		
		
	}else{
		$sql = "INSERT IGNORE INTO wp_usersactivity (user_id,actividad1,actividad2,actividad3,fecha"
			. ") "
			. "VALUES (:user_id,0,0,0,CURDATE())";
	$q = $conn->prepare( $sql );
	if ( $q->execute( array( ':user_id' => $id
				) ) ) {

	}
	}
	$sql = "Select * from wp_retos where nivel={$riesgo}";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['nivel'] ) ) {
		
		$r1=$rs2[0]['reto1'];
		$r2=$rs2[0]['reto2'];
		$r3=$rs2[0]['reto3'];
		
		
	}
	
	
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>

<div class="sidebar">
	<div class="continua-main">
	</div>
	<div class="profile <?php echo $level; ?>">
		<div class="actividad ">
			<h3 class="tactividad">Mi actividad</h3>
			<div class="foto">
				<div class="looney-tunes"></div>
				<?php if ( !empty( $avatar ) ) { ?>
				<a href="/perfil"  style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/avatar/<?php echo $avatar; ?>')"></a>
				<?php } else { ?>
				
				<a href="/perfil"></a>

				<?php } ?>
				
			</div>
			<h4><?php echo $nombre; ?></h4>
			<div class="ranking">
				<div class="heart-points">
					<div class="points">Riesgo <?php echo $level; ?></div>
				</div>

				<ul>
					<li><a href="#">Ayuda</a></li>
					<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Salir</a></li>
				</ul>
			</div>
		</div>
		<div class="mi-registro">
			<h3 class="tmiregistro">Mi registro hoy</h3>
			<div class="options">
				<form name="registro-hoy">
						<?php if($bandera){  ?>
					
					<div class="form-group">
						<input type="checkbox" name="uno"  value="ON" <?php if($ac1){echo "checked='checked'"; }?> disabled="true" id="chuno" class="check" /><label for="uno">Comí 5 raciones</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="dos" value="ON"  <?php if($ac2){echo "checked='checked'"; }?> disabled="true" id="chdos" class="check"/><label for="dos">Me moví 10 minutos</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="tres" value="ON" <?php if($ac3){echo "checked='checked'"; }?> disabled="true"  id="chtres" class="check" /><label for="tres">Dormí 8 horas</label>
					</div>
						<?php }else{
						?>
					
					<div class="form-group">
						<input type="checkbox" name="uno" value="ON"  id="chuno" class="check" /><label for="uno">Comí 5 raciones</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="dos" value="ON"   id="chdos" class="check"/><label for="dos">Me moví 10 minutos</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="tres" value="ON"    id="chtres" class="check" /><label for="tres">Dormí 8 horas</label>
					</div>
					
						<?php
						} ?>
				</form>
			</div>
		
   <p><a href="/historial-de-registro-hoy/">Ver todos mis registros</a></p>
		</div>
		<div class="mis-retos">
			<h3 class="tit tmisretos">Mis retos</h3>
			<div class="options">
				<ul>
					<!--<li class="line"><a href="#">Comer saludable</a></li>-->
					<li><a href="#"><?php echo $r1 ?></a>
					<li ><a href="#"><?php echo $r2 ?></a></li>
					<li><a href="#"><?php echo $r3 ?></a></li>
				</ul>
			</div>
		</div>
		<div class="mis-motivaciones">
			<h3 class="tit tmismotivaciones">Mis motivaciones</h3>
			<div class="options">
				<ul>
					<li class="line"><a href="#"><?php echo $m1; ?></a></li>
					<li ><a href="#"><?php echo $m2; ?></a></li>
					<li><a href="#"><?php echo $m3; ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>