<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package micorazon
 */
$current_user = wp_get_current_user();
$id = $current_user->ID;

try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "Select riesgo,nombre,apaterno,amaterno,avatar from wp_usersinfo where user_id={$id}"
			. " LIMIT 1";
	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['riesgo'] ) ) {
		$riesgo = $rs2[0]['riesgo'];
		$nombre = $rs2[0]['nombre'] . " " . $rs2[0]['apaterno'] . " " . $rs2[0]['amaterno'];
		$avatar = $rs2[0]['avatar'];

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
				<?php if ( empty( $avatar ) ) { ?>
					<img src="<?php bloginfo('template_url'); ?>/images/base/user-icon.png"/>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/avatar/<?php echo $avatar; ?>" width="105px"/>
				<?php } ?>
			</div>
			<h4><?php echo $nombre; ?></h4>
			<div class="ranking">
				<div class="heart-points">
					<div class="points">Riesgo <?php echo $level; ?></div>
				</div>

				<ul>
					<li><a href="#">Ayuda</a></li>
					<li><a href="#">Salir</a></li>
				</ul>
			</div>
		</div>
		<div class="mi-registro">
			<h3 class="tmiregistro">Mi registro hoy</h3>
			<div class="options">
				<form name="registro-hoy">
					<div class="form-group">
						<input type="checkbox" name="uno" value="ON" id="uno" class="check" /><label for="uno">Comí 5</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="dos" value="ON" id="dos" class="check"/><label for="dos">Me moví 10</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="tres" value="ON" id="tres" class="check" /><label for="tres">Dormí 8</label>
					</div>
				</form>
			</div>
			<p><a href="#">Ver todos mis registros</a></p>
		</div>
		<div class="mis-retos">
			<h3 class="tit tmisretos">Mis retos</h3>
			<div class="options">
				<ul>
					<li class="line"><a href="#">Comer saludable</a></li>
					<li ><a href="#">Hacer ejercicio</a></li>
					<li><a href="#">Reducir el estrés</a></li>
				</ul>
			</div>
		</div>
		<div class="mis-motivaciones">
			<h3 class="tit tmismotivaciones">Mis motivaciones</h3>
			<div class="options">
				<ul>
					<li class="line"><a href="#">Mis hijos</a></li>
					<li ><a href="#">Verme bien</a></li>
					<li><a href="#">Estar sano</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>