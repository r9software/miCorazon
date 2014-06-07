<?php

/*
  @package micorazon
  Template Name: cuestionario-dao

  echo "<pre>";
  print_r( $_POST);
  echo '</pre>';
 * 
 */
$current_user = wp_get_current_user();
$id = $current_user->ID;
$cps;
$cpd;
$glucosa;
$cg;
$trigliceridos;
$ct;
$peso;
$altura;
$imc;
$rfruta;
$rverdura;
$fempanizado;
$fazucaradas;
$fsal;
$nestres;
$afisicas;
$hsueno;
$fumas;
$ffumas1;
$ffumas2;
//familiares directos
$fd;
$pcardio = 0;
$mcardio = 0;
$apbcardio = 0;
$abapcardio = 0;
$abmcardio = 0;
$abamcardio = 0;
$padreevc = 0;
$madreevc = 0;
$apbevc = 0;
$abapevc = 0;
$abmevc = 0;
$abamevc = 0;
$padremiocardio = 0;
$madremiocardio = 0;
$apbmiocardio = 0;
$abapmiocardio = 0;
$abmmiocardio = 0;
$abammiocardio = 0;
$padreacs = 0;
$madreacs = 0;
$apbacs = 0;
$abapacs = 0;
$abmacs = 0;
$abamacs = 0;


$presion = $_POST['presion'];
if ( isset( $_POST['cifra-presion-sistolico'] ) ) {
	$cps = $_POST['cifra-presion-sistolico'];
} else {
	$cps = 0;
}
if ( isset( $_POST['cifra-presion-diastolico'] ) ) {
	$cpd = $_POST['cifra-presion-diastolico'];
} else {
	$cpd = 0;
}
if ( isset( $_POST['cifra-presion-diastolico'] ) ) {
	$cpd = $_POST['cifra-presion-diastolico'];
} else {
	$cpd = 0;
}
if ( isset( $_POST['cifra-presion-sistolico'] ) ) {
	$cps = $_POST['cifra-presion-sistolico'];
} else {
	$cps = 0;
}
if ( isset( $_POST['glucosa'] ) ) {
	$glucosa = $_POST['glucosa'];
} else {
	$glucosa = 0;
}
if ( isset( $_POST['cifra-glucosa'] ) ) {
	$cg = $_POST['cifra-glucosa'];
} else {
	$cg = 0;
}
if ( isset( $_POST['trigliceridos'] ) ) {
	$trigliceridos = $_POST['trigliceridos'];
} else {
	$trigliceridos = 0;
}
if ( isset( $_POST['cifra-trigliceridos'] ) ) {
	$ct = $_POST['cifra-trigliceridos'];
} else {
	$ct = 0;
}
if ( isset( $_POST['peso'] ) ) {
	$peso = $_POST['peso'];
} else {
	$peso = 0;
}
if ( isset( $_POST['altura'] ) ) {
	$altura = $_POST['altura'];
} else {
	$altura = 0;
}
if ( isset( $_POST['raciones-fruta'] ) ) {
	$rfruta = $_POST['raciones-fruta'];
} else {
	$rfruta = 0;
}
if ( isset( $_POST['raciones-verdura'] ) ) {
	$rverdura = $_POST['raciones-verdura'];
} else {
	$rverdura = 0;
}
if ( isset( $_POST['frecuencia-empanizado'] ) ) {
	$fempanizado = $_POST['frecuencia-empanizado'];
} else {
	$fempanizado = 0;
}
if ( isset( $_POST['frecuencia-azucaradas'] ) ) {
	$fazucaradas = $_POST['frecuencia-azucaradas'];
} else {
	$fazucaradas = 0;
}
if ( isset( $_POST['frecuencia-sal'] ) ) {
	$fsal = $_POST['frecuencia-sal'];
} else {
	$fsal = 0;
}
if ( isset( $_POST['nivel-estres'] ) ) {
	$nestres = $_POST['nivel-estres'];
} else {
	$nestres = 0;
}
if ( isset( $_POST['actividades-fisicas'] ) ) {
	$afisicas = $_POST['actividades-fisicas'];
} else {
	$afisicas = 0;
}
if ( isset( $_POST['hora-sueno'] ) ) {
	$hsueno = $_POST['hora-sueno'];
} else {
	$hsueno = 0;
}
if ( isset( $_POST['fumas'] ) ) {
	$fumas = $_POST['fumas'];
} else {
	$fumas = 0;
}
if ( isset( $_POST['frecuencia-fumas'] ) ) {
	$ffumas1 = $_POST['frecuencia-fumas'];
} else {
	$ffumas1 = 0;
}
if ( isset( $_POST['frecuencia-fumas2'] ) ) {
	$ffumas2 = $_POST['frecuencia-fumas2'];
} else {
	$ffumas2 = 0;
}

