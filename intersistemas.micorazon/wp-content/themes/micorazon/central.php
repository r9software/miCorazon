<?php
/*
 * @package micorazon
  Template Name: central
 */


try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "SELECT distinct `industria` from wp_usersinfo";
	$q = $conn->prepare( $sql );
	if ( $q->execute() ) {
		$rs = $q->fetchAll();
		foreach ( $rs as $result ) {
			//echo $result[0];
		}
	}
	$sql = "SELECT distinct `trabajo` from wp_usersinfo";
	$q = $conn->prepare( $sql );
	if ( $q->execute() ) {
		$rs2 = $q->fetchAll();
		foreach ( $rs2 as $result ) {
			//echo $result[0];
		}
	}
	$conn = null;
} catch ( PDOException $e ) {
	header( "Location:" . site_url() . "/central-de-reportes/" );
	echo "ERROR: " . $e->getMessage();
	die();
}
?>
<?php include 'header-central.php'; ?>



<div class="page">
	<div class="slogan"><h2 class="tconoce"><span>Comienza hoy</span> a vivir mejor.</h2></div>	

	<div class="perfil-central" >
		<div class="navegacion-central">
			<h3>Central de reportes</h3>
			<ul>
				<li><a href="#">Demogr&aacute;ficos</a><ul>
						<li id="rango-edades"><a href="#">Rango de edades</a></li>
						<li id="genero"><a href="#">G&eacute;nero</a></li>
						<li id="localidad"><a href="#">Localidad</a></li>
						<li id="area"><a href="#">&Aacute;rea</a></li>
					</ul></li>
				<li><a href="#">Biom&eacute;tricos</a><ul>
						<li id="presion-arterial"><a href="#">Presi&oacute;n arterial</a></li>
						<li id="glucosa"><a href="#">Glucosa en la sangre</a></li>
						<li id="trigliceridos"><a href="#">Triglic&eacute;ridos</a></li>
						<li id="indice-masa"><a href="#">&Iacute;ndice de masa corporal</a></li>
						<li id="circunferencia"><a href="#">Circunferencia abdominal</a></li>
					</ul></li>
				<li><a href="#">H&aacute;bitos cardiovasculares</a>
					<ul>
						<li id="frutas"><a href="#">Consumo de frutas</a></li>
						<li id="verduras"><a href="#">Consumo de verduras</a></li>
						<li id="capeados"><a href="#">Consumo de alimentos fritos, capeados o empanizados</a><li>
						<li id="sal"><a href="#">Consumo de sal</a><li>
					</ul>
				</li>
				<li><a href="#">Estr&eacute;s</a>
					<ul>
						<li id="estres"><a href="#">Nivel de estr&eacute;s</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="graficas-central">
			<h4 id="nombre">Central de Reportes</h4>

			<label>Localidad:<label>
					<select id="opcion1">
						<option value="todos">todos</option>
						<?php
						foreach ( $rs as $result ) {
							echo "<option value='{$result}'>" . $result[0] . "</option>";
						}
						?>
					</select>
					<label>Area:</label>
					<select id="opcion2">
						<option value="todos">todos</option>
						<?php
						foreach ( $rs2 as $result ) {
							echo "<option>" . $result[0] . "</option>";
						}
						?>
					</select>
					<div id="container-graficas">
						<div id="container-rango-edades" style="height: auto; display:none"></div>
						<div id="tabla-rango-edades" style="height: auto; display:none">

							<table>
								<thead id="th-re">
									<tr>
										<td> Menor a 20 </td>
										<td> 21 a 30 </td>
										<td> 31 a 40 </td>
										<td> 41 a 50 </td>
										<td> Mayor a 51 </td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-re"></tr>
								</tbody>
							</table>
						</div>
						<div id="container-genero" style="height: auto; display:none"></div>
						<div id="tabla-genero" style="height: auto; display:none">
							<table>
								<thead id="th-g">
									<tr>
										<td> Hombres </td>
										<td> Mujeres </td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-g">
									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-localidad" style="height: auto; display:none"></div>
						<div id="tabla-localidad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-l">

									</tr>
								</thead>
								<tbody >
									<tr id="tb-l">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-area" style="height: auto; display:none"></div>
						<div id="tabla-area" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-a"></tr>
								</thead>
								<tbody >
									<tr id="tb-a">

									</tr>
								</tbody>
							</table>
						</div>

						<div id="container-presion" style="height: auto; display:none"></div>
						<div id="tabla-presion" style="height: auto; display:none">
							<table>
								<thead id="th-p">
									<tr>
										<td> Si </td>
										<td> No </td>

									</tr>
								</thead>
								<tbody >
									<tr id="tb-p">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-presion-si" style="height: auto; display:none"></div>
						<div id="tabla-presion-si" style="height: auto; display:none">
							<table>
								<thead id="th-ps">
									<tr>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-ps">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-presion-genero" style="height: auto; display:none"></div>
						<div id="tabla-presion-genero" style="height: auto; display:none">
							<table>
								<thead>
									<tr id="th-pg"></tr>
									<tr>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-pg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-presion-edad" style="height: auto; display:none"></div>
						<div id="tabla-presion-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-pe"></tr>
									<tr id="mp20"><td>Menor a 20</td></tr>
									<tr id="mp30"><td>21 a 30</td></tr>
									<tr id="mp40"><td>31 a 40</td></tr>
									<tr id="mp50"><td>41 a 50</td></tr>
									<tr id="mp60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-pe">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-glucosa" style="height: auto; display:none"></div>
						<div id="tabla-glucosa" style="height: auto; display:none">
							<table>
								<thead id="th-gl">
									<tr>
										<td>Si</td>
										<td>No</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-gl">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-glucosa-si" style="height: auto; display:none"></div>
						<div id="tabla-glucosa-si" style="height: auto; display:none">
							<table>
								<thead id="th-gls">
									<tr>
										<td>Alto</td>
										<td>Medio</td>
										<td>Bajo</td>
									</tr></thead>
								<tbody >
									<tr id="tb-gls">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-glucosa-genero" style="height: auto; display:none"></div>
						<div id="tabla-glucosa-genero" style="height: auto; display:none">
							<table>
								<thead>
									<tr id="th-glg"></tr>
									<tr>
										<td>Riesgo alto</td>
										<td>Riesgo medio</td>
										<td>Riesgo bajo</td>
										<td>Riesgo alto</td>
										<td>Riesgo medio</td>
										<td>Riesgo bajo</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-glg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-glucosa-edad" style="height: auto; display:none"></div>
						<div id="tabla-glucosa-edad" style="height: auto; display:none">
							<table>
								<thead>
									<tr id="th-gle"></tr>
									<tr id="mg20"><td>Menor a 20</td></tr>
									<tr id="mg30"><td>21 a 30</td></tr>
									<tr id="mg40"><td>31 a 40</td></tr>
									<tr id="mg50"><td>41 a 50</td></tr>
									<tr id="mg60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-gle">

									</tr>
								</tbody>
							</table>
						</div>

						<div id="container-trigliceridos" style="height: auto; display:none"></div>
						<div id="tabla-trigliceridos" style="height: auto; display:none">
							<table>
								<thead id="th-t">
									<tr>
										<td>Si</td>
										<td>No</td>
									</tr>

								</thead>
								<tbody>
									<tr id="tb-t">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-trigliceridos-si" style="height: auto; display:none"></div>
						<div id="tabla-trigliceridos-si" style="height: auto; display:none">
							<table>
								<thead id="th-ts">
									<tr>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
									</tr>
								</thead>
								<tbody >
									<tr id="tb-ts">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-trigliceridos-genero" style="height: auto; display:none"></div>
						<div id="tabla-trigliceridos-genero" style="height: auto; display:none">
							<table>
								<thead>
									<tr id="th-tg"></tr>
									<tr>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
										<td>Riesgo alto</td>
										<td>Riesgo bajo</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-tg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-trigliceridos-edad" style="height: auto; display:none"></div>
						<div id="tabla-trigliceridos-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-te"></tr>
									<tr id="mt20"><td>Menor a 20</td></tr>
									<tr id="mt30"><td>21 a 30</td></tr>
									<tr id="mt40"><td>31 a 40</td></tr>
									<tr id="mt50"><td>41 a 50</td></tr>
									<tr id="mt60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-te">

									</tr>
								</tbody>
							</table>
						</div>

						<div id="container-indice-masa" style="height: auto; display:none"></div>
						<div id="tabla-indice-masa" style="height: auto; display:none">
							<table>
								<thead id="th-im">
									<tr>
										<td>Sobrepeso</td>
										<td>Saludable</td>
										<td>Bajo en peso</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-im">
									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-indice-masa-genero" style="height: auto; display:none"></div>
						<div id="tabla-indice-masa-genero" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-img">

									</tr>
									<tr>
										<td>Sobrepeso</td>
										<td>Saludable</td>
										<td>Bajo en peso</td>
										<td>Sobrepeso</td>
										<td>Saludable</td>
										<td>Bajo en peso</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-img">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-indice-masa-edad" style="height: auto; display:none"></div>
						<div id="tabla-indice-masa-edad" style="height: auto; display:none">
							<table>
								<thead>
									<tr  id="th-ime"></tr>
									<tr id="mim20"><td>Menor a 20</td></tr>
									<tr id="mim30"><td>21 a 30</td></tr>
									<tr id="mim40"><td>31 a 40</td></tr>
									<tr id="mim50"><td>41 a 50</td></tr>
									<tr id="mim60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-ime">

									</tr>
								</tbody>
							</table>
						</div>

						<div id="container-circunferencia" style="height: auto; display:none"></div>
						<div id="tabla-circunferencia" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-c">

									</tr>
									<tr><td colspan="2">Hombres</td>
										<td colspan="2">Mujeres</td>
									</tr>

								</thead>
								<tbody>
									<tr id="tb-c">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-circunferencia-edad" style="height: auto; display:none"></div>
						<div id="tabla-circunferencia-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-ce"></tr>
									<tr id="mce20"><td>Menor a 20</td></tr>
									<tr id="mce30"><td>21 a 30</td></tr>
									<tr id="mce40"><td>31 a 40</td></tr>
									<tr id="mce50"><td>41 a 50</td></tr>
									<tr id="mce60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-ce">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-frutas" style="height: auto; display:none"></div>
						<div id="tabla-frutas" style="height: auto; display:none">
							<table>
								<thead id="th-f">
									<tr>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-f">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-frutas-genero" style="height: auto; display:none"></div>
						<div id="tabla-frutas-genero" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-fg"></tr>
									<tr>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
									</tr>
								</thead>
								<tbody >
									<tr id="tb-fg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-frutas-edad" style="height: auto; display:none"></div>
						<div id="tabla-frutas-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-fe"></tr>
									<tr id="mf20"><td>Menor a 20</td></tr>
									<tr id="mf30"><td>21 a 30</td></tr>
									<tr id="mf40"><td>31 a 40</td></tr>
									<tr id="mf50"><td>41 a 50</td></tr>
									<tr id="mf60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody >
									<tr id="tb-fe">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-verduras" style="height: auto; display:none"></div>
						<div id="tabla-verduras" style="height: auto; display:none">
							<table>
								<thead id="th-v">
									<tr>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
									</tr>
								</thead>
								<tbody >
									<tr id="tb-v">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-verduras-genero" style="height: auto; display:none"></div>
						<div id="tabla-verduras-genero" style="height: auto; display:none">
							<table>
								<thead id="">
									<tr id="th-vg"></tr>
									<tr>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
										<td>Menor a 4</td>
										<td>De 4 a 7</td>
										<td>De 7 a 10</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-vg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-verduras-edad" style="height: auto; display:none"></div>
						<div id="tabla-verduras-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-ve"></tr>
									<tr id="mv20"><td>Menor a 20</td></tr>
									<tr id="mv30"><td>21 a 30</td></tr>
									<tr id="mv40"><td>31 a 40</td></tr>
									<tr id="mv50"><td>41 a 50</td></tr>
									<tr id="mv60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-ve">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-capeados" style="height: auto; display:none"></div>
						<div id="tabla-capeados" style="height: auto; display:none">
							<table>
								<thead id="th-ca" >

									<tr>
										<td>Todos los días</td>
										<td>Más de 3 veces por semana</td>
										<td>2 a 3 veces por semana</td>
										<td>Ocasionalmente</td>
										<td>Nunca</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-ca">
									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-capeados-genero" style="height: auto; display:none"></div>
						<div id="tabla-capeados-genero" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-cag"></tr>
									<tr>
										<td>Todos los días</td>
										<td>Más de 3 veces por semana</td>
										<td>2 a 3 veces por semana</td>
										<td>Ocasionalmente</td>
										<td>Nunca</td>
										<td>Todos los días</td>
										<td>Más de 3 veces por semana</td>
										<td>2 a 3 veces por semana</td>
										<td>Ocasionalmente</td>
										<td>Nunca</td>
									</tr>
								</thead>
								<tbody >
									<tr id="tb-cag">

									</tr>

								</tbody>
							</table>
						</div>
						<div id="container-capeados-edad" style="height: auto; display:none"></div>
						<div id="tabla-capeados-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-cae"></tr>
									<tr id="mc20"><td>Menor a 20</td></tr>
									<tr id="mc30"><td>21 a 30</td></tr>
									<tr id="mc40"><td>31 a 40</td></tr>
									<tr id="mc50"><td>41 a 50</td></tr>
									<tr id="mc60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody >
									<tr id="tb-cae"></tr>

								</tbody>
							</table>
						</div>
						<div id="container-sal" style="height: auto; display:none"></div>
						<div id="tabla-sal" style="height: auto; display:none">
							<table>
								<thead id="th-s">
									<tr>
										<td>Si</td>
										<td>Ocasionalmente</td>
										<td>No</td>

									</tr>
								</thead>
								<tbody >
									<tr id="tb-s">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-sal-genero" style="height: auto; display:none"></div>
						<div id="tabla-sal-genero" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-sg"></tr>
									<tr>
										<td>Si</td>
										<td>Ocasionalmente</td>
										<td>No</td>
										<td>Si</td>
										<td>Ocasionalmente</td>
										<td>No</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-sg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-sal-edad" style="height: auto; display:none"></div>
						<div id="tabla-sal-edad" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-se">

									</tr>
									<tr id="ms20"><td>Menor a 20</td></tr>
									<tr id="ms30"><td>21 a 30</td></tr>
									<tr id="ms40"><td>31 a 40</td></tr>
									<tr id="ms50"><td>41 a 50</td></tr>
									<tr id="ms60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-se">

									</tr>

								</tbody>
							</table>
						</div>
						<div id="container-estres" style="height: auto; display:none"></div>
						<div id="tabla-estres" style="height: auto; display:none">
							<table>
								<thead id="th-e">
									<tr>
										<td>Nivel 1 y 2</td>
										<td>Nivel 3</td>
										<td>Nivel 4 y 5</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-e">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-estres-genero" style="height: auto; display:none"></div>
						<div id="tabla-estres-genero" style="height: auto; display:none">
							<table>
								<thead >
									<tr id="th-eg">

									</tr>
									<tr>
										<td>Nivel 1 y 2</td>
										<td>Nivel 3</td>
										<td>Nivel 4 y 5</td>
										<td>Nivel 1 y 2</td>
										<td>Nivel 3</td>
										<td>Nivel 4 y 5</td>
									</tr>
								</thead>
								<tbody>
									<tr id="tb-eg">

									</tr>
								</tbody>
							</table>
						</div>
						<div id="container-estres-edad" style="height: auto; display:none"></div>
						<div id="tabla-estres-edad" style="height: auto; display:none">
							<table>
								<thead >

									<tr id="th-ee"><td> </td></tr>
									<tr id="m20"><td>Menor a 20</td></tr>
									<tr id="m30"><td>21 a 30</td></tr>
									<tr id="m40"><td>31 a 40</td></tr>
									<tr id="m50"><td>41 a 50</td></tr>
									<tr id="m60"><td>Mayor a 51</td></tr>
								</thead>
								<tbody>
									<tr id="tb-ee">

									</tr>
								</tbody>
							</table>
						</div> 

					</div>

					<div id="container-tablas" style="margin-top: 100px;"></div>

					</div>
					</div>



					</div><!--page-->
					<div class="clear"></div>
					<?php include 'footer-central.php'; ?>