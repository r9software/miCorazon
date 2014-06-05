<?php
/*
  @package micorazon
  Template Name: Login
 */
global $current_user;

				
			
// Obtenemos la informacion del usuario conectado y asignamos los valores a las variables globales
// Mas info sobre 'get_currentuserinfo()':
// http://codex.wordpress.org/Function_Reference/get_currentuserinfo
get_currentuserinfo();
// Guardamos el nombre del usuario en una variable

if ( is_user_logged_in() ) {
	header( "Location: " . site_url() . "" );
}

if ( isset( $_GET['codigo'] ) && isset( $_GET['empresa'] ) ) {
	$codigo = $_GET['codigo'];
	$emp = $_GET['empresa'];

	$codigo = strip_tags( $codigo );
	$locationError = "http://micorazon.wp/?error=true";
	try {
		$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", "root" );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$stmnt = $conn->query( "SELECT * FROM empresa WHERE codigo='{$codigo}' LIMIT 1" );

		$array = $stmnt->fetchAll();
		if ( count( $array ) > 0 ) {
			foreach ( $array as $row ) {
				if ( $row['nombre'] != $emp ) {
					header( "Location: {$row['url']}?codigo=" . $row['codigo'] . "&empresa=" . $row['nombre'] );
				}
			}
			$conn = null;
		} else {
			header( "Location: {$locationError}" );
		}
	} catch ( PDOException $e ) {
		echo "ERROR: " . $e->getMessage();
		die();
	}
} else {
	//usuario no se registra
	$valor = "ya conoce la url";
}
include 'header-registro.php';
?>
<body class="bg_login">
	<div class="content-all">
		<div class="page">
			<div class="login">
				<div class="head-log"><div><img src="<?php bloginfo( 'template_url' ); ?>/images/whitney2/usuario.png" /></div></div>
				<div class="body-log"><div><img src="<?php bloginfo( 'template_url' ); ?>/images/whitney2/logo_corazon.png" /><img src="<?php bloginfo( 'template_url' ); ?>/images/pack.infonavit/logo-info.png" class="img-derecha"/></div></div></div>
			<div class="foot-log">
				<form name="login" method="POST" action="<?php echo bloginfo( 'wpurl' ) . "/dao"; ?>">
					<div class="form-group">
						<label>Correo electrónico</label><input type="text" name="mail" value="" class="field1" />

					</div>
					<div class="form-group">
						<label>Contraseña</label><input type="password" name="pass" value="" class="field1" />

					</div>
					<div class="form-group center">
					<input type="submit" value="Enviar" class="submitred1"/>
					</div>
				</form> 
				<?php
			if(isset($_GET['mal'])){ ?>
			<div class="error">
				
					<h4>Usuario o contrase&ntilde;a incorrecto</h4>

			</div>
			<?php } ?>
			</div>
			
				
			<div class="options-login">
				<ul>
					<li><a href="#">¿Olvidaste tu contraseña? Actualízala</a></li>
				</ul>


			</div>
			<div class="nuevo-usuario">
				<?php if ( !isset( $valor ) ) { ?>
					<p><a href="#">¿Eres usuario nuevo?</a></p>
					<span><strong><a href="crea-tu-cuenta/">Regístrate ahora</a></strong></span>
					<div class="separador20"></div>
				<?php } ?>
				<p><a href="#">¿Quieres conocer más?</a></p>
				<span><strong><a href="#">Consulta video informativo</a></strong></span>
			</div>
			<?php include 'footer-registro.php'; ?>