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
//sueño
$horasl;
$horasm;
$horasmi;
$horasj;
$horasv;
$horass;
$horasd;
$csuenol;
$csuenom;
$csuenomi;
$csuenoj;
$csuenov;
$csuenos;
$csuenod;
//peso
$pesoini;
$pesofin;
$pesocambio;
$siento;
$funciono;
$nofunciono;
$orgulloso;

//verduras
$lunv;
$marv;
$mierv;
$juev;
$viev;
$sabv;
$domv;
//frutas
$lunf;
$marf;
$mierf;
$juef;
$vief;
$sabf;
$domf;
//carbohidratos
$lunc;
$marc;
$mierc;
$juec;
$viec;
$sabc;
$domc;
//proteina
//
$lunp;
$marp;
$mierp;
$juep;
$viep;
$sabp;
$domp;
//grasas
$lung;
$marg;
$mierg;
$jueg;
$vieg;
$sabg;
$domg;
//dulces
$lund;
$mard;
$mierd;
$jued;
$vied;
$sabd;
$domd;
//dato
$mv;
$mf;
$mc;
$mp;
$mg;
$md;



if ( isset( $_POST['horasl'] ) ) {
	$horasl = $_POST['horasl'];
} else {
	$horasl = 0;
}
if ( isset( $_POST['horasm'] ) ) {
	$horasm = $_POST['horasm'];
} else {
	$horasm = 0;
}
if ( isset( $_POST['horasmi'] ) ) {
	$horasmi = $_POST['horasmi'];
} else {
	$horasmi = 0;
}
if ( isset( $_POST['horasj'] ) ) {
	$horasj = $_POST['horasj'];
} else {
	$horasj = 0;
}
if ( isset( $_POST['horasv'] ) ) {
	$horasv = $_POST['horasv'];
} else {
	$horasv = 0;
}
if ( isset( $_POST['horass'] ) ) {
	$horass = $_POST['horass'];
} else {
	$horass = 0;
}
if ( isset( $_POST['horasd'] ) ) {
	$horasd = $_POST['horasd'];
} else {
	$horasd = 0;
}
if ( isset( $_POST['calidad-suenol'] ) ) {
	$csuenol = $_POST['calidad-suenol'];
} else {
	$csuenol = 0;
}
if ( isset( $_POST['calidad-suenom'] ) ) {
	$csuenom = $_POST['calidad-suenom'];
} else {
	$csuenom = 0;
}
if ( isset( $_POST['calidad-suenomi'] ) ) {
	$csuenomi = $_POST['calidad-suenomi'];
} else {
	$csuenomi = 0;
}
if ( isset( $_POST['calidad-suenoj'] ) ) {
	$csuenoj = $_POST['calidad-suenoj'];
} else {
	$csuenoj = 0;
}
if ( isset( $_POST['calidad-suenov'] ) ) {
	$csuenov = $_POST['calidad-suenov'];
} else {
	$csuenov = 0;
}
if ( isset( $_POST['calidad-suenos'] ) ) {
	$csuenos = $_POST['calidad-suenos'];
} else {
	$csuenos = 0;
}
if ( isset( $_POST['calidad-suenod'] ) ) {
	$csuenod = $_POST['calidad-suenod'];
} else {
	$csuenod = 0;
}
if ( isset( $_POST['dom-aero'] ) ) {
	$domingoaero = $_POST['dom-aero'];
} else {
	$domingoaero = 0;
}
if ( isset( $_POST['lun-aero'] ) ) {
	$lunesaero = $_POST['lun-aero'];
} else {
	$lunesaero = 0;
}
if ( isset( $_POST['mar-aero'] ) ) {
	$martesaero = $_POST['mar-aero'];
} else {
	$martesaero = 0;
}
if ( isset( $_POST['mier-aero'] ) ) {
	$miercolesaero = $_POST['mier-aero'];
} else {
	$miercolesaero = 0;
}
if ( isset( $_POST['jue-aero'] ) ) {
	$juevesaero = $_POST['jue-aero'];
} else {
	$juevesaero = 0;
}
if ( isset( $_POST['vie-aero'] ) ) {
	$viernesaero = $_POST['vie-aero'];
} else {
	$viernesaero = 0;
}
if ( isset( $_POST['sab-aero'] ) ) {
	$sabadoaero = $_POST['sab-aero'];
} else {
	$sabadoaero = 0;
}

