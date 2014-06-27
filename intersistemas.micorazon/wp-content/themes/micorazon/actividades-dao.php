<?php

/*
  @package micorazon
  Template Name: actividades-dao
 */
//echo "<pre>";
//print_r( $_POST);
//
//
//echo "</pre>";
$domingoaero;
$lunesaero;
$martesaero;
$miercolesaero;
$juevesaero;
$viernesaero;
$sabadoaero;
$mysingle;
//estiramientos
$domingoestira;
$lunesestira;
$martesestira;
$miercolesestira;
$juevesestira;
$viernesestira;
$sabadoestira;
//fuerza
$domingofue;
$lunesfue;
$martesfue;
$miercolesfue;
$juevesfue;
$viernesfue;
$sabadofue;
$fechaini;
$fechafin;
if(isset($_POST['dom-aero'])){
	$domingoaero=$_POST['dom-aero'];
}else{
	$domingoaero=0;
}
if(isset($_POST['lun-aero'])){
	$lunesaero=$_POST['lun-aero'];
}else{
	$lunesaero=0;
}
if(isset($_POST['mar-aero'])){
	$martesaero=$_POST['mar-aero'];
}else{
	$martesaero=0;
}
if(isset($_POST['mier-aero'])){
	$miercolesaero=$_POST['mier-aero'];
}else{
	$miercolesaero=0;
}
if(isset($_POST['jue-aero'])){
	$juevesaero=$_POST['jue-aero'];
}else{
	$juevesaero=0;
}
if(isset($_POST['vie-aero'])){
	$viernesaero=$_POST['vie-aero'];
}else{
	$viernesaero=0;
}
if(isset($_POST['sab-aero'])){
	$sabadoaero=$_POST['sab-aero'];
}else{
	$sabadoaero=0;
}

if(isset($_POST['dom-est'])){
	$domingoestira=$_POST['dom-est'];
}else{
	$domingoestira=0;
}
if(isset($_POST['lun-est'])){
	$lunesestira=$_POST['lun-est'];
}else{
	$lunesestira=0;
}
if(isset($_POST['mar-est'])){
	$martesestira=$_POST['mar-est'];
}else{
	$martesestira=0;
}
if(isset($_POST['mier-est'])){
	$miercolesestira=$_POST['mier-est'];
}else{
	$miercolesestira=0;
}
if(isset($_POST['jue-est'])){
	$juevesestira=$_POST['jue-est'];
}else{
	$juevesestira=0;
}
if(isset($_POST['vie-est'])){
	$viernesestira=$_POST['vie-est'];
}else{
	$viernesestira=0;
}
if(isset($_POST['sab-est'])){
	$sabadoestira=$_POST['sab-est'];
}else{
	$sabadoestira=0;
}

//fuerza

if(isset($_POST['dom-fue'])){
	$domingofue=$_POST['dom-fue'];
}else{
	$domingofue=0;
}
if(isset($_POST['lun-fue'])){
	$lunesfue=$_POST['lun-fue'];
}else{
	$lunesfue=0;
}
if(isset($_POST['mar-fue'])){
	$martesfue=$_POST['mar-fue'];
}else{
	$martesfue=0;
}
if(isset($_POST['mier-fue'])){
	$miercolesfue=$_POST['mier-fue'];
}else{
	$miercolesfue=0;
}
if(isset($_POST['jue-fue'])){
	$juevesfue=$_POST['jue-fue'];
}else{
	$juevesfue=0;
}
if(isset($_POST['vie-fue'])){
	$viernesfue=$_POST['vie-fue'];
}else{
	$viernesfue=0;
}
if(isset($_POST['sab-fue'])){
	$sabadofue=$_POST['sab-fue'];
}else{
	$sabadofue=0;
}


if(isset($_POST['lunes'])){
	$fechaini=$_POST['lunes'];
}else{
	$fechaini="0000-00-00";
}
if(isset($_POST['domingo'])){
	$fechafin=$_POST['domingo'];
}else{
	$fechafin="0000-00-00";
}
if(isset($_POST['mysingle'])){
	$mysingle=$_POST['mysingle'];
}else{
	header( "Location:" . site_url() . "/introduccion-9/" );
}
$current_user = wp_get_current_user();
$id = $current_user->ID;
//insercion
if($mysingle==462){
	//actividad Fisica

try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = " UPDATE wp_usersregistroaerobicos SET `lunes`={$lunesaero},`martes`={$martesaero}, `miercoles`={$miercolesaero}, `jueves`={$juevesaero},`viernes`={$viernesaero}, `sabado`={$sabadoaero}, `domingo`={$domingoaero} 
			  WHERE `user_id`={$id} and `fechaini`='{$fechaini}' and `fechafin`='{$fechafin}'; "
			. " UPDATE wp_usersregistroestiramiento SET `lunes`={$lunesestira},`martes`={$martesestira}, `miercoles`={$miercolesestira}, `jueves`={$juevesestira},`viernes`={$viernesestira}, `sabado`={$sabadoestira}, `domingo`={$domingoestira} 
			  WHERE `user_id`={$id} and `fechaini`='{$fechaini}' and `fechafin`='{$fechafin}'; "
			. " UPDATE wp_usersregistrofuerza SET `lunes`={$lunesfue},`martes`={$martesfue}, `miercoles`={$miercolesfue}, `jueves`={$juevesfue},`viernes`={$viernesfue}, `sabado`={$sabadofue}, `domingo`={$domingofue} 
			  WHERE `user_id`={$id} and `fechaini`='{$fechaini}' and `fechafin`='{$fechafin}'; ";
			// echo $martesaero;
			echo $sql;
			$q = $conn->prepare( $sql );
	$q->execute( );
	header( "Location:" . site_url() . "/actividad/registro-de-actividad-fisica/?guardado=true" );
	$conn = null;
} catch ( PDOException $e ) {
	echo "".$e->getMessage();
//header( "Location:" . site_url() . "/login/" );
	die();
}
//end actividad fisica
}else if($mysingle==461){
	//start peso y alimentacion
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	//end peso y alimentacion
}else if($mysingle==61){
	//startt diario de sueño
	//
	//
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	//end diaro de sueño
}else{
	header( "Location:" . site_url() . "/introduccion-9/" );
} 
?>
