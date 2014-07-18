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
	if ( $q->execute( ) ) {
		$rs = $q->fetchAll();
		foreach($rs as $result){
			//echo $result[0];
		}
	}
	$sql = "SELECT distinct `trabajo` from wp_usersinfo";
	$q = $conn->prepare( $sql );
	if ( $q->execute( ) ) {
		$rs2 = $q->fetchAll();
		foreach($rs2 as $result){
			//echo $result[0];
		}
	}
	$conn=null;
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
			 foreach($rs as $result){
			echo "<option value='{$result}'>".$result[0]."</option>";
			}
			 ?>
			</select>
					<label>Area:</label>
			<select id="opcion2">
				<option value="todos">todos</option>
				<?php
			 foreach($rs2 as $result){
			echo "<option>".$result[0]."</option>";
			}
			 ?>
			</select>
			<div id="container-graficas">
				<div id="container-rango-edades" style="height: 400px; display:none"></div>
				<div id="container-genero" style="height: 400px; display:none"></div>
				<div id="container-localidad" style="height: 400px; display:none"></div>
				<div id="container-area" style="height: 400px; display:none"></div>
				
				<div id="container-presion" style="height: 400px; display:none"></div>
				<div id="container-presion-si" style="height: 400px; display:none"></div>
				<div id="container-presion-genero" style="height: 400px; display:none"></div>
				<div id="container-presion-edad" style="height: 400px; display:none"></div>
				
				<div id="container-glucosa" style="height: 400px; display:none"></div>
				<div id="container-glucosa-si" style="height: 400px; display:none"></div>
				<div id="container-glucosa-genero" style="height: 400px; display:none"></div>
				<div id="container-glucosa-edad" style="height: 400px; display:none"></div>
				
				<div id="container-trigliceridos" style="height: 400px; display:none"></div>
				<div id="container-trigliceridos-si" style="height: 400px; display:none"></div>
				<div id="container-trigliceridos-genero" style="height: 400px; display:none"></div>
				<div id="container-trigliceridos-edad" style="height: 400px; display:none"></div>
				
				<div id="container-indice-masa" style="height: 400px; display:none"></div>
				<div id="container-indice-masa-genero" style="height: 400px; display:none"></div>
				<div id="container-indice-masa-edad" style="height: 400px; display:none"></div>
				
				<div id="container-circunferencia" style="height: 400px; display:none"></div>
				<div id="container-circunferencia-edad" style="height: 400px; display:none"></div>
				<div id="container-frutas" style="height: 400px; display:none"></div>
				<div id="container-frutas-genero" style="height: 400px; display:none"></div>
				<div id="container-frutas-edad" style="height: 400px; display:none"></div>
				
				<div id="container-verduras" style="height: 400px; display:none"></div>
				<div id="container-verduras-genero" style="height: 400px; display:none"></div>
				<div id="container-verduras-edad" style="height: 400px; display:none"></div>
				<div id="container-capeados" style="height: 400px; display:none"></div>
				<div id="container-capeados-genero" style="height: 400px; display:none"></div>
				<div id="container-capeados-edad" style="height: 400px; display:none"></div>
				<div id="container-sal" style="height: 400px; display:none"></div>
				<div id="container-sal-genero" style="height: 400px; display:none"></div>
				<div id="container-sal-edad" style="height: 400px; display:none"></div>
				<div id="container-estres" style="height: 400px; display:none"></div>
				<div id="container-estres-genero" style="height: 400px; display:none"></div>
				<div id="container-estres-edad" style="height: 400px; display:none"></div>
				
			</div>
			<div id="container-tablas">
<!--
				<div id="tabla-rango-edades" style="height: 400px; display:none">
					<table>
						<thead>
							<tr>
								<td>Menor a 20 años</td>
								<td>Mayor a 20 años</td>
								<td>Mayor a 30 años</td>
								<td>Mayor a 40 años</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> 25%</td>
								<td>25%</td>
								<td>25%</td>
								<td>25%</td>
							</tr>
						</tbody>

					</table>
				</div>
				<div id="tabla-genero" style="height: 400px; display:none">
					<table>
						<thead>
							<tr>
								<td>Hombres</td>
								<td>Mujeres</td>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> 50%</td>
								<td>50%</td>
								
							</tr>
						</tbody>

					</table>
				</div>
				<div id="tabla-localidad" style="height: 400px; display:none"></div>
				<div id="tabla-area" style="height: 400px; display:none"></div>
				<div id="tabla-presion" style="height: 400px; display:none"></div>
				<div id="tabla-glucosa" style="height: 400px; display:none"></div>
				<div id="tabla-trigliceridos" style="height: 400px; display:none"></div>
				<div id="tabla-indice-masa" style="height: 400px; display:none"></div>
				<div id="tabla-circunferencia" style="height: 400px; display:none"></div>
				<div id="tabla-frutas" style="height: 400px; display:none"></div>
				<div id="tabla-verduras" style="height: 400px; display:none"></div>
				<div id="tabla-capeados" style="height: 400px; display:none"></div>
				<div id="tabla-sal" style="height: 400px; display:none"></div>
				<div id="tabla-estres" style="height: 400px; display:none"></div> 
!-->
			</div>
		</div>
	</div>



</div><!--page-->
<div class="clear"></div>
<?php include 'footer-central.php'; ?>