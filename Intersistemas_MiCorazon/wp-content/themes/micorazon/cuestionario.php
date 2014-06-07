<?php
/*
  @package micorazon
  Template Name: cuestionario
 */

if ( !is_user_logged_in() ) {
	header( "Location: " . site_url() . "/login" );
}
$current_user = wp_get_current_user();
$id=$current_user->ID;
?>
<?php include 'header-registro.php'; ?>
<body >
	<div class="aviso1" id="aviso1">
		<a href="#" class="close"></a>
		<p>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de presión arterial. Al conocer tu nivel, puedes prevenir enfermedades cardiacas, eventos vasculares cerebrales  y otras enfermedades.</p>
	</div>
	<div class="aviso1" id="aviso2">
		<a href="#" class="close"></a>
		<p>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de colesterol total.</p>
	</div>
	<div class="aviso1" id="aviso3">
		<a href="#" class="close"></a>
		<p>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de triglicéridos.</p>
	</div>
        <div class="aviso1" id="aviso4">
		<a href="#" class="close"></a>
		<p>Debes seleccionar una opción por cada pregunta.</p>
	</div>
    <div class="aviso1" id="aviso5">
		<a href="#" class="close"></a>
		<p>Si conoces tus cifras, los campos no pueden estar vacios.</p>
	</div>
     <div class="aviso1" id="aviso6">
		<a href="#" class="close"></a>
		<p>Solo puedes ingresar valores numéricos.</p>
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

				<h3 >¿Cómo afectan tus hábitos a tu corazón?</h3>
				<h4>Evalúa tus hábitos y conoce que impacto tienen en tu salud cardiovascular.</h4>
				<!--INICIA PASO1-->
				<form name="cuestionario" action="<?php echo site_url()."/cuestionario-dao/";  ?>" method="POST">
					<div id="tabs">
						<ul style="" >
            <li><a href="#fragment-1"><span>One</span></a></li>
            <li><a href="#fragment-2"><span>Two</span></a></li>
            <li><a href="#fragment-3"><span>Three</span></a></li>
			<li><a href="#fragment-4"><span>Four</span></a></li>
        </ul>
						<div id="fragment-1">
							<div class="paso-1"></div>
							<h5>Información personal:</h5>
							<div class="form-group4">
								<label>¿Conoces tus cifras de presión arterial?</label>
								<div class="customui">
									<input name="presion" type="radio" id="presion-no"  value="0" /><label for="presion-no" class="radie">No</label>
									<input name="presion" type="radio" id="presion-si"  value="1" />
									<label for="presion-si" class="radie">Sí</label>
									<div class="si-value" id="presion-value">
										<input type="text" name="cifra-presion-sistolico" id="cifra-presion-sistolico" value="" class="field3" /><span>sistólico</span>  <input type="text" name="cifra-presion-diastolico" id="cifra-presion-diastolico" value="" class="field3" /><span>diastólico</span>
									</div>
									<div class="alert1" id="alert-presion">
										*Campo obligatorio
									</div>
								</div>
							</div>
							<div class="form-group4">
								<label>¿Conoces tu nivel de glucosa en sangre?</label>
								<div class="customui">
									<input name="glucosa" type="radio" id="glucosa-no"  value="0" /><label for="glucosa-no" class="radie">No</label>
									<input name="glucosa" type="radio" id="glucosa-si"  value="1" /><label for="glucosa-si" class="radie">Sí</label>
									<div class="si-value" id="glucosa-value">
										<input type="text" name="cifra-glucosa" value="" class="field3" id="cifra-glucosa" /><span>mg/dL</span>
									</div>
									<div class="alert1" id="alert-glucosa">
										*Campo obligatorio
									</div>
								</div>
							</div>
							<div class="form-group4">
								<label>¿Conoces tu nivel de triglicéridos en sangre?</label>
								<div class="customui">
									<input name="trigliceridos" type="radio" id="trigliceridos-no"  value="0" /><label for="trigliceridos-no" class="radie">No</label>
									<input name="trigliceridos" type="radio" id="trigliceridos-si"  value="1" /><label for="trigliceridos-si" class="radie">Sí</label>
									<div class="si-value" id="trigliceridos-value">
										<input type="text" name="cifra-trigliceridos" value="" class="field3" id="cifra-trigliceridos" /><span>mg/dL</span>
									</div>
									<div class="alert1" id="alert-trigliceridos">
										*Campo obligatorio
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="cal-imc">
									<h2>Índice de masa corporal (IMC)</h2>
									<div class="form-group">
										<label>Anota tu peso (kg):</label>
                                                                                <input type="text" name="peso" id="peso" value="" placeholder="65"  class="field" />
									</div>
									<div class="form-group">
										<label>Anota tu estatura (cm):</label>
										<input type="text" name="altura" id="altura" value="" placeholder="170"  class="field" />
									</div>
									<div class="form-group0">
										<div class="imc-result" id="res">
											IMC:
										</div>
										
									</div>
								</div>
								<div class="alert2" id="alert-imc">
									*Campos obligatorios
								</div>
							</div>
							<div class="cont-submit3">
								<a  class="submit2 " id="sig1x">Siguiente</a>
							</div>
						</div>
						<div id="fragment-2"  >
							<div class="paso-2"></div>
							<h5>Tu alimentación:</h5>
							<div class="form-group4">
								<label>¿Cuántas raciones de fruta ingieres en un día?</label>
								<select name="raciones-fruta" class="default"  id="raciones-fruta" style="width: 220px;">
									<option value="">Selecciona</option>
									<option value="0">Ninguna</option>
									<option value="1">Una</option>
									<option value="2">Dos</option>
									<option value="3">Tres</option>
									<option value="4">Cuatro</option>
									<option value="5">Cinco</option>
									<option value="6">Seis</option>
									<option value="7">Siete</option>
									<option value="8">Ocho</option>
									<option value="9">Nueve</option>
									<option value="10">Diez o más</option>
								</select>
								<div class="alert1" id="alert-fruta">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Cuántas raciones de verduras ingieres en un día?</label>
								<select name="raciones-verdura" class="default"  id="raciones-verdura" style="width: 220px;">
									<option value="">Selecciona</option>
									<option value="0">Ninguna</option>
									<option value="1">Una</option>
									<option value="2">Dos</option>
									<option value="3">Tres</option>
									<option value="4">Cuatro</option>
									<option value="5">Cinco</option>
									<option value="6">Seis</option>
									<option value="7">Siete</option>
									<option value="8">Ocho</option>
									<option value="9">Nueve</option>
									<option value="10">Diez o más</option>
								</select>
								<div class="alert1" id="alert-verdura">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Con qué frecuencia consume alimentos fritos capeados o empanizados?</label>
								<select name="frecuencia-empanizado" class="default"  id="frecuencia-empanizado" style="width: 220px;">
									<option value="">Selecciona</option>
									<option value="1">Todos los días</option>
									<option value="2">Más de 3 veces a la semana</option>
									<option value="3">2 a 3 veces al mes</option>
									<option value="4">Ocasionalmente</option>
									<option value="5">Nunca </option>
								</select>
								<div class="alert1" id="alert-empanizado">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Con qué frecuencia consumes bebidas azucaradas incluyendo refrescos "normales" (que no sean de light)<br/> y jugos comerciales?</label>
								<select name="frecuencia-azucaradas" class="default"  id="frecuencia-azucaradas" style="width: 220px;">
									<option value="">Selecciona</option>
									<option value="1">Todos los días</option>
									<option value="2">Más de 3 veces a la semana</option>
									<option value="3">2 a 3 veces al mes</option>
									<option value="4">Ocasionalmente</option>
									<option value="5">Nunca </option>
								</select>
								<div class="alert1" id="alert-azucaradas">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Añades sal a los alimentos?</label>
								<select name="frecuencia-sal" class="default"  id="frecuencia-sal" style="width: 220px;">
									<option value="">Selecciona</option>
									<option value="1">Sí</option>
									<option value="2">Ocasionalmente</option>
									<option value="3">No</option>
								</select>
								<div class="alert1" id="alert-sal">
									*Campo obligatorio
								</div>
							</div>
							<div class="cont-submit3">
								<a  class="submit2 nexttab" id="sig2">Siguiente</a>
							</div>
						</div>
						<div id="fragment-3"  >
							<div class="paso-3"></div>
							<h5>Nivel de estrés y hábitos personales:</h5>
							<div class="form-group4">
								<label>¿Cómo clasificarías tu nivel de estrés? (Donde 1 es el número menor y 5 es el mayor nivel de estrés).</label>
								<select name="nivel-estres" class="default"  id="nivel-estres" style="width: 260px;">
									<option value="">Selecciona</option>
									<option value="1">1 (nivel más bajo)</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5(nivel más elevado)</option>
								</select>
								<div class="alert1" id="alert-nivel-estres">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Cuántas veces a la semana realizas actividades físicas moderadas a vigorosas?</label>
								<select name="actividades-fisicas" class="default"  id="actividades-fisicas" style="width: 260px;">
									<option value="">Selecciona</option>
									<option value="1">No realizo actividad alguna</option>
									<option value="2">Menos de 30 minutos a la semana</option>
									<option value="3">De 30 a 69 minutos a la semana</option>
									<option value="4">De 70 a 109 minutos a la semana</option>
									<option value="5">De 110 a 149 minutos a la semana</option>
									<option value="6">150 minutos o más a la semana</option>
								</select>
								<div class="alert1" id="alert-actividades-fisicas">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>En un día promedio, ¿cuántas horas duermes?</label>
								<select name="hora-sueno" class="default"  id="hora-sueno" style="width: 260px;">
									<option value="">Selecciona</option>
									<option value="1">Menos de 7 horas</option>
									<option value="2">Entre 7 y 9 horas</option>
									<option value="3">Más de 9 horas</option>
								</select>
								<div class="alert1" id="alert-hora-sueno">
									*Campo obligatorio
								</div>
							</div>
							<div class="cont-submit3">
								<a  class="submit2 nexttab" id="sig3">Siguiente</a>
							</div>
						</div>
						<div id="fragment-4">
							<div class="paso-4"></div>
							<h5>Hábitos personales e historial familiar</h5>
							<div class="form-group4">
								<label>¿Fumas?</label>
								<div class="customui">
									<input name="fumas" type="radio" id="fumas-no"  value="0" /><label for="fumas-no" class="radie">No</label>
									<input name="fumas" type="radio" id="fumas-si"  value="1" />
									<label for="fumas-si" class="radie">Sí</label>
									<div class="si-value" id="fumas-value">
										<select name="frecuencia-fumas" class="default"  id="frecuencia-fumas" style="width: 176px;">
											<option value="">Frecuencia</option>
											<option value="1">Ocasionalmente </option>
											<option value="2">La mayoría de los días</option>
											<option value="3">Todos los días</option>
										</select>
									</div>
									<div class="alert1" id="alert-fumas">
										*Campo obligatorio
									</div>
								</div>
							</div>
							<div class="form-group4 hide" id="cigarros-diarios">
								<label>Indica la cantidad de cigarros que fumas regularmente en un día</label>
								<select name="frecuencia-fumas2" class="default"  id="frecuencia-fumas2" style="width: 176px;">
									<option value="">Frecuencia</option>
									<option value="1">Uno</option>
									<option value="2">Dos a cuatro</option>
									<option value="3">5 o más</option>
								</select>
								<div class="alert1" id="alert-fumas">
									*Campo obligatorio
								</div>
							</div>
							<div class="form-group4">
								<label>¿Algún familiar directo (padres o abuelos) han  padecido infarto al corazón o accidente vascular cerebral (trombosis o hemorragia) antes de los 55 años de edad?</label>
								<div class="customui">
									<input name="familiar-directo" type="radio" id="familiar-directo-no"  value="0" /><label for="familiar-directo-no" class="radie">No</label>
									<input name="familiar-directo" type="radio" id="familiar-directo-si"  value="1" />
									<label for="familiar-directo-si" class="radie">Sí</label>
									<div class="alert1" id="alert-familiar-directo">
										*Campo obligatorio
									</div>
								</div>
							</div>
							<div class="form-group4 hide" id="familiar-directo">
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="familiar-tabla">
									<tr>
										<th class="desc">&nbsp;</th>
										<th class="pad">Padre</th>
										<th class="pad">Madre</th>
										<th class="pad">Abuelo paterno</th>
										<th class="pad">Abuela paterna</th>
										<th class="pad">Abuelo materno</th>
										<th class="pad">Abuela materna</th>
									</tr>
									<tr>
										<td>Cardiopatías</td>
										<td class="pad"><input name="padre-cardio" type="checkbox" id="padre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="madre-cardio" type="checkbox" id="madre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="apb-cardio" type="checkbox" id="abp-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abap-cardio" type="checkbox" id="abap-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abm-cardio" type="checkbox" id="abm-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abam-cardio" type="checkbox" id="abam-cardio"  value="1" class="checkx" /></td>
									</tr>
									<tr>
										<td>Evento vascular cerebral </td>
										<td class="pad"><input name="padre-evc" type="checkbox" id="padre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="madre-evc" type="checkbox" id="madre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="apb-evc" type="checkbox" id="abp-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abap-evc" type="checkbox" id="abap-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abm-evc" type="checkbox" id="abm-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abam-evc" type="checkbox" id="abam-cardio"  value="1" class="checkx" /></td>
									</tr>
									<tr>
										<td>Infarto miocardio</td>
										<td class="pad"><input name="padre-miocardio" type="checkbox" id="padre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="madre-miocardio" type="checkbox" id="madre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="apb-miocardio" type="checkbox" id="abp-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abap-miocardio" type="checkbox" id="abap-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abm-miocardio" type="checkbox" id="abm-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abam-miocardio" type="checkbox" id="abam-cardio"  value="1" class="checkx" /></td>
									</tr>
									<tr>
										<td>Ataque cardiaco súbito</td>
										<td class="pad"><input name="padre-acs" type="checkbox" id="padre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="madre-acs" type="checkbox" id="madre-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="apb-acs" type="checkbox" id="abp-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abap-acs" type="checkbox" id="abap-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abm-acs" type="checkbox" id="abm-cardio"  value="1" class="checkx" /></td>
										<td class="pad"><input name="abam-acs" type="checkbox" id="abam-cardio"  value="1" class="checkx" /></td>
									</tr>
								</table>
							</div>
							<div class="cont-submit3">
								<input type="submit" class="submit2" value="Siguiente"/>
							</div>
						</div>
					</div>
				</form>
				<?php include 'footer-registro.php'; ?>