if ( isset( $_POST['familiar-directo'] ) ) {
	if ( $_POST['familiar-directo'] ) {
		$fd = $_POST['familiar-directo'];

		if ( $_POST['padre-cardio'] ) {
			$pcardio = $_POST['padre-cardio'];
		}
		if ( $_POST['madre-cardio'] ) {
			$mcardio = $_POST['madre-cardio'];
		}
		if ( $_POST['apb-cardio'] ) {
			$apbcardio = $_POST['apb-cardio'];
		}
		if ( $_POST['abap-cardio'] ) {
			$abapcardio = $_POST['abap-cardio'];
		}
		if ( $_POST['abm-cardio'] ) {
			$abmcardio = $_POST['abm-cardio'];
		}
		if ( $_POST['abam-cardio'] ) {
			$abamcardio = $_POST['abam-cardio'];
		}
		if ( $_POST['padre-evc'] ) {


			$padreevc = $_POST['padre-evc'];
		}
		if ( $_POST['madre-evc'] ) {
			$madreevc = $_POST['madre-evc'];
		}
		if ( $_POST['apb-evc'] ) {
			$apbevc = $_POST['apb-evc'];
		}
		if ( $_POST['abap-evc'] ) {
			$abapevc = $_POST['abap-evc'];
		}
		if ( $_POST['abm-evc'] ) {
			$abmevc = $_POST['abm-evc'];
		}
		if ( $_POST['abam-evc'] ) {
			$abamevc = $_POST['abam-evc'];
		}
		if ( $_POST['padre-miocardio'] ) {

			$padremiocardio = $_POST['padre-miocardio'];
		}
		if ( $_POST['madre-miocardio'] ) {
			$madremiocardio = $_POST['madre-miocardio'];
		}
		if ( $_POST['apb-miocardio'] ) {
			$apbmiocardio = $_POST['apb-miocardio'];
		}
		if ( $_POST['abap-miocardio'] ) {
			$abapmiocardio = $_POST['abap-miocardio'];
		}
		if ( $_POST['abm-miocardio'] ) {
			$abmmiocardio = $_POST['abm-miocardio'];
		}
		if ( $_POST['abam-miocardio'] ) {
			$abammiocardio = $_POST['abam-miocardio'];
		}
		if ( $_POST['padre-acs'] ) {

			$padreacs = $_POST['padre-acs'];
		}
		if ( $_POST['madre-acs'] ) {
			$madreacs = $_POST['madre-acs'];
		}
		if ( $_POST['apb-acs'] ) {
			$apbacs = $_POST['apb-acs'];
		}
		if ( $_POST['abap-acs'] ) {
			$abapacs = $_POST['abap-acs'];
		}
		if ( $_POST['abm-acs'] ) {
			$abmacs = $_POST['abm-acs'];
		}
		if ( $_POST['abam-acs'] ) {
			$abamacs = $_POST['abam-acs'];
		}
	}
}


