<?php
/*
  @package micorazon
  Template Name: Motivaciones
 */

if ( !is_user_logged_in() ) {
	header( "Location: " . site_url() . "/login" );
}
?>
<?php include 'header-registro.php'; ?>
<body >
        <div class="aviso1" id="aviso1">
            <a href="#" class="close"></a>
            <p>Evalúa tus hábitos y conoce que impacto tienen en tu salud cardiovascular.</p>
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
            <form name="cuestionario" action="<?php echo site_url()."/motivaciones-dao/";  ?>" method="POST">
                <div class="page">
                    <div class="registro-box">
                        <h3 >Por último, selecciona 3 motivaciones por las<br/> cuales quieres tener un vida más saludable</h3>
                        <!--INICIA PASO1-->
                        <div class="motivaciones">
                             <div class="form-group5">
                                 <span>1.-</span>
									 <select name="motivacion1" class="default" id="motivacion1" style="width:780px; ">
										 <option value="0" selected="selected">Selecciona</option>
										 <option value="Verme mejor">Verme mejor</option>
										 <option value="Mejorar mi resistencia física">Mejorar mi resistencia física</option>
										 <option value="Comer sanamente">Comer sanamente</option>
										 <option value="Dejar de fumar">Dejar de fumar</option>
										 <option value="Mejorar mis niveles de colesterol">Mejorar mis niveles de colesterol</option>
										 <option value="Prevenir o manejar la diabetes">Prevenir o manejar la diabetes</option>
										 <option value="Aumentar mi energía">Aumentar mi energía</option>
										 <option value="Mejorar mi autoimagen y autoconfianza">Mejorar mi autoimagen y autoconfianza</option>
										 <option value="Reducir el estrés y la ansiedad">Reducir el estrés y la ansiedad</option>
										 <option value="Mejorar mis expectativas de vida">Mejorar mis expectativas de vida</option>
										 <option value="Mejorar mi calidad de vida">Mejorar mi calidad de vida</option>
										 <option value="Aumentar mi esperanza de vida">Aumentar mi esperanza de vida</option>
										 <option value="Sentirme mejor conmigo mismo">Sentirme mejor conmigo mismo</option>
										 <option value="Sentirme más sano">Sentirme más sano</option>
										 <option value="Sentir que tengo más control sobre mi vida">Sentir que tengo más control sobre mi vida</option>
										 <option value="Ser un ejemplo a seguir para mi familia">Ser un ejemplo a seguir para mi familia</option>
										 <option value="Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral">Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral</option>
										 <option value="Manejar mi enfermedad cardiaca">Manejar mi enfermedad cardiaca</option>
										 <option value="Aumentar mi capacidad pulmonar">Aumentar mi capacidad pulmonar</option>
										 <option value="Prevenir la hipertensión">Prevenir la hipertensión</option>
										 <option value="Reducir mi presión sanguínea">Reducir mi presión sanguínea</option>
										 <option value="Mejorar mi sistema inmune">Mejorar mi sistema inmune</option>
							</select>
                             </div>
                            <div class="form-group5">
                                 <span>2.-</span><select name="motivacion2" class="default" id="motivacion2" style="width:780px;" >
										 <option value="0" selected="selected">Selecciona</option>
										 <option value="Verme mejor">Verme mejor</option>
										 <option value="Mejorar mi resistencia física">Mejorar mi resistencia física</option>
										 <option value="Comer sanamente">Comer sanamente</option>
										 <option value="Dejar de fumar">Dejar de fumar</option>
										 <option value="Mejorar mis niveles de colesterol">Mejorar mis niveles de colesterol</option>
										 <option value="Prevenir o manejar la diabetes">Prevenir o manejar la diabetes</option>
										 <option value="Aumentar mi energía">Aumentar mi energía</option>
										 <option value="Mejorar mi autoimagen y autoconfianza">Mejorar mi autoimagen y autoconfianza</option>
										 <option value="Reducir el estrés y la ansiedad">Reducir el estrés y la ansiedad</option>
										 <option value="Mejorar mis expectativas de vida">Mejorar mis expectativas de vida</option>
										 <option value="Mejorar mi calidad de vida">Mejorar mi calidad de vida</option>
										 <option value="Aumentar mi esperanza de vida">Aumentar mi esperanza de vida</option>
										 <option value="Sentirme mejor conmigo mismo">Sentirme mejor conmigo mismo</option>
										 <option value="Sentirme más sano">Sentirme más sano</option>
										 <option value="Sentir que tengo más control sobre mi vida">Sentir que tengo más control sobre mi vida</option>
										 <option value="Ser un ejemplo a seguir para mi familia">Ser un ejemplo a seguir para mi familia</option>
										 <option value="Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral">Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral</option>
										 <option value="Manejar mi enfermedad cardiaca">Manejar mi enfermedad cardiaca</option>
										 <option value="Aumentar mi capacidad pulmonar">Aumentar mi capacidad pulmonar</option>
										 <option value="Prevenir la hipertensión">Prevenir la hipertensión</option>
										 <option value="Reducir mi presión sanguínea">Reducir mi presión sanguínea</option>
										 <option value="Mejorar mi sistema inmune">Mejorar mi sistema inmune</option>
							</select>
                             </div>
                            <div class="form-group5">
                                 <span>2.-</span><select name="motivacion3" class="default" id="motivacion3" style="width:780px; ">
										 <option value="0" selected="selected">Selecciona</option>
										 <option value="Verme mejor">Verme mejor</option>
										 <option value="Mejorar mi resistencia física">Mejorar mi resistencia física</option>
										 <option value="Comer sanamente">Comer sanamente</option>
										 <option value="Dejar de fumar">Dejar de fumar</option>
										 <option value="Mejorar mis niveles de colesterol">Mejorar mis niveles de colesterol</option>
										 <option value="Prevenir o manejar la diabetes">Prevenir o manejar la diabetes</option>
										 <option value="Aumentar mi energía">Aumentar mi energía</option>
										 <option value="Mejorar mi autoimagen y autoconfianza">Mejorar mi autoimagen y autoconfianza</option>
										 <option value="Reducir el estrés y la ansiedad">Reducir el estrés y la ansiedad</option>
										 <option value="Mejorar mis expectativas de vida">Mejorar mis expectativas de vida</option>
										 <option value="Mejorar mi calidad de vida">Mejorar mi calidad de vida</option>
										 <option value="Aumentar mi esperanza de vida">Aumentar mi esperanza de vida</option>
										 <option value="Sentirme mejor conmigo mismo">Sentirme mejor conmigo mismo</option>
										 <option value="Sentirme más sano">Sentirme más sano</option>
										 <option value="Sentir que tengo más control sobre mi vida">Sentir que tengo más control sobre mi vida</option>
										 <option value="Ser un ejemplo a seguir para mi familia">Ser un ejemplo a seguir para mi familia</option>
										 <option value="Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral">Reducir mi riesgo de enfermedad del corazón o evento vascular cerebral</option>
										 <option value="Manejar mi enfermedad cardiaca">Manejar mi enfermedad cardiaca</option>
										 <option value="Aumentar mi capacidad pulmonar">Aumentar mi capacidad pulmonar</option>
										 <option value="Prevenir la hipertensión">Prevenir la hipertensión</option>
										 <option value="Reducir mi presión sanguínea">Reducir mi presión sanguínea</option>
										 <option value="Mejorar mi sistema inmune">Mejorar mi sistema inmune</option>
							</select>
                             </div>
                        </div>
                            <div class="cont-submit4">
                                <input type="submit" class="submit2" id="sig-mot" value="&iexcl;Comienza una vida m&aacute;s sana!"/>
                            </div>
                        </div>
                </div>
            </form>
        </div>
<?php include 'footer-registro.php'; ?>