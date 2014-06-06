<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package micorazon
 */
?>
<div class="sidebar">
	<div class="continua-main">
	</div>
	<div class="profile bajo">
		<div class="actividad ">
			<h3 class="tactividad">Mi actividad</h3>
			<div class="foto">
				<div class="looney-tunes"></div>
				<img src="<?php bloginfo('template_url'); ?>/images/fake/profile.jpg"/>
			</div>
			<h4>Juan José Gutiérrez</h4>
			<div class="ranking">
				<div class="heart-points">
					<div class="points">Riesgo bajo</div>
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