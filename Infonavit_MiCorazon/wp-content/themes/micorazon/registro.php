<?php
/*
  @package micorazon
  Template Name: Registro
 */
?>
<?php include 'header-registro.php'; ?>
<body >
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
				<h3>Crea tu cuenta</h3>
				<h4>Llena los siguientes datos para empezar a utilizar esta herramienta que te ayudará a cuidar tu corazón. Todos los datos son necesarios.</h4>
				<div class="g-registro">

					<div class="form-group2">
						<label>Correo electrónico:</label><input type="text" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-correo">
										*Campo obligatorio
									</div>

					</div>
					<div class="form-group2 single-space">
						<label>Crear contraseña:</label><input type="password" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-password">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group2">
						<label>Confirmar contraseña:</label><input type="password" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-confirm-password">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group single-space">
						<label>Nombre:</label><input type="text" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-presion">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group2 single-space">
						<label>Apellido paterno:</label><input type="text" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-apellido-paterno">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group2">
						<label>Apellido materno:</label><input type="text" name="Correo electronico" value="" class="field2" />
						<div class="alert3" id="alert-apellido-materno">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group nacimiento single-space">
						<label>Fecha de nacimiento:</label>
						<div class="uno">
							<select name="dia" class="default drop1" tabindex="2" id="uno" style="width: 60px;">
								<option value="">Día</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>

						</div>
						<div class="dos">
							<select name="mes" class="default drop1" tabindex="2" id="dos" style="width: 105px;">
								<option value="">Mes</option>
								<option value="en">Enero</option>
								<option value="fe">Febrero</option>
								<option value="ma">Marzo</option>
								<option value="ab">Abril</option>
								<option value="may">Mayo</option>
								<option value="jun">Junio</option>
								<option value="jul">Julio</option>
								<option value="ago">Agosto</option>
								<option value="sep">Septiembre</option>
								<option value="oct">Octubre</option>
								<option value="nov">Noviembre</option>
								<option value="dic">Diciembre</option>
							</select>
						</div>
						<div class="tres">
							<select name="ano" class="default drop1" tabindex="2" id="tres" style="width: 60px;">
								  <option value="">año</option>
                            <option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option><option value="1899">1899</option><option value="1898">1898</option><option value="1897">1897</option><option value="1896">1896</option><option value="1895">1895</option><option value="1894">1894</option><option value="1893">1893</option><option value="1892">1892</option><option value="1891">1891</option><option value="1890">1890</option><option value="1889">1889</option><option value="1888">1888</option><option value="1887">1887</option><option value="1886">1886</option><option value="1885">1885</option><option value="1884">1884</option> 
							</select>

						</div>
						<div class="alert3" id="alert-nacimiento">
										*Campos obligatorio
									</div>
					</div>
					<div class="form-group">
						<label>Género:</label>
						<div class="cuatro customui">
							<input name="genero" type="radio" id="generom"  value="1"  /><label for="generom" class="radie" style="width:120px; ">Masculino</label>
							<input name="genero" type="radio" id="generof"  value="1"   /><label for="generof" class="radie"  style="width:120px; ">Femenino</label>
							<div class="alert2" id="alert-genero">
										*Campo obligatorio
									</div>
						</div>
						
					</div>
					<div class="form-group">
						<label>Departamento de trabajo:</label>
						<div class="cuatro">
							<select name="industria" class="default s3" tabindex="2" id="cinco" style="width: 240px;">
								<option value="">Selecciona</option>
								<option value="indis">Industria en crecimiento</option>
								<option value="indus">Industria en crecimiento</option>
							</select>
						</div>
						<div class="alert3" id="alert-depto">
										*Campo obligatorio
									</div>
					</div>
					<div class="form-group">
						<label>Tipo de empleado:</label>
						<div class="cuatro">
							<select name="trabajo" class="default s3" tabindex="2" id="seis" style="width: 240px">
								<option value="">Selecciona</option>
								<option value="indis">Obrero</option>
								<option value="indus">Chofer</option>
							</select>
						</div>
						<div class="alert3" id="alert-empleado">
										*Campo obligatorio
									</div>
					</div>
				</div>
				<div class="disclaimer">
					<div class="form-group customui">
						<input name="terminos" type="checkbox" id="terminos"  value="1" /><label for="terminos" class="checky">He leído y acepto los Términos y Condiciones. <a href="#">Aviso de privacidad</a></label>
					</div>
					<div class="form-group customui">
						<input name="consejos" type="checkbox" id="consejos"  value="1" /><label for="consejos" class="checky">Acepto recibir consejos, tips y recomendaciones para tener un corazón sano a través de e-mail.</label><div class="clear"></div>
						<div class="alert3" id="alert-terminos">
										*Campos obligatorios
									</div>
					</div>
					<div class="form-group center">
						<button type="submit" value="submit" class="submit1" onclick="window.location.href='cuestionario/'">Continuar</button>
					</div>
				</div>
				<?php include 'footer-registro.php'; ?>