if ( isset( $_POST['dom-est'] ) ) {
	$domingoestira = $_POST['dom-est'];
} else {
	$domingoestira = 0;
}
if ( isset( $_POST['lun-est'] ) ) {
	$lunesestira = $_POST['lun-est'];
} else {
	$lunesestira = 0;
}
if ( isset( $_POST['mar-est'] ) ) {
	$martesestira = $_POST['mar-est'];
} else {
	$martesestira = 0;
}
if ( isset( $_POST['mier-est'] ) ) {
	$miercolesestira = $_POST['mier-est'];
} else {
	$miercolesestira = 0;
}
if ( isset( $_POST['jue-est'] ) ) {
	$juevesestira = $_POST['jue-est'];
} else {
	$juevesestira = 0;
}
if ( isset( $_POST['vie-est'] ) ) {
	$viernesestira = $_POST['vie-est'];
} else {
	$viernesestira = 0;
}
if ( isset( $_POST['sab-est'] ) ) {
	$sabadoestira = $_POST['sab-est'];
} else {
	$sabadoestira = 0;
}

//fuerza

if ( isset( $_POST['dom-fue'] ) ) {
	$domingofue = $_POST['dom-fue'];
} else {
	$domingofue = 0;
}
if ( isset( $_POST['lun-fue'] ) ) {
	$lunesfue = $_POST['lun-fue'];
} else {
	$lunesfue = 0;
}
if ( isset( $_POST['mar-fue'] ) ) {
	$martesfue = $_POST['mar-fue'];
} else {
	$martesfue = 0;
}
if ( isset( $_POST['mier-fue'] ) ) {
	$miercolesfue = $_POST['mier-fue'];
} else {
	$miercolesfue = 0;
}
if ( isset( $_POST['jue-fue'] ) ) {
	$juevesfue = $_POST['jue-fue'];
} else {
	$juevesfue = 0;
}
if ( isset( $_POST['vie-fue'] ) ) {
	$viernesfue = $_POST['vie-fue'];
} else {
	$viernesfue = 0;
}
if ( isset( $_POST['sab-fue'] ) ) {
	$sabadofue = $_POST['sab-fue'];
} else {
	$sabadofue = 0;
}
if ( isset( $_POST['peso-inicial'] ) ) {
	if(empty($_POST['peso-inicial']))
		$pesoini = 0;
	else
	$pesoini = $_POST['peso-inicial'];
	
} else {
	$pesoini = 0;
}
if ( isset( $_POST['peso-hoy'] ) ) {
	if(empty($_POST['peso-hoy']))
		$pesofin = 0;
	else
	$pesofin = $_POST['peso-hoy'];
	
} else {
	$pesofin = 0;
}
$pesocambio=$pesoini-$pesofin;
if ( isset( $_POST['siento-alimento'] ) ) {
	$siento = $_POST['siento-alimento'];
} else {
	$siento = 1;
}
if ( isset( $_POST['funciono-bien'] ) ) {
	$funciono = $_POST['funciono-bien'];
} else {
	$funciono = "";
}
if ( isset( $_POST['no-funciono-bien'] ) ) {
	$nofunciono = $_POST['no-funciono-bien'];
} else {
	$nofunciono = "";
}
if ( isset( $_POST['orgulloso'] ) ) {
	$orgulloso = $_POST['orgulloso'];
} else {
	$orgulloso = "";
}
//verduras
if ( isset( $_POST['lun-v'] ) ) {
	$lunv = $_POST['lun-v'];
} else {
	$lunv = 0;
}
if ( isset( $_POST['mar-v'] ) ) {
	$marv = $_POST['mar-v'];
} else {
	$marv = 0;
}
if ( isset( $_POST['mier-v'] ) ) {
	$mierv = $_POST['mier-v'];
} else {
	$mierv = 0;
}
if ( isset( $_POST['jue-v'] ) ) {
	$juev = $_POST['jue-v'];
} else {
	$juev = 0;
}
if ( isset( $_POST['vie-v'] ) ) {
	$viev = $_POST['vie-v'];
} else {
	$viev = 0;
}
if ( isset( $_POST['sab-v'] ) ) {
	$sabv = $_POST['sab-v'];
} else {
	$sabv = 0;
}
if ( isset( $_POST['dom-v'] ) ) {
	$domv = $_POST['dom-v'];
} else {
	$domv = 0;
}
$mv="{$lunv}-{$marv}-{$mierv}-{$juev}-{$viev}-{$sabv}-{$domv}";
//frutas
if ( isset( $_POST['lun-f'] ) ) {
	$lunf = $_POST['lun-f'];
} else {
	$lunf = 0;
}
if ( isset( $_POST['mar-f'] ) ) {
	$marf = $_POST['mar-f'];
} else {
	$marf = 0;
}
if ( isset( $_POST['mier-f'] ) ) {
	$mierf = $_POST['mier-f'];
} else {
	$mierf = 0;
}
if ( isset( $_POST['jue-f'] ) ) {
	$juef = $_POST['jue-f'];
} else {
	$juef = 0;
}
if ( isset( $_POST['vie-f'] ) ) {
	$vief = $_POST['vie-f'];
} else {
	$vief = 0;
}
if ( isset( $_POST['sab-f'] ) ) {
	$sabf = $_POST['sab-f'];
} else {
	$sabf = 0;
}
if ( isset( $_POST['dom-f'] ) ) {
	$domf = $_POST['dom-f'];
} else {
	$domf = 0;
}
$mf="{$lunf}-{$marf}-{$mierf}-{$juef}-{$vief}-{$sabf}-{$domf}";
//carbo
if ( isset( $_POST['lun-c'] ) ) {
	$lunc = $_POST['lun-c'];
} else {
	$lunc = 0;
}
if ( isset( $_POST['mar-c'] ) ) {
	$marc = $_POST['mar-c'];
} else {
	$marc = 0;
}
if ( isset( $_POST['mier-c'] ) ) {
	$mierc = $_POST['mier-c'];
} else {
	$mierc = 0;
}
if ( isset( $_POST['jue-c'] ) ) {
	$juec = $_POST['jue-c'];
} else {
	$juec = 0;
}
if ( isset( $_POST['vie-c'] ) ) {
	$viec = $_POST['vie-c'];
} else {
	$viec = 0;
}
if ( isset( $_POST['sab-c'] ) ) {
	$sabc = $_POST['sab-c'];
} else {
	$sabc = 0;
}
if ( isset( $_POST['dom-c'] ) ) {
	$domc = $_POST['dom-c'];
} else {
	$domc = 0;
}
$mc="{$lunc}-{$marc}-{$mierc}-{$juec}-{$viec}-{$sabc}-{$domc}";
//proteinas
if ( isset( $_POST['lun-p'] ) ) {
	$lunp = $_POST['lun-p'];
} else {
	$lunp = 0;
}
if ( isset( $_POST['mar-p'] ) ) {
	$marp = $_POST['mar-p'];
} else {
	$marp = 0;
}
if ( isset( $_POST['mier-p'] ) ) {
	$mierp = $_POST['mier-p'];
} else {
	$mierp = 0;
}
if ( isset( $_POST['jue-p'] ) ) {
	$juep = $_POST['jue-p'];
} else {
	$juep = 0;
}
if ( isset( $_POST['vie-p'] ) ) {
	$viep = $_POST['vie-p'];
} else {
	$viep = 0;
}
if ( isset( $_POST['sab-p'] ) ) {
	$sabp = $_POST['sab-p'];
} else {
	$sabp = 0;
}
if ( isset( $_POST['dom-p'] ) ) {
	$domp = $_POST['dom-p'];
} else {
	$domp = 0;
}
$mp="{$lunp}-{$marp}-{$mierp}-{$juep}-{$viep}-{$sabp}-{$domp}";
//grasas
if ( isset( $_POST['lun-g'] ) ) {
	$lung = $_POST['lun-g'];
} else {
	$lung = 0;
}
if ( isset( $_POST['mar-g'] ) ) {
	$marg = $_POST['mar-g'];
} else {
	$marg = 0;
}
if ( isset( $_POST['mier-g'] ) ) {
	$mierg = $_POST['mier-g'];
} else {
	$mierg = 0;
}
if ( isset( $_POST['jue-g'] ) ) {
	$jueg = $_POST['jue-g'];
} else {
	$jueg = 0;
}
if ( isset( $_POST['vie-g'] ) ) {
	$vieg = $_POST['vie-g'];
} else {
	$vieg = 0;
}
if ( isset( $_POST['sab-g'] ) ) {
	$sabg = $_POST['sab-g'];
} else {
	$sabg = 0;
}
if ( isset( $_POST['dom-g'] ) ) {
	$domg = $_POST['dom-g'];
} else {
	$domg = 0;
}
$mg="{$lung}-{$marg}-{$mierg}-{$jueg}-{$vieg}-{$sabg}-{$domg}";
//dulces
if ( isset( $_POST['lun-d'] ) ) {
	$lund = $_POST['lun-d'];
} else {
	$lund = 0;
}
if ( isset( $_POST['mar-d'] ) ) {
	$mard = $_POST['mar-d'];
} else {
	$mard = 0;
}
if ( isset( $_POST['mier-d'] ) ) {
	$mierd = $_POST['mier-d'];
} else {
	$mierd = 0;
}
if ( isset( $_POST['jue-d'] ) ) {
	$jued = $_POST['jue-d'];
} else {
	$jued = 0;
}
if ( isset( $_POST['vie-d'] ) ) {
	$vied = $_POST['vie-d'];
} else {
	$vied = 0;
}
if ( isset( $_POST['sab-d'] ) ) {
	$sabd = $_POST['sab-d'];
} else {
	$sabd = 0;
}
if ( isset( $_POST['dom-d'] ) ) {
	$domd = $_POST['dom-d'];
} else {
	$domd = 0;
}
$md="{$lund}-{$mard}-{$mierd}-{$jued}-{$vied}-{$sabd}-{$domd}";