try {
	$conn = new PDO( 'mysql:host=localhost;dbname=micorazon', "root", DB_PASSWORD );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$sql = "INSERT INTO wp_usersmedicalinfo(`user_id`, `presion`, `cifra_ps`, `cifra_pd`, `glucosa`, `cifraglucosa`, 
			`trigliceridos`, `cifratrigliceridos`, `peso`, 
			`altura`, `imc`, `r_fruta`, `r_verdura`, `f_empanizado`, 
			`f_azucaradas`, `f_sal`, `nivel_estres`, `act_fisicas`, 
			`horas_sueno`, `fumas`, `f_fumas`, `f_fumas2`) 
			VALUES (:user_id,:presion,:cifra_ps,:cifra_pd,:glucosa,:cifraglucosa,:trigliceridos,:cifratrigliceridos,:peso,:altura,:imc,:r_fruta,
			:r_verdura,:f_empanizado,:f_azucaradas,:f_sal,:nivel_estres,:act_fisicas,:horas_sueno,:fumas,:f_fumas,:f_fumas2)";
	$q = $conn->prepare( $sql );
	if ( $q->execute( array( ':user_id' => $id,
				':presion' => $presion,
				':cifra_ps' => $cps,
				':cifra_pd' => $cpd,
				':glucosa' => $glucosa,
				':cifraglucosa' => $cg,
				':trigliceridos' => $trigliceridos,
				':cifratrigliceridos' => $ct,
				':peso' => $peso,
				':altura' => $altura,
				':imc' => $imc,
				':r_fruta' => $rfruta,
				':r_verdura' => $rverdura,
				':f_empanizado' => $fempanizado,
				':f_azucaradas' => $fazucaradas,
				':f_sal' => $fsal,
				':nivel_estres' => $nestres,
				':act_fisicas' => $afisicas,
				':horas_sueno' => $hsueno,
				':fumas' => $fumas,
				':f_fumas' => $ffumas1,
				':f_fumas2' => $ffumas2 ) ) ) {
		$sql = "INSERT INTO wp_usersparentinfo(`user_id`, `padre-cardio`, `madre-cardio`, `apb-cardio`, `abap-cardio`, `abm-cardio`, 
			`abam-cardio`, `padre-evc`, `madre-evc`, `apb-evc`, `abap-evc`, `abm-evc`, `abam-evc`, `padre-miocardio`, 
			`madre-miocardio`, `apb-miocardio`, `abap-miocardio`, `abm-miocardio`, `abam-miocardio`, `padre-acs`, 
			`madre-acs`, `apb-acs`, `abap-acs`, `abm-acs`, `abam-acs`) 
			VALUES (:user_id,:padre_cardio,:madre_cardio,:apb_cardio,:abap_cardio,:abm_cardio,:abam_cardio,
			:padre_evc,:madre_evc,:apb_evc,:abap_evc,:abm_evc,:abam_evc,
			:padre_miocardio,:madre_miocardio,:apb_miocardio,:abap_miocardio,:abm_miocardio,:abam_miocardio,
			:padre_acs,:madre_acs,:apb_acs,:abap_acs,:abm_acs,:abam_acs
			)";
		$q = $conn->prepare( $sql );

		if ( $q->execute( array( ':user_id' => $id, ':padre_cardio' => $pcardio, ':madre_cardio' => $mcardio, ':apb_cardio' => $apbcardio, ':abap_cardio' => $abapcardio, ':abm_cardio' => $abmcardio, ':abam_cardio' => $abamcardio,
					':padre_evc' => $padreevc, ':madre_evc' => $madreevc, ':apb_evc' => $apbevc, ':abap_evc' => $abapevc, ':abm_evc' => $abmevc, ':abam_evc' => $abamevc,
					':padre_miocardio' => $padremiocardio, ':madre_miocardio' => $madremiocardio, ':apb_miocardio' => $apbmiocardio, ':abap_miocardio' => $abapmiocardio, ':abm_miocardio' => $abmmiocardio, ':abam_miocardio' => $abammiocardio,
					':padre_acs' => $padreacs, ':madre_acs' => $madreacs, ':apb_acs' => $apbacs, ':abap_acs' => $abapacs, ':abm_acs' => $abmacs, ':abam_acs' => $abamacs ) ) ) {
			$sql = "";
			$q = $conn->prepare( $sql );
			if ( $q->execute( array() ) ) {
				header( "Location:" . site_url() . "/cuestionario/" );
			}
		}
	}
	$conn = null;
} catch ( PDOException $e ) {
	echo "ERROR: " . $e->getMessage();
	die();
}
?>