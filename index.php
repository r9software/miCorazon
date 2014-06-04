<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es-ES"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--BASIC CSS-->
        <link href="media/css/micorazon.css" media="screen" rel="stylesheet" type="text/css">
        <!--JAVASCRIPT-->
        <title>Mi Corazon Saludable</title>
    </head><body class="bg_login">
        <div class="content-all">
            <div class="page">
                <div class="code-box">
                    <div class="titulo1"></div>
                    <div class="logo-corazon">
                    </div>
                    <h3>Esta herramienta te ayudará a mejorar tu salud cardiovascular,<br>aquí podrás encontrar:</h3>
                    <p>
                        · Una evaluación para conocer los principales riesgos para tu corazón.<br>
                        · Recompensas por cambiar tus hábitos.<br> 
                        · Recetas para un corazón sano.<br>
                        · Ejercicios para disminuir el estrés y mantenerte físicamente activo.<br>
                        · Qué hacer en caso de emergencias.<br>   
                    </p>
                    <h2>¡Ingresa la clave de acceso y empieza a cuidar de ti!</h2>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] = "true") {
                        ?>
                        <h4>Código de acceso incorrecto</h4>
                        <?php } ?>
                    <div class="code">
                        <form action="../dao/codigo.dao.php" method="POST">
                        <input type="password" name="codigo" class="field"><div class="clear"></div>
                        <input type="submit" class="sub" value="entrar al sitio"/>
                        </form>
                    </div>
                </div>
                <div class="copyright">
                    <p>Información usada bajo licencia de Mayo Foundation For Medical Education and Research.Copyright © Edición en Español por Intersistemas, S.A. de C.V.</p>
                    <ul>
                        <li><a href="http://micorazon.blend.mx/#">Aviso de Privacidad</a></li>
                        <li><a href="http://micorazon.blend.mx/#">Legales</a></li>
                    </ul>
                </div>
            </div><!--page-->
        </div><!--content all-->
    </body>
</html>