if ( isset( $_POST['lunes'] ) ) {
	$fechaini = $_POST['lunes'];
} else {
	$fechaini = "0000-00-00";
}
if ( isset( $_POST['domingo'] ) ) {
	$fechafin = $_POST['domingo'];
} else {
	$fechafin = "0000-00-00";
}
if ( isset( $_POST['mysingle'] ) ) {
	$mysingle = $_POST['mysingle'];
} else {
	header( "Location:" . site_url() . "/introduccion-9/" );
}
$current_user = wp_get_current_user();
$id = $current_user->ID;
//insercion
if ( $mysingle == 462 ) {
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
		$q->execute();
		header( "Location:" . site_url() . "/actividad/registro-de-actividad-fisica/?guardado=true" );
		$conn = null;
	} catch ( PDOException $e ) {
		echo "" . $e->getMessage();
//header( "Location:" . site_url() . "/login/" );
		die();
		header( "Location:" . site_url() . "/actividad/registro-de-actividad-fisica/?guardado=true" );
	}
//end actividad fisica
} else if ( $mysingle == 461 ) {
	//start peso y alimentacion
	
	try {
		$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = " UPDATE wp_userspesoalimentacion SET `pesoini`={$pesoini},`pesofin`={$pesofin},`cambio`={$pesocambio},`siento`={$siento},`mvd`='{$mv}',`mfd`='{$mf}',`mcd`='{$mc}',`mpd`='{$mp}',`mgd`='{$mg}',`mdd`='{$md}',`funciono`='{$funciono}',`nofunciono`='{$nofunciono}',`orgulloso`='{$orgulloso}' 
			  WHERE `user_id`={$id} and `fechaini`='{$fechaini}' and `fechafin`='{$fechafin}'; ";
		// echo $martesaero;
		echo $sql;
		$q = $conn->prepare( $sql );
		$q->execute();
		header( "Location:" . site_url() . "/actividad/registro-de-peso-y-alimentacion/?guardado=true" );
		$conn = null;
	} catch ( PDOException $e ) {
		echo "" . $e->getMessage();
//header( "Location:" . site_url() . "/login/" );
		die();
		header( "Location:" . site_url() . "/actividad/registro-de-peso-y-alimentacion/?guardado=true" );
	}

	//
	//end peso y alimentacion
} else if ( $mysingle == 61 ) {
	//startt diario de sueño
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";

	try {
		$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = " UPDATE `wp_usersregistrosueno` SET `lun`={$horasl},`mar`={$horasm},`mier`={$horasmi},`jue`={$horasj},`vie`={$horasv},`sab`={$horass},`dom`={$horasd},`cdom`={$csuenod},`clun`={$csuenol},`cmar`={$csuenom},`cmier`={$csuenomi},`cjue`={$csuenoj},`cvie`={$csuenov},`csab`={$csuenos}
			  WHERE `user_id`={$id} and `fechaini`='{$fechaini}' and `fechafin`='{$fechafin}'; ";
		// echo $martesaero;
		echo $sql;
		$q = $conn->prepare( $sql );
		$q->execute();
		header( "Location:" . site_url() . "/actividad/duerme-bien/?guardado=true" );
		$conn = null;
	} catch ( PDOException $e ) {
		echo "" . $e->getMessage();
//header( "Location:" . site_url() . "/login/" );
		die();
		header( "Location:" . site_url() . "/actividad/duerme-bien/?guardado=true" );
	}
	//end diaro de sueño
} else {
	header( "Location:" . site_url() . "/introduccion-9/" );
}
?>
