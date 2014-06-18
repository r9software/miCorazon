
<?php
/*
  @package micorazon
  Template Name: Perfil
 */
if (!is_user_logged_in()) {
    header("Location: " . site_url() . "/login");
}
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
$hsueno;
$fumas;
$fam;
try {
    $conn = new PDO('mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Select riesgo,nombre,apaterno,amaterno,avatar from wp_usersinfo where user_id={$id}"
            . " LIMIT 1";
    $rs = $conn->prepare($sql);
    $rs->execute();
    $rs2 = $rs->fetchAll();
    if (isset($rs2[0]['riesgo'])&& !empty($rs2[0]['riesgo'])) {
        $riesgo = $rs2[0]['riesgo'];
        $nombre = $rs2[0]['nombre'] . " " . $rs2[0]['apaterno'] . " " . $rs2[0]['amaterno'];
        $avatar = $rs2[0]['avatar'];

        if ($riesgo == 1) {
            $level = "medio";
        } else if ($riesgo == 0) {
            $level = "bajo";
        } else if ($riesgo == 2) {
            $level = "alto";
        } 
    } else {
        header("Location:" . site_url() . "/cuestionario/");
    }
} catch (PDOException $e) {
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
        <p>Ve con tu médico para que juntos hagan un plan que te ayude a que tu presión arterial no se vuelva un problema; pero si ya lo es, él puede decirte cómo mantener controlada la hipertensión. El éxito está en los cambios que adoptes en tu estilo de vida y el plan que te recomiende tu doctor. </p>
    </div>
    <div class="aviso-medio" id="text-fact1-medio">
        <a href="#" class="close"></a>
        <p>Según tus resultados, estás en riesgo de padecer presión alta o ya la padeces. Es importante implementar cambios en tu estilo de vida: perder peso, dejar de fumar, llevar una dieta baja en sal y grasas, limitar el consumo excesivo de alcohol y aumentar el ejercicio.</p>
    </div>
    <div class="aviso-bajo" id="text-fact1-bajo">
        <a href="#" class="close"></a>
        <p>Tus niveles de presión arterial son buenos, sigue así, pero no olvides ir con tu médico para realizarte mediciones periódicas. ¡Estás en buen camino! No corres algún riesgo de padecer hipertensión si mantienes hábitos saludables.</p>
    </div>
    <!--LIGHTBOX END Fact1-->

    <!--LIGHTBOX START Fact2-->
    <div class="aviso-alto" id="text-fact2-alto">
        <a href="#" class="close"></a>
        <p>Lo más seguro es que ya padezcas diabetes. Es de vital importancia que trabajes en conjunto con tu médico para que aprendas a vivir con este padecimiento. Realiza cambios en tu estilo de vida para evitar complicaciones; aliméntate sanamente, realiza ejercicio, cuida tus pies y dientes; además pregunta cada cuánto debes revisar tu glucosa. </p>
    </div>
    <div class="aviso-medio" id="text-fact2-medio">
        <a href="#" class="close"></a>
        <p>Tu glucosa está elevada pero no lo suficiente para ser considerada diabetes. Sin embargo, puedes prevenir o retrasar este padecimiento al realizar cambios saludables en tu estilo de vida. Si tienes prediabetes consulta a tu médico con regularidad y pregúntale con qué frecuencia debe evaluar tu glucosa. También solicítale un plan de alimentación y ejercicio para ayudarte a prevenirla.</p>
    </div>
    <div class="aviso-bajo" id="text-fact2-bajo">
        <a href="#" class="close"></a>
        <p>Estás en el camino correcto. Un nivel saludable de azúcar (glucosa) en la sangre indica que no tienes diabetes. Para seguir así realiza lo siguiente: vigila tu peso, aliméntate sanamente –sigue comiendo frutas y verduras, come granos integrales y evita los alimentos con demasiado contenido en grasas— además, realiza al menos 30 minutos de ejercicio casi todos los días.</p>
    </div>
    <!--LIGHTBOX END Fact2-->

    <!--LIGHTBOX START Fact3-->
    <div class="aviso-alto" id="text-fact3-alto">
        <a href="#" class="close"></a>
        <p>Tienes niveles altos de triglicéridos y riesgo de padecer una enfermedad cardiaca, es muy importante que vayas con tu médico para que te recomiende acciones que te ayuden a prevenir algún padecimiento que ponga en peligro tu salud.</p>
    </div>
    <div class="aviso-medio" id="text-fact3-medio">
        <a href="#" class="close"></a>
        <p>Tienes niveles altos de triglicéridos y riesgo de padecer una enfermedad cardiaca, es muy importante que vayas con tu médico para que te recomiende acciones que te ayuden a prevenir algún padecimiento que ponga en peligro tu salud.</p>
    </div>
    <div class="aviso-bajo" id="text-fact3-bajo">
        <a href="#" class="close"></a>
        <p>Indicaste que tu nivel de triglicéridos está dentro del espectro saludable. ¡Excelente! Enorgullécete porque esto indica que llevas un estilo de vida saludable, y continúa así. Mantener el nivel de triglicéridos dentro del espectro normal ayuda a reducir el riesgo de desarrollar una enfermedad cardíaca. Para ello, sigue consumiendo poca azúcar, cuida tu peso y limita o evita las bebidas alcohólicas.</p>
    </div>
    <!--LIGHTBOX END Fact3-->
    <!--LIGHTBOX START Fact4-->
    <div class="aviso-alto" id="text-fact4-alto">
        <a href="#" class="close"></a>
        <p>Si tienes colesterol elevado se pueden desarrollar depósitos de ácidos grasos en tus vasos sanguíneos, lo que puede ocasionar algún padecimiento cardiovascular. Apóyate con tu médico para que te recomiende un plan que te ayude a reducir tus niveles de colesterol. </p>
    </div>
    <div class="aviso-medio" id="text-fact4-medio">
        <a href="#" class="close"></a>
        <p>Reducir tu nivel de colesterol podría beneficiarte. Los niveles altos de éste pueden aumentar el riesgo de ataque cardiaco. Los cambios en el estilo de vida son esenciales para disminuir tus riesgos. Para ello, debes perder el exceso de peso, consumir alimentos saludables como frutas, verduras, pescado y granos integrales, además de aumentar el grado de actividad física. Si fumas, debes dejar de hacerlo.</p>
    </div>
    <div class="aviso-bajo" id="text-fact4-bajo">
        <a href="#" class="close"></a>
        <p>Tu nivel de colesterol se encuentra dentro de lo saludable. ¡Excelente! Es importante mantener los niveles de colesterol tan bajos como sea posible. Para seguir así, cuida tu peso, consume alimentos saludables —como frutas, verduras, pescado, granos integrales— y aumenta el grado de actividad física. </p>
    </div>
    <!--LIGHTBOX END Fact4-->
    <!--LIGHTBOX START Fact5-->
    <div class="aviso-alto" id="text-fact5-alto">
        <a href="#" class="close"></a>
        <p>Cuidado! Por lo que indica tu índice de masa corporal (IMC) padeces obesidad, lo que te pone en una mayor predisposición de padecer diabetes o alguna enfermedad cardiaca. Acude con un especialista para que te ayude a armar un plan integral. También realiza cambios en tu estilo de vida, integra la actividad física y aliméntate sanamente.  </p>
    </div>
    <div class="aviso-medio" id="text-fact5-medio">
        <a href="#" class="close"></a>
        <p>Tu índice de masa corporal (IMC), sugiere que podría ser beneficioso para ti perder peso. Empieza a disminuirlo con estos cinco consejos básicos: desayuna saludablemente todos los días, evita los alimentos con grasa, come frutas y verduras, elige alimentos con granos enteros y realiza actividad física. </p>
    </div>
    <div class="aviso-bajo" id="text-fact5-bajo">
        <a href="#" class="close"></a>
        <p>¡Buenas noticias! Al mantener un peso saludable, continuarás reduciendo el riesgo de desarrollar ciertos problemas de salud, como presión arterial alta, enfermedad cardiaca, accidente cerebrovascular (embolia) y diabetes. Para seguir con un peso saludable, consume muchas frutas, verduras, granos integrales, y realiza actividad física casi todos los días.</p>
    </div>
    <!--LIGHTBOX END Fact5-->
    <!--LIGHTBOX START Fact6-->
    <div class="aviso-alto" id="text-fact6-alto">
        <a href="#" class="close"></a>
        <p>Es muy importante que realices cambios en tus hábitos para mejorar tu alimentación. Te sugerimos consumir más frutas y verduras, y limitar el consumo de alimentos fritos. Recuerda que las elecciones saludables diarias conducen a un estilo de vida más sano. Arma un plan con ayuda de tu médico o nutriólogo para alimentarte de mejor manera.</p>
    </div>
    <div class="aviso-medio" id="text-fact6-medio">
        <a href="#" class="close"></a>
        <p>Sigue estas recomendaciones nutricionales básicas para tener una mejor alimentación: come más frutas, verduras y granos integrales; limita las grasas saturadas, las grasas trans (ejemplos: alimentos de origen animal, yemas de huevo y productos lácteos enteros, dulces, pasteles y papas fritas) y la sal. Además, controla el tamaño de tus porciones y el número total de calorías que consumes diariamente.</p>
    </div>
    <div class="aviso-bajo" id="text-fact6-bajo">
        <a href="#" class="close"></a>
        <p>Indicaste que consumes la cantidad correcta de frutas y verduras, y evitas los alimentos fritos. ¡Excelente! Para continuar gozando de buena salud, descubre nuevas recetas saludables que te agraden y se adecuen a tu estilo de vida, así fortalecerás a tu organismo para prevenir la diabetes, enfermedades cardiacas y la obesidad, entre otras afecciones.</p>
    </div>
    <!--LIGHTBOX END Fact6-->
    <!--LIGHTBOX START Fact7-->
    <div class="aviso-alto" id="text-fact7-alto">
        <a href="#" class="close"></a>
        <p>Demasiado  estrés puede afectar tu cuerpo, tus pensamientos, tus sentimientos y tu comportamiento. ¡Comienza a disminuir el estrés hoy mismo! Una forma de lograrlo es respirar profundamente cuando sientas que vas a estallar. Te recomendamos aprender técnicas de relajación o escuchar música.</p>
    </div>
    <div class="aviso-medio" id="text-fact7-medio">
        <a href="#" class="close"></a>
        <p>Texto no disponible</p>
    </div>
    <div class="aviso-bajo" id="text-fact7-bajo">
        <a href="#" class="close"></a>
        <p>¡Excelente! Si controlas tu estrés y tus estados de ánimo, podrás disfrutar más de la vida. Continúa dedicando tiempo a ti mismo, participa en actividades que te resulten placenteras y dedica tiempo a las personas importantes de tu vida.</p>
    </div>
    <!--LIGHTBOX END Fact7-->
    <!--LIGHTBOX START Fact8-->
    <div class="aviso-alto" id="text-fact8-alto">
        <a href="#" class="close"></a>
        <p>Realizar más actividad física puede ser benéfico en tu caso. Puede ayudarte a disminuir la presión arterial y, con ella, tu riesgo de padecer alguna enfermedad cardiovascular. Recuerda que hay muchas maneras de mantenerte físicamente activo, como caminar, nadar, bailar o andar en bicicleta.</p>
    </div>
    <div class="aviso-medio" id="text-fact8-medio">
        <a href="#" class="close"></a>
        <p>Texto no disponible</p>
    </div>
    <div class="aviso-bajo" id="text-fact8-bajo">
        <a href="#" class="close"></a>
        <p>¡Muy bien! Estás demostrando un admirable compromiso por mantenerte activo. Como resultado, probablemente goces de mayor energía, mejor imagen personal, mayor control del estrés y menores riesgos para tu salud.</p>
    </div>
    <!--LIGHTBOX END Fact8-->
    <!--LIGHTBOX START Fact9-->
    <div class="aviso-alto" id="text-fact9-alto">
        <a href="#" class="close"></a>
        <p>Al no dormir las horas recomendadas, tal vez te sientas cansado y sin energía. Si esto te sucede, ¡Empieza a cambiar tus hábitos de sueño! Crea una rutina para antes de irte a dormir, como leer o tener un ambiente totalmente oscuro en tu habitación. Si el problema persiste te recomendamos acudir con un especialista que te ayude con este problema.</p>
    </div>
    <div class="aviso-medio" id="text-fact9-medio">
        <a href="#" class="close"></a>
        <p>Texto no disponible</p>
    </div>
    <div class="aviso-bajo" id="text-fact9-bajo">
        <a href="#" class="close"></a>
        <p>¡Felicidades tu calidad de sueño y descanso es buena! Seguramente despiertas con la energía que necesitas para realizar tus actividades diarias. Sigue con este buen hábito que tiene un gran impacto en tu salud física y emocional. Dormir bien también ayuda a mejorar tu memoria, a sentirte feliz y tener una mayor capacidad de concentración.</p>
    </div>
    <!--LIGHTBOX END Fact9-->
    <!--LIGHTBOX START Fact10-->
    <div class="aviso-alto" id="text-fact10-alto">
        <a href="#" class="close"></a>
        <p>Indicaste que fumas. Es importante que dejes este mal hábito ya que éste afecta tu salud cardiaca y respiratoria. Acude con tu médico para que te recomiende algún tratamiento que te ayude con este problema, además realiza cambios en tu estilo de vida y aléjate de los detonadores que te hacen fumar. </p>
    </div>
    <div class="aviso-medio" id="text-fact10-medio">
        <a href="#" class="close"></a>
        <p>Te felicitamos por haber dejado de fumar. Sigue por este camino. Si crees que puedes recaer apóyate de tu médico para que juntos armen un plan para evitar esta situación. Además, cambia los hábitos que te hacían fumar, crea estrategias para evitarlos.</p>
    </div>
    <div class="aviso-bajo" id="text-fact10-bajo">
        <a href="#" class="close"></a>
        <p>¡Continúa así! Sin consumir productos de tabaco y mantente alejado del tabaquismo pasivo. Al no fumar tienes una mejor salud cardiaca, respiratoria, tu presión arterial se mantiene sana, tus dientes y encías estarán sanos y te sentirás con energía.  </p>
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
                        <?php if (isset($avatar)) { ?>
                            <a href="#" style="background:url('<?php echo get_template_directory_uri(); ?>/images/avatar/<?php echo $avatar; ?> ') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;background-size: cover;"></a> 
                        <?php } else { ?>
                            <a href="#"></a>		
                        <?php } ?>
                    </div>

                    <div class="user-info">
                        <h4><?php echo $nombre; ?> </h4>
                        <!--<input id="enviar" name="enviar" type="submit" value="Cambiar foto" /> -->
                        <div class="file">
                            <form name="myform" id="myform" enctype="multipart/form-data" method="POST" action="<?php echo site_url() . '/imagen-dao/'; ?>" >
                                <input id="uploadImage" name="uploadImage" type="file" />
                            </form>  
                        </div>
                        <a  onclick="subirFoto()" class="cambio">Cargar foto</a>
                    </div>
                </div>
                <div class="riesgos-box riesgo-<?php echo $level ?>">
                    <h1>Mi corazón está en:</h1>
                    <h2>Riesgo <?php echo $level; ?></h2>
                    <?php if ($riesgo == 0) { ?>
                        <p>Tenemos buenas noticias para ti: “vas por muy buen camino”. Tus cifras de glucosa y 
                            colesterol se encuentran dentro de límites aceptables no dejes que se eleven. Mantén tu peso 
                            como hasta ahora y evita que los kilos de más te alcancen. Sigue consumiendo al menos dos frutas 
                            y tres verduras al día, no olvides el pescado al menos una vez a la semana, pero de preferencia dos 
                            veces. Continúa con ese nivel de actividad física o auméntalo un poco si te es posible. Tu salud 
                            agradece que no fumes. 
                        </p>
                        <p><strong>Puedes seguir estas recomendaciones básicas:</strong></p>
                        <p><strong>Sigue con una vida saludable. <br/>
                                Acude a visitas médicas preventivas.<br/>
                                Realiza tu árbol genealógico de enfermedades y verás cómo puedes evitar o retrasar la aparición de problemas cardiacos.</strong></p>
                    <?php } else if ($riesgo == 1) { ?>
                        <p>No tienes tanto peligro de presentar problemas cardiacos; sin embargo, si sigues por este 
                            camino es probable que a mediano plazo desarrolles una mayor predisposición para padecer problemas 
                            del corazón. Arma un plan para evitar cualquier riesgo, puedes empezar con estas sugerencias básicas. 
                        </p>
                        <p><strong>Puedes seguir estas recomendaciones básicas:</strong></p>
                        <p><strong>Vigila tus cifras de glucosa y colesterol. <br/>
                                Come cinco raciones de frutas y verduras al día (tres verduras y dos frutas, o más) para mantener 
                                tus niveles sanguíneos en orden y ayudar a disminuir los niveles de grasas en la sangre. 
                                <br/><br/>
                                Busca estrategias para bajar tu peso y el perímetro de tu cintura. Tener una mejor alimentación y 
                                aumentar tu actividad física puede ayudar.<br/><br/>
                                Trata de reducir tu ingesta de grasa al mínimo y evita agregar azúcar o sal a los alimentos. <br/><br/>
                                Sigue trabajando en moderar tu estrés, y mejorar tus hábitos de descanso. Mantener una 
                                integridad emocional y física es muy importante para reducir el riesgo de diabetes e 
                                hipertensión, dos de los principales enemigos del corazón. <br/><br/>
                                Trata de reducir tu ingesta de grasa al mínimo y evita agregar azúcar o sal a los alimentos. <br/><br/>
                                Evita el tabaco porque predispone al daño de las arterias y por lo tanto del corazón. Si crees que 
                                no puedes solo busca ayuda. 
                                <br/>
                            </strong></p>

                    <?php } else if ($riesgo == 2) {
                        ?>	
                        <p>Tenemos una mala noticia para ti: “estás en un riesgo elevado de presentar 
                            problemas cardiovasculares”; quizá ya los tengas y no te hayas dado cuenta. Pero la buena noticia 
                            es que “jamás es tarde para modificar el estilo de vida”. Nuestras recomendaciones para ti son: 
                        </p>
                        <p><strong>Comienza por hacerte una evaluación médica inicial en donde te indiquen cuáles son 
                                tus cifras de presión arterial, colesterol, glucosa y triglicéridos. Además pide que te 
                                indiquen cuál es el peso ideal para ti. Es un buen momento para iniciar un registro 
                                periódico de tus metas. 
                                <br/><br/>
                                Trata de perder peso. Realizar ejercicio y modificar tus hábitos alimenticios ayudarán; 
                                las frutas y las verduras ayudarán mucho en este plan.<br/> Si no estás acostumbrado a 
                                llevar una dieta sana puedes buscar libros, revistas o incluso cursos de cocina para 
                                descubrir que existen muchas opciones sanas y ricas. 
                                <br/><br/>
                                Ve disminuyendo la cantidad de grasa en tus alimentos; hazlo de manera paulatina.<br/>
                                Trabaja en tus niveles de estrés. El ejercicio y la meditación pueden ayudar, pero si 
                                crees que es algo que no puedes manejar solo tal vez sea el momento de buscar 
                                ayuda. Recuerda que no podemos lidiar solos con todo y es importante reconocer 
                                cuando alguien nos puede tender una mano. 
                                <br/><br/>
                                No sacrifiques tu descanso, éste no lo podrás recuperar a largo plazo y sí te generará 
                                daños permanentes a la salud. Intenta identificar qué fenómenos te están llevando a 
                                no tener un descanso reparador. 
                                <br/><br/>
                                Evita el alcohol y el tabaco lo antes posible ya que para ti en particular son factores de 
                                riesgo muy importantes para tener consecuencias graves de salud. Si crees que tu solo 
                                no puedes busca ayuda.  
                                <br/><br/>
                                Y lo más importante, no te desanimes, los cambios irán ocurriendo de manera 
                                paulatina, solo debes ser constante. 
                                <br/>
                            </strong></p>
                    <?php }
                    ?>
                </div>




                <?php
                try {
                    $conn = new PDO('mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "Select presion,cifra_ps,cifra_pd,glucosa,cifraglucosa,colesterol,cifracolesterol,trigliceridos,cifratrigliceridos,r_fruta,r_verdura, "
                            . "imc,nivel_estres,act_fisicas,horas_sueno,fumas,f_fumas,f_fumas2,familiares from wp_usersmedicalinfo where user_id={$id}"
                            . " LIMIT 1";
                    $rs = $conn->prepare($sql);
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
                } catch (PDOException $e) {
                    echo "ERROR: " . $e->getMessage();
                    die();
                }
                ?>
                <div class="risk-row">
                    <div class="risk-box" id="fact1">
                        <?php
                        if (!$presion) {
                            echo "<h2>Presión arterial</h2>";
                            echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
                            echo "<h3>Nivel sano: Tanto el valor superior (sistólico) como el valor inferior (diastólico) deben estar dentro 
del rango recomendado (menos de 120/80 mmHg).</h3>";
                            echo "<a id='light-fact1-alto'>Detalle</a>";
                        } else if ($presion) {
                            $mylevel;
                            if ($cps <= 120 && $cps > 60 && $cpd <= 80 && $cpd > 40)
                                $mylevel = "bajo";
                            else if (($cps > 120 && $cps < 140) && ($cpd < 90 && $cpd > 80))
                                $mylevel = "medio";
                            else
                                $mylevel = "alto";
                            echo "<h2>Presión arterial</h2>";
                            echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $cps . "/" . $cpd . "mmHg</span></h3>";
                            echo "<h3>Nivel sano: Tanto el valor superior (sistólico) como el valor inferior (diastólico) deben estar dentro 
del rango recomendado (menos de 120/80 mmHg).</h3>";
                            echo "<a id='light-fact1-{$mylevel}'>Detalle</a>";
                        }
                        ?>

                    </div>
                    <div class="risk-box" id="fact2">

                        <?php
                        if (!$glucosa) {
                            echo "<h2>Glucosa en la sangre</h2>";
                            echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
                            echo "<h3>Nivel sano: Menor de 140 mg/dL postprandial. </h3>";
                            echo "<a id='light-fact2-alto'>Detalle</a>";
                        } else if ($glucosa) {
                            $mylevel;
                            if ($cglucosa > 70 && $cglucosa <= 140)
                                $mylevel = "bajo";
                            else if (($cglucosa > 140 && $cglucosa <= 165))
                                $mylevel = "medio";
                            else
                                $mylevel = "alto";
                            echo "<h2>Glucosa en la sangre</h2>";
                            echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $cglucosa . "mg/dL</span></h3>";
                            echo "<h3>Nivel sano: Menor de 140 mg/dL postprandial.</h3>";
                            echo "<a id='light-fact2-{$mylevel}'>Detalle</a>";
                        }
                        ?>


                    </div>
                    <div class="risk-box" id="fact3">

                        <?php
                        if (!$trigliceridos) {
                            echo "<h2>Triglicéridos</h2>";
                            echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
                            echo "<h3>Nivel sano: 200 a 499 mg/dL</h3>";
                            echo "<a id='light-fact3-alto'>Detalle</a>";
                        } else if ($trigliceridos) {
                            $mylevel;
                            if ($ctrigliceridos <= 199)
                                $mylevel = "bajo";
                            else if (($ctrigliceridos > 200 && $ctrigliceridos <= 499))
                                $mylevel = "medio";
                            else
                                $mylevel = "alto";
                            echo "<h2>Triglicéridos</h2>";
                            echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $ctrigliceridos . "mg/dL</span></h3>";
                            echo "<h3>Nivel sano: 200 a 499 mg/dL</h3>";
                            echo "<a id='light-fact3-{$mylevel}'>Detalle</a>";
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
                    if (!$colesterol) {
                            echo "<h2>Colesterol</h2>";
                            echo "<h3>Nivel actual: <span class='alto'>Desconocido</span></h3>";
                            echo "<h3>Nivel sano: menor a 200 mg/dL</h3>";
                            echo "<a id='light-fact4-alto'>Detalle</a>";
                        } else if ($colesterol) {
                            $mylevel;
                            if ($cc <= 200)
                                $mylevel = "bajo";
                            else if (($cc > 200 && $cc <= 239))
                                $mylevel = "medio";
                            else
                                $mylevel = "alto";
                            echo "<h2>Colesterol</h2>";
                            echo "<h3>Nivel actual: <span class='" . $mylevel . "'>" . $ctrigliceridos . "mg/dL</span></h3>";
                            echo "<h3>Nivel sano: menor a 200 mg/dL</h3>";
                            echo "<a id='light-fact4-{$mylevel}'>Detalle</a>";
                        }
                    ?>
                </div>
                    <div class="risk-box" id="fact5">
                        <?php
                        $mylevel;
                        if ($imc <= 24.9)
                            $mylevel = "bajo";
                        else if (($imc > 24.9 && $imc <= 27))
                            $mylevel = "medio";
                        else
                            $mylevel = "alto";
                        echo "<h2>Peso (IMC)</h2>";
                        echo "<h3>IMC actual: <span class='" . $mylevel . "'>" . $imc . " </span></h3>";
                        echo "<h3>IMC sano: 19 a 24.9</h3>";
                        echo "<a id='light-fact5-{$mylevel}'>Detalle</a>";
                        ?>

                    </div>
                    <div class="risk-box" id="fact6">
                        <?php
                        $mylevel;
                        $rtot = $rfruta + $rverdura;
                        if ($rtot >= 5)
                            $mylevel = "bajo";
                        else if (($rtot < 5 && $rtot > 3))
                            $mylevel = "medio";
                        else
                            $mylevel = "alto";
                        echo "<h2>Nutrición</h2>";
                        echo "<h3>Raciones actuales: <span class='" . $mylevel . "'>" . $rtot . "</span></h3>";
                        echo "<h3>Raciones recomendadas:  5 raciones de frutas y verduras o más </h3>";
                        echo "<a id='light-fact6-{$mylevel}'>Detalle</a>";
                        ?>


                    </div>

                </div>
                <div class="risk-row">
                    <div class="risk-box" id="fact7">
                        <?php
                        $mylevel;
                        if ($nestres == 1)
                            $mylevel = "bajo";
                        else if (($nestres > 1) && $nestres < 3)
                            $mylevel = "medio";
                        else
                            $mylevel = "alto";
                        echo "<h2>Estrés</h2>";
                        echo "<h3>Nivel: <span class='" . $mylevel . "'>" . $nestres . "</span></h3>";
                        echo "<h3>Nivel sano: 1 - Adopta técnicas para controlar el estrés. 
</h3>";
                        echo "<a id='light-fact7-{$mylevel}'>Detalle</a>";
                        ?>

                    </div>
                    <div class="risk-box" id="fact8">
                        <?php
                        $mylevel;
                        $mensaje;
                        if ($afisicas == 1) {

                            $mensaje = "No realizo actividad alguna";
                        } else if ($afisicas == 2) {
                            $mensaje = "Menos de 30 minutos a la semana";
                        } else if ($afisicas == 3) {
                            $mensaje = "30 a 69 minutos a la semana";
                        } else if ($afisicas == 4) {
                            $mensaje = "70 a 109 minutos a la semana";
                        } else if ($afisicas == 5) {
                            $mensaje = "110 a 149 minutos a la semana";
                        } else if ($afisicas == 6) {
                            $mensaje = "150 minutos o m&aacute;s a la semana";
                        }

                        if ($afisicas >= 5)
                            $mylevel = "bajo";
                        else if (($afisicas < 5) && $afisicas > 3)
                            $mylevel = "medio";
                        else
                            $mylevel = "alto";
                        echo "<h2>Actividad física</h2>";
                        echo "<h3>Minutos: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
                        echo "<h3>Tu objetivo semanal es realizar más de 110 minutos por semana. </h3>";
                        echo "<a id='light-fact8-{$mylevel}'>Detalle</a>";
                        ?>
                    </div>
                    <div class="risk-box" id="fact10">
                        <?php
                        $mylevel;
                        $mensaje;
                        $ftot = $fumas1 + $fumas2;
                        if ($fumas) {
                            $mensaje = "Si";
                            if ($fumas1 == 1 && $fumas2 == 1)
                                $mylevel = "medio";
                            else
                                $mylevel = "alto";
                        }
                        else {
                            $mensaje = "No";
                            $mylevel = "bajo";
                        }
                        echo "<h2>Tabaquismo</h2>";
                        echo "<h3>Fumas: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
                        echo "<h3>No utilices productos con tabaco y evita el humo de segunda mano</h3>";
                        echo "<a id='light-fact10-{$mylevel}'>Detalle</a>";
                        ?>

                    </div>

                </div>
                <div class="risk-row last">
                    <div class="risk-box" id="fact9">
                        <?php
                        $mylevel;
                        $mensaje = "";
                        if ($hsueno == 2) {
                            $mensaje = " 7 a 9 horas";
                            $mylevel = "bajo";
                        } else if ($hsueno == 1) {
                            $mensaje = "Menos de 7 horas";
                            $mylevel = "alto";
                        } else if ($hsueno == 3) {
                            $mensaje = "M&aacute;s de 9 horas";
                            $mylevel = "alto";
                        }
                        echo "<h2>Sueño</h2>";
                        echo "<h3>Nivel: <span class='" . $mylevel . "'>" . $mensaje . "</span></h3>";
                        echo "<h3>Nivel sano:  Entre 7 y 9 horas</h3>";
                        echo "<a id='light-fact9-{$mylevel}'>Detalle</a>";
                        ?>

                    </div>
                    <div class="risk-box">

                        <?php
                        $myvar;
                        $bandera;

                        if ($fam) {
                            $bandera = true;
                            $myvar = "Presentes";
                        } else {
                            $bandera = false;
                            $myvar = "No presentes";
                        }
                        ?>
                        <h2>Padecimientos<br/> heredofamiliares</h2>
                        <h3><span class="<?php
                            if ($bandera) {
                                echo "alto";
                            } else {
                                echo "bajo";
                            }
                            ?>"><?php echo $myvar ?></span></h3>
                        <h3> Nivel sano: te felicitamos por no tener antecedentes familiares que afecten tu salud</h3>
                    </div>


                </div>
                <div class="motivaciones-row">
                    <?php
                    try {
                        $conn = new PDO('mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "Select motivation1,motivation2,motivation3 from wp_usersmotivation where user_id={$id}"
                                . " LIMIT 1";
                        $rs = $conn->prepare($sql);
                        $rs->execute();
                        $rs2 = $rs->fetchAll();
                        if (isset($rs2[0]['motivation1'])) {
                            $motivation1 = $rs2[0]['motivation1'];
                            $motivation2 = $rs2[0]['motivation2'];
                            $motivation3 = $rs2[0]['motivation3'];
                        }
                    } catch (PDOException $e) {
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
                </div>
                <?php include 'footer-registro.php'; ?>