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
<?php include 'header-registro.php'; ?>

<body >
    <script>
		function subirFoto() {
			document.forms["myform"].submit();
		}
    </script>
    <!--LIGHTBOX START Fact1-->
    <div class="aviso-alto" id="text-fact1-alto">
        <a href="#" class="close"></a>
        <p><strong>Indicaste que tu presión arterial es alta, disminúyela con estos tips.</strong></p>
		<ol>
			<li>Empieza con 15 minutos de caminata todos los días.</li>
			<li>Come alimentos ricos en potasio como el plátano, aguacate o melón.</li>
			<li>Si fumas es importante que lo dejes de inmediato.</li>
			<li>No agregues sal a tus alimentos.</li>
			<li>Acude con tu médico para que te revise la presión y te ayude a tenerla normal.</li>
		</ol>
    </div>
	<div class="aviso-alto" id="text-desconocidog-alto">
        <a href="#" class="close"></a>
        <p><strong>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de glucosa en la sangre.</strong></p>

    </div>

	<div class="aviso-alto" id="text-desconocidopa-alto">
        <a href="#" class="close"></a>
        <p><strong>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de presión arterial. Al conocer tu nivel, puedes prevenir enfermedades cardiacas, eventos vasculares cerebrales y otras enfermedades.</strong></p>

    </div>
	<div class="aviso-alto" id="text-desconocidoc-alto">
        <a href="#" class="close"></a>
        <p><strong>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de colesterol total.</strong></p>

    </div>
	<div class="aviso-alto" id="text-desconocidot-alto">
        <a href="#" class="close"></a>
        <p><strong>Las pruebas de detección son una parte importante de prevención. Acude a tu médico y pide que revise tu nivel de triglicéridos.</strong></p>

    </div>

    <div class="aviso-medio" id="text-fact1-medio">
        <a href="#" class="close"></a>
        <p><strong>Tu presión arterial está por arriba de lo normal, regresa a los rangos saludables siguiendo estos consejos.</strong></p>
		<ol>
			<li>Adopta una frase que te ayude a disminuir tu estrés, por ejemplo: estoy relajado.</li>
			<li>Si tomas café, mejor cámbialo por té, pero no te excedas.</li>
			<li>En las etiquetas de los alimentos, elige las que no contengan sodio o los que tengan poca cantidad.</li>
			<li>Enjuaga los alimentos enlatados para eliminar el sodio que tengan.</li>
			<li>Evita las botanas saldas.</li>
		</ol>
    </div>
    <div class="aviso-bajo" id="text-fact1-bajo">
        <a href="#" class="close"></a>
        <p><strong>Tu presión arterial está dentro de lo saludable para mantenerte así haz lo siguiente:</strong></p>
		<ol>
			<li>Elige aderezos que no contengan sodio.</li>
			<li>No dejes de moverte. Aprovecha cualquier oportunidad para mantenerte activo.</li>
			<li>Evita comer en la calle.</li>
			<li>Recuerda ir con el médico para que te revise tu presión.</li>
			<li>Medita o realiza otra técnica que te ayude a controlar tu estrés.</li>
		</ol>
    </div>
    <!--LIGHTBOX END Fact1-->

    <!--LIGHTBOX START Fact2-->
    <div class="aviso-alto" id="text-fact2-alto">
        <a href="#" class="close"></a>
        <p><strong>Es importante que disminuyas tu nivel de glucosa en la sangre. Sigue estos pasos básicos para empezar:</strong></p>
		<ol>
			<li>Elimina todos los refrescos azucarados de tu vida.</li>
			<li>Limita los dulces, la goma de mascar y otros dulces.</li>
			<li>Mantente activo, por ejemplo sal a bailar.</li>
			<li>Los números cuentan. Revísate periódicamente tu nivel de glucosa.</li>
			<li>Llega a tu peso saludable si tienes sobrepeso u obesidad.</li>
		</ol>
    </div>
    <div class="aviso-medio" id="text-fact2-medio">
        <a href="#" class="close"></a>
		<p><strong>Tus nivel de glucosa está arriba de lo normal, para regresar a la normalidad haz lo siguiente:</strong></p>
		<ol>
			<li>Consume productos de pan que contengan fibra. </li>
			<li>Come espinacas y otros alimentos ricos en magnesio como el aguacate, nueces y otros vegetales verdes.</li>
			<li>Toma un vaso de leche o un yogur bajo en grasa todos los días.</li>
			<li>Muévete. Empieza por caminar cinco cuadras a diario.</li>
			<li>Después de comer haz algo divertido que te haga reír, esto te ayudará a disminuir tus niveles de azúcar.</li>
		</ol>
    </div>
    <div class="aviso-bajo" id="text-fact2-bajo">
        <a href="#" class="close"></a>
        <p><strong>Para mantener en un nivel sano tu nivel de glucosa realiza lo siguiente:</strong></p>
		<ol>
			<li>Pon tus músculos a trabajar. Incluye en tu rutina ejercicios de fortalecimiento.</li>
			<li>No te saltes ninguna comida para mantener tus niveles de glucosa estables.</li>
			<li>Duerme ocho horas a diario.</li>
			<li>Mantén tu peso saludable o baja esos kilitos de más.</li>
			<li>Incluye en tus comidas alimentos como frijoles o lentejas que son ricos en fibra.</li>
		</ol>
    </div>
    <!--LIGHTBOX END Fact2-->

    <!--LIGHTBOX START Fact3-->
    <div class="aviso-alto" id="text-fact3-alto">
        <a href="#" class="close"></a>
        <p><strong>Tienes niveles altos de triglicéridos y riesgo de padecer una enfermedad cardiaca, es muy importante que vayas con tu médico para que te recomiende acciones que te ayuden a prevenir algún padecimiento que ponga en peligro tu salud.</strong></p>
    </div>
    <div class="aviso-medio" id="text-fact3-medio">
        <a href="#" class="close"></a>
        <p><strong>Tus niveles de triglicéridos están fuera de lo normal. Esto podría ponerte en un mayor riesgo de tener una enfermedad del corazón. Acude con tu médico para que juntos armen un plan que te ayude a tener una vida más saludable. </strong></p>
    </div>
    <div class="aviso-bajo" id="text-fact3-bajo">
        <a href="#" class="close"></a>
        <p><strong>Indicaste que tu nivel de triglicéridos está dentro de lo saludable. Mantener tus niveles dentro de lo normal te  ayuda a reducir el riesgo de desarrollar una enfermedad cardíaca. Sigue consumiendo poca azúcar, cuida tu peso y limita o evita las bebidas alcohólicas.</strong></p>
    </div>
    <!--LIGHTBOX END Fact3-->
    <!--LIGHTBOX START Fact4-->
    <div class="aviso-alto" id="text-fact4-alto">
        <a href="#" class="close"></a>
        <p><strong>Necesitas bajar tus niveles de colesterol. Lógralo con estos pasos:</strong></p>
		<ol>
			<li>Sustituye el aceite convencional por el de oliva o canola.</li>
			<li>Elige las variedades con bajo contenido en grasa de leche, yogur y otros productos lácteos.</li>
			<li>Sustituye la carne en tus comidas por otros alimentos.</li>
			<li>Evita comer en la calle o restaurantes.</li>
			<li>Acude con  tu médico para que apoye a controlar tu colesterol.</li>
		</ol>
    </div>
    <div class="aviso-medio" id="text-fact4-medio">
        <a href="#" class="close"></a>
        <p><strong>Reduce tus niveles de colesterol con estos consejos.</strong></p>
		<ol>
			<li>Elije lo bueno. Consume alimentos con grasas sanas como pescado, nueces o aguacate.</li>
			<li>Muévete en cada oportunidad que tengas. Realiza 30 minutos de actividad física al día.</li>
			<li>Después de cocinas la carne enjuágala para que se elimine parte de las grasas.</li>
			<li>Haz que tus comidas tengas más verduras y frutas.</li>
			<li>Revisa tus niveles de colesterol con regularidad.</li>
		</ol>
    </div>
    <div class="aviso-bajo" id="text-fact4-bajo">
        <a href="#" class="close"></a>
        <p><strong>Para que tus niveles de colesterol se mantengan saludables, realiza lo siguiente:</strong></p>
					<ol>
						<li>Sigue está regla, si ves alimentos con grasa en tus comidas, déjalas para el final.</li>
						<li>Si te gusta la comida rápida, come un pedazo en el momento y al siguiente día otra parte.</li>
						<li>Por las mañanas come un cereal rico en fibra.</li>
						<li>Recuerda elegir leche, yogur y quesos bajos en grasa.</li>
						<li>Haz 10 minutos de actividad física tres veces al día.</li>
					</ol>
					</div>
					<!--LIGHTBOX END Fact4-->
					<!--LIGHTBOX START Fact5-->
					<div class="aviso-alto" id="text-fact5-alto">
						<a href="#" class="close"></a>
						<p><strong>Es importante que reduzcas tu peso y circunferencia de cintura. Empieza con estos pasos.</strong></p>
						<ol>
							<li>Lleva un diario de lo que comes durante todo un día. Hazlo por una semana.</li>
							<li>En lugar de hacer 30, haz 45 minutos de caminata al día para perder peso.</li>
							<li>Desayuna todos los días un cereal rico en fibra.</li>
							<li>Come despacio y con calma. Evita ver la televisión cuando comes.</li>
							<li>Toma  agua durante el día en lugar de refrescos o jugos.</li>
						</ol>
					</div>
					<div class="aviso-medio" id="text-fact5-medio">
						<a href="#" class="close"></a>
						<p><strong>Para bajar esos kilitos de más y disminuir la circunferencia de tu cintura haz lo siguiente:</strong></p>
						<ol>
							<li>Evita comer cuando te sientas estresado o ansioso.</li>
							<li>Sube y baja escaleras o ve a caminar cada que tengas la oportunidad de hacerlo.</li>
							<li>Lleva siempre contigo refrigerios saludables como una fruta o un sándwich integral.</li>
							<li>Pide a tus familiares y amigos que te ayuden en tu propósito de perder peso.</li>
							<li>Acude con tu médico para que juntos armen un plan para tener un peso saludable.</li>
						</ol>
					</div>
					<div class="aviso-bajo" id="text-fact5-bajo">
						<a href="#" class="close"></a>
						<p><strong>Mantén un peso saludable con estas recomendaciones.</strong></p>
						<ol>
							<li>Tus comidas deben incluir más frutas y verduras que otros alimentos.</li>
							<li>Si quieres comer un dulce o comida rápida puedes hacerlo, pero con moderación.</li>
							<li>Sigue dando pasos. Mantente activo realizando ejercicio la mayoría de días.</li>
							<li>Aprende a medir las porciones y raciones de tus alimentos.</li>
							<li>Hidrata tu cuerpo con agua en lugar de refrescos o jugos.</li>
							<ol>
								</div>
					<div class="aviso-alto" id="text-muybajoimc-alto">
						<a href="#" class="close"></a>
						<p><strong>Mantén un peso saludable con estas recomendaciones.</strong></p>
						<ol>
							<li>Tus comidas deben incluir más frutas y verduras que otros alimentos.</li>
							<li>Si quieres comer un dulce o comida rápida puedes hacerlo, pero con moderación.</li>
							<li>Sigue dando pasos. Mantente activo realizando ejercicio la mayoría de días.</li>
							<li>Aprende a medir las porciones y raciones de tus alimentos.</li>
							<li>Hidrata tu cuerpo con agua en lugar de refrescos o jugos.</li>
							<ol>
								</div>
								<!--LIGHTBOX END Fact5-->
								<!--LIGHTBOX START Fact6-->
								<div class="aviso-alto" id="text-fact6-alto">
									<a href="#" class="close"></a>
									<p><strong>Para mejorar tu alimentación sigue estos cinco pasos básicos:</strong></p>
									<ol>
										<li>Consume más verduras y frutas. Rétate a consumir dos o tres comidas sin carne cada semana.
										<li>Desayuna. Ten a la mano alimentos que puedas llevar contigo para comer antes de mediodía. 
										<li>Busca los cereales. En lugar del arroz blanco elije el integral.
										<li>Concéntrate en las grasas. Por ejemplo consume aguacate o nueces.
										<li>Mantente delgado con proteínas. Sustituye la carne por otros alimentos en tus comidas.
									</ol>
								</div>
								<div class="aviso-medio" id="text-fact6-medio">
									<a href="#" class="close"></a>
									<p><strong>Para mejorar tu alimentación, debes seguir estos pasos:</strong></p>
									<ol>
										<li>En tus comidas incluye alimentos como arroz, frijoles y aguacate que contienen fibra, lo que ayuda a tu corazón.</li>
										<li>Consume grasas sanas, encuéntralas en las nueces o en el aceite de oliva.</li>
										<li>Deja fuera de tu vida estos productos: la sal, los dulces y postres, las carnes y los lácteos ricos en grasa.</li>
									</ol>
								</div>
								<div class="aviso-bajo" id="text-fact6-bajo">
									<a href="#" class="close"></a>
									<p><strong>Para seguir con una alimentación balanceada haz lo siguiente:</strong></p>
									<ol>
										<li>Recuerda desayunar todos los días.</li>
										<li>En todos tus alimentos incluye frutas y verduras.</li>
										<li>Come cereales, intégralos en tus alimentos.</li>
										<li>Elimina las grasas en tus alimentos.</li>
										<li>Busca otras fuentes de proteínas como frijoles, chicharos y lentejas.</li>
									</ol>
								</div>
								<!--LIGHTBOX END Fact6-->
								<!--LIGHTBOX START Fact7-->
								<div class="aviso-alto" id="text-fact7-alto">
									<a href="#" class="close"></a>
									<p><strong>Controlar tu estrés te ayudará a mejorar tu calidad de vida y cuidar tu corazón, sigue estos cinco pasos básicos.</strong></p>
									<ol>
										<li>Aprende a reconocer los signos de estrés en tu cuerpo y mente. Aprende algunas técnicas para controlarlo como respirar.</li>
										<li>Fortalece tus relaciones con familiares, amigos y compañeros del trabajo.</li>
										<li>Sé agradecido por las cosas que tienes y te rodean.</li>
										<li>Busca un sentido de propósito y significado en tu vida.</li>
										<li>Confía en tus fortalezas y habilidades</li>
									</ol>
								</div>
								<div class="aviso-medio" id="text-fact7-medio">
									<a href="#" class="close"></a>
									<p><strong>Es importante que aprendas cómo manejar tu estrés. Hazlo con estos consejos.</strong></p>
									<ol>
										<li>Lleva un diario. Escribe tus pensamientos y sentimientos.</li>
										<li>Sé paciente. Date tiempo para explorar tus sentimientos y aceptarlos.</li>
										<li>Piensa positivamente. Considera lo que has aprendido de cada  situación difícil.</li>
										<li>Escribe una lista de tus objetivos y tareas pendientes. Dales prioridad.</li>
										<li>Confía en ti mismo. Cree en tu capacidad para manejar los retos de la vida.</li>
									</ol>
								</div>
								<div class="aviso-bajo" id="text-fact7-bajo">
									<a href="#" class="close"></a>
									<p><strong>Tienes tu estrés bajo control, para seguir así incluye estos tips en tu vida.</strong></p>
									<ol>
										<li>Toma tiempo para actividades que disfrutes, como compartir momentos con tu familia o leer.</li>
										<li>El ejercicio en los días de trabajo mejora tu nivel de energía y tu estado de ánimo.</li>
										<li>Aprende algo nuevo. Busca proyectos diferentes a tu trabajo o un curso de algo que te agrade.</li> 
										<li>Sigue disfrutando lo que haces. Tanto en tu vida personal como laboral.</li>
										<li>Da gracias por los beneficios que tienes en tu vida.</li>
									</ol>
								</div>
								<!--LIGHTBOX END Fact7-->
								<!--LIGHTBOX START Fact8-->
								<div class="aviso-alto" id="text-fact8-alto">
									<a href="#" class="close"></a>
									<p><strong>Necesitas realizar actividad física para que tu corazón esté sano, haz lo siguiente:</strong></p>
									<ol>
										<li>Párate y camina. Evita estar mucho tiempo sentado.</li>
										<li>Comienza con 10 minutos si realizas poca actividad física o hace mucho ya no haces.</li>
										<li>Si vas a realizar algún tipo de ejercicio, calienta antes de empezar y utiliza un tiempo para enfriarte después de tu actividad.</li>
										<li>Incluye ejercicios de fortalecimiento en tu rutina. </li>
										<li>Elige actividades que disfrutes.</li>
									</ol>
								</div>
								<div class="aviso-medio" id="text-fact8-medio">
									<a href="#" class="close"></a>
									<p><strong>Necesitas incrementar tu nivel de actividad física. Lógralo con estas ideas:</strong></p>
									<ol>
										<li>Aumenta los minutos que realizas actividad física.</li>
										<li>Si no puedes hacer 30 minutos seguidos de ejercicio. Divídelos en bloques de 10 minutos durante el día.</li>
										<li>Haz una lista de las actividades que te gustan y realízalas.</li>
										<li>Utiliza más las escaleras en lugar del elevador.</li>
									</ol>
								</div>
								<div class="aviso-bajo" id="text-fact8-bajo">
									<a href="#" class="close"></a>
									<p><strong>Tienes un buen nivel de actividad física, para mantenerlo realiza lo siguiente:</strong></p>
									<ol>
										<li>Sigue caminando. Recuerda que cualquier situación es buena para dar algunos pasos.</li>
										<li>Incrementa un poco más los minutos que realizas de actividad física. </li>
										<li>Cambia tu rutina para no aburrirte y seguir ejercitándote. </li>
										<li>Incluye o incrementa los días que realizas entrenamiento de fuerza.</li>
										<li>Sigue disfrutando de la actividad física.</li>
									</ol>
								</div>
								<!--LIGHTBOX END Fact8-->
								<!--LIGHTBOX START Fact9-->
								<div class="aviso-alto" id="text-fact9-alto">
									<a href="#" class="close"></a>
									<p><strong>Necesitas mejorar tu calidad del sueño, hazlo con estos consejos:</strong></p>
									<ol>
										<li>Elimina los pensamientos negativos de tu cabeza.</li>
										<li>Evita ingerir una cena abundante antes de dormir.</li>
										<li>No te duermas durante el día.</li>
										<li>Trata de irte a la cama casi a la misma hora cada noche y trata de levantarte a la misma hora cada mañana.</li>
										<li>Si tienes problemas del sueño acude inmediatamente con tu médico.</li>
									</ol>
								</div>
								<div class="aviso-medio" id="text-fact9-medio">
									<a href="#" class="close"></a>
									<p><strong>Necesitas mejorar tus hábitos de sueño, lógralo con estos tips:</strong></p>
									<ol>
										<li>Lleva un diario de sueño para conocer tus patrones al dormir.</li>
										<li>Evita ver la televisión antes de dormir.</li>
										<li>Evitar el café, el té y otras fuentes de cafeína por la tarde y al comenzar la noche.</li>
										<li>Ve con tu médico si tienes algún  trastorno del sueño.</li>
									</ol>
								</div>
								<div class="aviso-bajo" id="text-fact9-bajo">
									<a href="#" class="close"></a>
									<p><strong>Tienes una buena calidad de sueño para mantenerte así, sigue estas recomendaciones. </strong></p>
									<ol>
										<li>Duerme entre 7 y 8 horas al día.</li>
										<li>Mejora tu rutina para antes de irte a dormir.</li>
										<li>Crea un ambiente silencioso, oscuro y fresco para dormir.</li>
										<li>Evita el café antes de acostarte.</li>
										<li>Acude con tu médico para descartar cualquier problema.</li>
									</ol>
								</div>
								<!--LIGHTBOX END Fact9-->
								<!--LIGHTBOX START Fact10-->
								<div class="aviso-alto" id="text-fact10-alto">
									<a href="#" class="close"></a>
									<p><strong>Dejar de fumar es de gran importancia para evitar cualquier  enfermedad del corazón, lógralo con estos tips:</strong></p>
									<ol>
										<li>Determina cuándo y por qué fumas. Lleva un diario que te ayude a darte cuenta de estos puntos.</li>
										<li>Pon una fecha para dejar de fumar y tira todos tus cigarros antes de ese día.</li>
										<li>Cambia tus rutinas que te hacían fumar.</li>
										<li>Haz un plan para evitar una recaída y que te recuerde los beneficios de dejar de fumar.</li>
										<li>Acude con tu médico para que te apoye a dejar este mal hábito.</li>
										</p>
								</div>
								<div class="aviso-medio" id="text-fact10-medio">
									<a href="#" class="close"></a>
									<p>Te felicitamos por haber dejado de fumar. Sigue por este camino. Si crees que puedes recaer apóyate de tu médico para que juntos armen un plan para evitar esta situación. Además, cambia los hábitos que te hacían fumar, crea estrategias para evitarlos.</p>
								</div>
								<div class="aviso-bajo" id="text-fact10-bajo">
									<a href="#" class="close"></a>
									<p><strong>Al no fumar estás en un menor riesgo de padecer alguna enfermedad del corazón, para seguir así te damos estos pasos:</strong></p>
										<ol>
											<li>Evita estar cerca de la gente que fuma.</li>
											<li>Pide a tus familiares y amigos que no fumen en tu casa.</li>
											<li>Elige sitios donde esté prohibido fumar.</li>
											<li>Coloca letreros de “No fumar” en tu auto.</li>
										</ol>
								</div>
								<!--LIGHTBOX END Fact10-->
								<div class="content-all">
									<div class="bg_perfil">   
									</div>
									<div class="header">
										<div class="wrap">
											<div class="logo3"></div>
											<div class="logo4"></div>
										</div>
									</div>

									<div class="page">
										<div class="slogan"><h2 class="tperfil"><span>Comienza ya tu nuevo </span>plan para sentirte bien.</h2></div>
										<div class="perfil-box">
											<div class="user">
												<h2>Conoce la salud de tu corazón</h2>


												<h3>Este es el primer paso para mejorar tu calidad de vida. <strong>Comparte este resultado con tu médico.</strong> </h3>
												<div class="user-icon" >
													<?php if ( isset( $avatar ) ) { ?>
														<a href="#" style="background:url('<?php echo get_template_directory_uri(); ?>/images/avatar/<?php echo $avatar; ?> ') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;background-size: cover;"></a> 
													<?php } else { ?>
														<a href="#"></a>		
<?php } ?>
												</div>

													<div class="user-info">
														<h4><?php echo $nombre; ?> </h4>
														<!--<input id="enviar" name="enviar" type="submit" value="Cambiar foto" />
														<div class="file">
															<form name="myform" id="myform" enctype="multipart/form-data" method="POST" action="<?php echo site_url() . '/imagen-dao/'; ?>" >
																<input id="uploadImage" class="subir-imagen" name="uploadImage" type="file" />
															</form>  
														</div>
														<a  onclick="subirFoto()" class="cambio">Cargar foto</a> -->
													<div class="file-input-wrapper">
	 												 <button class="btn-file-input">Subir foto</button>
	 												 <input type="file" name="file" onchange="subirFoto()"/>
	                  								</div>	
													</div>
											</div>
											<div class="riesgos-box riesgo-<?php echo $level ?>">
												<h3 class="fecha-evaluacion">Fecha de evaluaci&oacute;n: <?php echo $fecha; ?></h3>
												<h1>Mi corazón está en:</h1>
												<h2>Riesgo <?php echo $level; ?></h2>
