<?php

/*
  @package micorazon
  Template Name: imc-json
 * 
 

echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

if(isset($_POST['peso']))
    $peso=$_POST['peso'];
else
	$peso=0;
if(isset($_POST['altura']) && $_POST['altura']>0)
    $altura=$_POST['altura'];
else
	$altura=1;
$imc=calculaIMC($peso,$altura);

function calculaIMC($peso,$altura){
	$altura=$altura/100;
	return $peso/( ( $altura * $altura ) );
}

echo "{"
. "\"success\":true,";
echo "\"imc\":".$imc."}";
?>
