<?php
/*
  @package micorazon
  Template Name: index codigo
 */
?>
<?php
include 'header-registro.php';

?>
<body class="bg_login">
	<div class="content-all">
		<div class="page">
			<div class="code-box">
				<div class="titulo1"></div>
				<div class="logo-corazon">
				</div>
				<h3>Esta herramienta te ayudará a mejorar tu salud cardiovascular,<br/>aquí podrás encontrar:</h3>
				<p>
                    · Una evaluación para conocer los principales riesgos para tu corazón.<br/>
                    · Recompensas por cambiar tus hábitos.<br/> 
                    · Recetas para un corazón sano.<br/>
                    · Ejercicios para disminuir el estrés y mantenerte físicamente activo.<br/>
                    · Qué hacer en caso de emergencias.<br/>   
				</p>
				<h2>¡Ingresa la clave de acceso y empieza a cuidar de ti!</h2>
				<div class="code">
					<form action="<?php echo bloginfo('wpurl'); ?>/dao" id="formy" method="POST"> 
						<input type="password" id="codigo" name="codigo" class="field"><div class="clear"></div>
						<input type="submit">
					</form>
				</div>
			</div>
			
			<?php include 'footer-registro.php'; ?>
			