<?php if ( $riesgo == 0 ) { ?>
													<p>De acuerdo a lo que respondiste acerca de tus hábitos, tu riesgo de padecer una enfermedad cardiaca es mínimo. Es importante que sigas así y continúes adoptando conductas que te ayuden a llevar una vida sana. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él y juntos crear un plan que beneficie a tu salud. Sigue estos pasos básicos:
													</p>
													<ol>
														<li>No olvides revisar tus niveles de presión arterial, glucosa, colesterol y triglicéridos</li>
														<li>Sigue consumiendo frutas y verduras, limita las grasas</li>
														<li>Muévete por lo menos 30 minutos al día</li>
														<li>Aléjate de las personas que fuman</li>
														<li>Duerme entre 7 a 8 horas al día</li>
													</ol>
<?php } else if ( $riesgo == 1 ) { ?>
													<p>Algunos hábitos están afectando tu salud y ponen en riesgo a tu corazón. Es importante que empieces a tomar acciones que eviten complicaciones a futuro. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él  y juntos crear un plan que beneficie a tu salud. Estos pasos básicos te ayudarán:
													</p>
													<ol>
														<li>Empieza por consumir alimentos más saludables como frutas y verduras</li>
														<li>Revísa periódicamente tus niveles de glucosa, presión arterial, colesterol y triglicéridos</li>
														<li>¡Qué esperas para realizar alguna actividad física! Puedes empezar por caminar 10 minutos al día</li>
														<li>Ten un peso saludable, si tienes “kilitos de más” es momento de bajarlos</li>
														<li>Busca estrategias para reducir tu estrés</li>
													</ol>

												<?php } else if ( $riesgo == 2 ) {
													?>	
													<p>Tus hábitos están afectando a tu corazón y presentas un riesgo elevado de tener alguna complicación. Es importante que empieces a realizar cambios en tu vida para evitar que tu salud se deteriore. Este reporte no trata de sustituir a tu médico, te recomendamos acudir con él  y juntos crear un plan que beneficie a tu salud. Estas recomendaciones te ayudarán a tener una vida sana.
													</p>
													<ol>
														<li>Empieza por consumir alimentos más saludables como frutas y verduras.</li>
														<li>Revísate periódicamente tus niveles de glucosa, presión arterial, colesterol y triglicéridos.</li>
														<li>Camina por lo menos 10 minutos tres veces al día.</li>
														<li>Tener un peso saludable es importante. Acude con un especialista si quieres bajar de peso.</li>
														<li>Si fumas es momento de dejar este mal hábito</li>
														<li>Reduce tu estrés al máximo</li>
													</ol>
												<?php }
												?>
											</div>




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
											<div class="risk-row">
												<div class="risk-box" id="fact1">
													<?php
													if ( !$presion ) {
														echo "<div class='taches'></div><h2 class='i1'>Presión arterial</h2>";
														echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
														echo "<h3>Nivel sano: igual o menor de 120 a 139/80 a 89 mmHg.</h3>";
														echo "<a id='light-desconocidopa-alto'>Detalle</a>";
													} else if ( $presion ) {
														if ( $cps <= 59 && $cpd <= 49 ) {
															echo "<div class='taches'></div><h2 class='i1'>Presión arterial</h2>";
															echo "<h3>Nivel actual: <span class='alto'>" . $cps . "/" . $cpd . "mmHg</span></h3>";
															echo "<h3>Nivel sano: igual o menor de 120 a 139/80 a 89 mmHg.</h3>";
															echo "<a id='light-desconocidopa-alto'>Detalle</a>";
														} else {
															$mylevel;
															if ( $cps <= 139 && $cpd <= 89 ) {
																$mylevel = "bajo";
																$newriesgo = 0;
															} else {
																$mylevel = "alto";
																$newriesgo = 2;
															}
															if ( $newriesgo == 0 ) {
																echo "<div class='paloma'></div>";
															} else if ( $newriesgo == 2 ) {
																echo "<div class='taches'></div>";
															}
															echo "<h2 class='i1'>Presión arterial</h2>";
															echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $cps . "/" . $cpd . "mmHg</span></h3>";
															echo "<h3>Nivel sano: igual o menor de 120 a 139/80 a 89 mmHg.</h3>";
															echo "<a id='light-fact1-{$mylevel}'>Detalle</a>";
														}
													}
													?>

												</div>
												<div class="risk-box" id="fact2">

													<?php
													if ( !$glucosa ) {
														echo "<div class='taches'></div><h2 class='i2'>Glucosa en la sangre</h2>";
														echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
														echo "<h3>Nivel sano: menor de 101 mg/dL.</h3>";
														echo "<a id='light-desconocidog-alto'>Detalle</a>";
														echo "";
													} else if ( $glucosa ) {
														if ( $cglucosa < 70 ) {
															echo "<div class='taches'></div><h2 class='i2'>Glucosa en la sangre</h2>";
															echo "<h3>Nivel actual: <span class='alto'>" . $cglucosa . "mg/dL</span></h3>";
															echo "<h3>Nivel sano: menor de 101 mg/dL.</h3>";
															echo "<a id='light-desconocidog-alto'>Detalle</a>";
															echo "";
														} else {
															$mylevel;
															if ( $cglucosa >= 70 && $cglucosa <= 100 ) {
																$mylevel = "bajo";
																$newriesgo = 0;
															} else if ( ($cglucosa > 100 && $cglucosa <= 125 ) ) {
																$mylevel = "medio";
																$newriesgo = 1;
															} else {
																$mylevel = "alto";
																$newriesgo = 2;
															}
															if ( $newriesgo == 0 ) {
																echo "<div class='paloma'></div>";
															} else if ( $newriesgo == 2 ) {
																echo "<div class='taches'></div>";
															}
															echo "<h2 class='i2'>Glucosa en la sangre</h2>";
															echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $cglucosa . "mg/dL</span></h3>";
															echo "<h3>Nivel sano: menor de 101 mg/dL.</h3>";
															echo "<a id='light-fact2-{$mylevel}'>Detalle</a>";
														}
													}
													?>


												</div>
												<div class="risk-box" id="fact3">

													<?php
													if ( !$trigliceridos ) {
														echo "<div class='taches'></div><h2 class='i3'>Triglicéridos</h2>";
														echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
														echo "<h3>Nivel sano: menor de 150 mg/dL.</h3>";
														echo "<a id='light-desconocidot-alto'>Detalle</a>";
														echo "";
													} else if ( $trigliceridos ) {
														if ( $ctrigliceridos < 50 ) {
															echo "<div class='taches'></div><h2 class='i3'>Triglicéridos</h2>";
															echo "<h3>Nivel actual: <span class='alto'>" . $ctrigliceridos . "mg/dL</span></h3>";
															echo "<h3>Nivel sano: menor de 150 mg/dL.</h3>";
															echo "<a id='light-desconocidot-alto'>Detalle</a>";
															echo "";
														} else {
															$mylevel;
															if ( $ctrigliceridos <= 199 && $ctrigliceridos >= 50 ) {
																$mylevel = "bajo";
																$newriesgo = 0;
															} else {
																$mylevel = "alto";
																$newriesgo = 2;
															}
															if ( $newriesgo == 0 ) {
																echo "<div class='paloma'></div>";
															} else if ( $newriesgo == 2 ) {
																echo "<div class='taches'></div>";
															}
															echo "<h2 class='i3'>Triglicéridos</h2>";
															echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $ctrigliceridos . "mg/dL</span></h3>";
															echo "<h3>Nivel sano: menor de 150 mg/dL.</h3>";
															echo "<a id='light-fact3-{$mylevel}'>Detalle</a>";
														}
													}
													/*
													  <div class="risk-box" id="fact5">
													  <h2>Peso (IMC)</h2>
													  <h3>IMC: <span class="bajo">19</span></h3>
													  <h3>Nivel sano: 19 a 24.9</h3>
													  <a id="light-fact5-bajo">Detalle</a>
													  </div>
													  <div class="risk-box" id="fact6">
													  <h2>Nutrición</h2>
													  <h3>Raciones actuales: <span class="alto">2</span></h3>
													  <h3>Raciones recomendadas: 5 o más</h3>
													  <a  id="light-fact6-alto">Detalle</a>
													  </div>
													 * 
													 * 								 */
													?>
												</div>
											</div>

											<div class="risk-row">
												<div class="risk-box" id="fact4">
													<?php
													if ( !$colesterol ) {
														echo "<div class='taches'></div><h2 class='i4'>Colesterol</h2>";
														echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
														echo "<h3>Nivel sano: menor de 200 mg/dL.</h3>";
														echo "<a id='light-desconocidoc-alto'>Detalle</a>";
														echo "";
													} else if ( $colesterol ) {
														if($cc <100){
														echo "<div class='taches'></div><h2 class='i4'>Colesterol</h2>";
														echo "<h3>Nivel actual: <span class='alto'>" . $cc . "mg/dL</span></h3>";
														echo "<h3>Nivel sano: menor de 200 mg/dL.</h3>";
														echo "<a id='light-desconocidoc-alto'>Detalle</a>";
														echo "";
														}else{
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
														if ( $newriesgo == 0 ) {
															echo "<div class='paloma'></div>";
														} else if ( $newriesgo == 2 ) {
															echo "<div class='taches'></div>";
														}
														echo "<h2 class='i4'>Colesterol</h2>";
														echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $cc . "mg/dL</span></h3>";
														echo "<h3>Nivel sano: menor de 200 mg/dL.</h3>";
														echo "<a id='light-fact4-{$mylevel}'>Detalle</a>";
														}
													}
													?>
												</div>
												<div class="risk-box" id="fact5">
													<?php
													$mylevel;
													if ( $imc < 19 ) {
														echo "<h2 class='i5'>Peso y cintura (IMC)</h2>";
													echo "<h3>IMC actual: <span class='alto'>" . $imc . " </span></h3>";
													echo "<h3>Nivel sano: IMC de 19 a 24.9 (peso sano)</h3>";
													echo "<a id='light-muybajoimc-alto'>Detalle</a>";
														
													}else{
														if($imc < 25 ){
														$mylevel = "bajo";
														$newriesgo = 0;
													} else if ( ($imc >= 25 && $imc < 30 ) ) {
														$mylevel = "medio";
														$newriesgo = 1;
													} else {
														$mylevel = "alto";
														$newriesgo = 2;
													}
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i5'>Peso y cintura (IMC)</h2>";
													echo "<h3>IMC actual: <span class='" . $mylevel . "'>" . $imc . " </span></h3>";
													echo "<h3>Nivel sano: IMC de 19 a 24.9 (peso sano)</h3>";
													echo "<a id='light-fact5-{$mylevel}'>Detalle</a>";
													}
													?>

												</div>
												<div class="risk-box" id="fact6">
													<?php
													$mylevel;
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
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i6'>Nutrición</h2>";
													echo "<h3>Raciones actuales: <span class='" . $mylevel . "'>" . $rtot . "</span></h3>";
													echo "<h3>Nivel sano: 5 raciones de frutas y verduras o más</h3>";
													echo "<a id='light-fact6-{$mylevel}'>Detalle</a>";
													?>


												</div>

											</div>
											<div class="risk-row">
												<div class="risk-box" id="fact7">
													<?php
													$mylevel;
													if ( $nestres < 3 ) {
														$mylevel = "bajo";
														$newriesgo = 0;
													} else if ( ($nestres > 2) && $nestres < 4 ) {
														$mylevel = "medio";
														$newriesgo = 1;
													} else {
														$mylevel = "alto";
														$newriesgo = 2;
													}
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i7'>Estrés</h2>";
													echo "<h3>Nivel: <span class='" . $mylevel . "'>" . $nestres . "</span></h3>";
													echo "<h3>Nivel sano: 1 - 2: Adopta técnicas para controlar el estrés.</h3>";
													echo "<a id='light-fact7-{$mylevel}'>Detalle</a>";
													?>

												</div>
												<div class="risk-box" id="fact8">
													<?php
													$mylevel;
													$mensaje;
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
														$newriesgo = 0;
													} else if ( ($afisicas < 5) && $afisicas >= 3 ) {
														$mylevel = "medio";
														$newriesgo = 1;
													} else {
														$mylevel = "alto";
														$newriesgo = 2;
													}
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i8'>Actividad física</h2>";
													echo "<h3>Minutos: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
													echo "<h3>Nivel sano: tu objetivo semanal es realizar más de 120 minutos por semana.</h3>";
													echo "<a id='light-fact8-{$mylevel}'>Detalle</a>";
													?>
												</div>
												<div class="risk-box" id="fact10">
													<?php
													$mylevel;
													$mensaje;
													$ftot = $fumas1 + $fumas2;
													if ( $fumas ) {
														$mensaje = "Si";
														$mylevel = "alto";
														$newriesgo = 2;
													} else {
														$mensaje = "No";
														$mylevel = "bajo";
														$newriesgo = 0;
													}
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i10'>Tabaquismo</h2>";
													echo "<h3>Fumas: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
													echo "<h3>Nivel sano: no utilices productos con tabaco y evita el humo de segunda mano.</h3>";
													echo "<a id='light-fact10-{$mylevel}'>Detalle</a>";
													?>

												</div>

											</div>
											<div class="risk-row last">
												<div class="risk-box" id="fact9">
													<?php
													$mylevel;
													$mensaje = "";
													if ( $hsueno == 2 ) {
														$mensaje = " 7 a 9 horas";
														$mylevel = "bajo";
														$newriesgo = 0;
													} else if ( $hsueno == 1 ) {
														$mensaje = "Menos de 7 horas";
														$mylevel = "alto";
														$newriesgo = 2;
													} else if ( $hsueno == 3 ) {
														$mensaje = "M&aacute;s de 9 horas";
														$mylevel = "alto";
														$newriesgo = 2;
													}
													if ( $newriesgo == 0 ) {
														echo "<div class='paloma'></div>";
													} else if ( $newriesgo == 2 ) {
														echo "<div class='taches'></div>";
													}
													echo "<h2 class='i9'>Sueño</h2>";
													echo "<h3>Nivel: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
													echo "<h3>Nivel sano:  Entre 7 y 9 horas</h3>";
													echo "<a id='light-fact9-{$mylevel}'>Detalle</a>";
													?>

												</div>
												<div class="risk-box">

													<?php
													$myvar;
													$bandera;

													if ( $fam ) {
														$bandera = true;
														$myvar = "Presentes </span></h3> <h3>Marcaste que presentas antecedentes heredofamiliares que pueden influir en tu salud cardiovascular.</h3>";
													} else {
														$bandera = false;
														$myvar = "No presentes </span></h3> <h3>Marcaste que no presentas antecedentes heredofamiliares que pueden influir en tu salud cardiovascular.</h3>";
													}
													?>
													<h2 class="i11">Padecimientos<br/> heredofamiliares</h2>
													<h3><span class="<?php
													if ( $bandera ) {
														echo "alto";
													} else {
														echo "bajo";
													}
													?>"><?php echo $myvar ?>

															</div>


															</div>
															<div class="motivaciones-row">
														<?php
														try {
															$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
															$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
															$sql = "Select motivation1,motivation2,motivation3 from wp_usersmotivation where user_id={$id}"
																	. " LIMIT 1";
															$rs = $conn->prepare( $sql );
															$rs->execute();
															$rs2 = $rs->fetchAll();
															if ( isset( $rs2[0]['motivation1'] ) ) {
																$motivation1 = $rs2[0]['motivation1'];
																$motivation2 = $rs2[0]['motivation2'];
																$motivation3 = $rs2[0]['motivation3'];
															}
														} catch ( PDOException $e ) {
															echo "ERROR: " . $e->getMessage();
															die();
														}
														?>




																<h2>¡Recuerda tus motivaciones!</h2>
																<label><?php echo $motivation1; ?></label>
																<label><?php echo $motivation2; ?></label>
																<label><?php echo $motivation3; ?></label>
															</div>
															<div class="cont-submit5">
																<a href="/home-page/" class="submit2">&iexcl;Comienza una vida más sana!</a>
																<a  href="<?php echo site_url() . "/perfil-impresion"; ?>" id='printer' class="imprimir">Imprimir</a>
															</div>
															<div class="visitanos"><p>Encuentra más información, consejos y recetas para llevar una vida saludable en nuestro sitio <span>www.micorazonsaludable.com</span></p></div>
<?php include 'footer-registro.php'; ?>