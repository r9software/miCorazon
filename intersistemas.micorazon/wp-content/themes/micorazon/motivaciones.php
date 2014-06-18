<?php
/*
  @package micorazon
  Template Name: Motivaciones
 */

if ( !is_user_logged_in() ) {
	header( "Location: " . site_url() . "/login" );
}
$current_user = wp_get_current_user();
$id = $current_user->ID;
try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	$sql = "Select * from wp_usersmotivation where user_id={$id} LIMIT 1 ";

	$rs = $conn->prepare( $sql );
	$rs->execute();
	$rs2 = $rs->fetchAll();
	if ( isset( $rs2[0]['user_id'] ) ) {
		
		
	}else{
		$sql = "INSERT IGNORE INTO wp_usersmotivation (user_id,motivation1,motivation2,motivation3"
			. ") "
			. "VALUES (:user_id,NULL,NULL,NULL)";
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
<?php include 'header-registro.php'; ?>
<body >
        <div class="aviso1" id="aviso1">
            <a href="#" class="close"></a>
            <p>Eval&uacute;a tus h&aacute;bitos y conoce que impacto tienen en tu salud cardiovascular.</p>
        </div>
        <div class="content-all">
            <div class="bg_registro">   
            </div>
            <div class="header">
                <div class="wrap">
                    <div class="logo3"></div>
                    <div class="logo4"></div>
                </div>
            </div>
               <div class="page">
                    <div class="registro-box">
                        <h3 >Por &uacute;ltimo, selecciona 3 motivaciones por las<br/> cuales quieres tener un vida m&aacute;s saludable</h3>
                        <!--INICIA PASO1-->
                        <div class="motivaciones">
                            <input type="hidden" value="3" id="count">
                            <div class="col1">
                                       <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mis niveles de colesterol" value="Mejorar mis niveles de colesterol">
                                    <label>Mejorar mis niveles de colesterol</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Verme mejor" value="Verme mejor">
                                    <label>Verme mejor</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mi resistencia f&iacute;sica" value="Mejorar mi resistencia f&iacute;sica">
                                    <label>Mejorar mi resistencia f&iacute;sica</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Comer sanamente" value="Comer sanamente">
                                    <label>Comer sanamente</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Dejar de fumar" value="Dejar de fumar">
                                    <label>Dejar de fumar</label>
                                </div>
                         
                                <div class="form-group0">
                                    <input type="checkbox" name="Prevenir o manejar la diabetes" value="Prevenir o manejar la diabetes">
                                    <label>Prevenir o manejar la diabetes</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Aumentar mi energ&iacute;a" value="Aumentar mi energ&iacute;a">
                                    <label>Aumentar mi energ&iacute;a</label>
                                </div>
                                          <div class="form-group0">
                                    <input type="checkbox" name="Sentirme m&aacute;s sano" value="Sentirme m&aacute;s sano">
                                    <label>Sentirme m&aacute;s sano</label>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mi autoimagen y autoconfianza" value="Mejorar mi autoimagen y autoconfianza">
                                    <label>Mejorar mi autoimagen y autoconfianza</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Reducir el estr&eacute;s y la ansiedad" value="Reducir el estr&eacute;s y la ansiedad">
                                    <label>Reducir el estr&eacute;s y la ansiedad</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mis expectativas de vida" value="Mejorar mis expectativas de vida">
                                    <label>Mejorar mis expectativas de vida</label>
                                </div>
                                  <div class="form-group0">
                                    <input type="checkbox" name="Sentirme mejor conmigo mismo" value="Sentirme mejor conmigo mismo">
                                    <label>Sentirme mejor conmigo mismo</label>
                                </div>
                                  <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mi sistema inmune" value="Mejorar mi sistema inmune">
                                    <label>Mejorar mi sistema inmune</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Mejorar mi calidad de vida" value="Mejorar mi calidad de vida">
                                    <label>Mejorar mi calidad de vida</label>
                                </div>
                                 <div class="form-group0">
                                    <input type="checkbox" name="Aumentar mi esperanza de vida" value="Aumentar mi esperanza de vida">
                                    <label>Aumentar mi esperanza de vida</label>
                                </div>
                              
                                
                                <div class="form-group0">
                                    <input type="checkbox" name="Manejar mi enfermedad cardiaca" value="Manejar mi enfermedad cardiaca">
                                    <label>Manejar mi enfermedad cardiaca</label>
                                </div>
                            </div>
                            <div class="col3">
                                <div class="form-group0">
                                    <input type="checkbox" name="Sentir que tengo m&aacute;s control sobre mi vida" value="Sentir que tengo m&aacute;s control sobre mi vida">
                                    <label>Sentir que tengo m&aacute;s control sobre mi vida</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Reducir mi presi&oacute;n sangu&iacute;nea" value="Reducir mi presi&oacute;n sangu&iacute;nea">
                                    <label>Reducir mi presi&oacute;n sangu&iacute;nea</label>
                                </div>
                                 <div class="form-group0">
                                    <input type="checkbox" name="Ser un ejemplo a seguir para mi familia" value="Ser un ejemplo a seguir para mi familia">
                                    <label>Ser un ejemplo a seguir para mi familia</label>
                                </div>
                               
                                <div class="form-group0">
                                    <input type="checkbox" name="Aumentar mi capacidad pulmonar" value="Aumentar mi capacidad pulmonar">
                                    <label>Aumentar mi capacidad pulmonar</label>
                                </div>
                                <div class="form-group0">
                                    <input type="checkbox" name="Prevenir la hipertensi&oacute;n" value="Prevenir la hipertensi&oacute;n">
                                    <label>Prevenir la hipertensi&oacute;n</label>
                                </div>
                                
                              
                                  <div class="form-group0">
                                    <input type="checkbox" name="Reducir mi riesgo de enfermedad del coraz&oacute;n o evento vascular cerebral" value="Reducir mi riesgo de enfermedad del coraz&oacute;n o evento vascular cerebral">
                                    <label>Reducir mi riesgo de enfermedad del coraz&oacute;n o evento vascular cerebral</label>
                                </div>
                            </div>
                        </div>
                            <div class="cont-submit4">
                                <a class="submit2" id="sig-mot" value="">&iexcl;Comienza una vida m&aacute;s sana!</a>
                            </div>
                        </div>
                </div>
			<form name="cuestionario" id="motivaciones-form" action="<?php echo site_url()."/motivaciones-dao/";  ?>" method="POST">
				<input type="hidden" value="" id="motivacion1" name="motivacion1">
				<input type="hidden" value="" id="motivacion2" name="motivacion2">
				<input type="hidden" value="" id="motivacion3" name="motivacion3">
			</form>
        </div>
<?php include 'footer-registro.php'; ?>