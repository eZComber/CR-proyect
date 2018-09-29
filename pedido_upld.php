<?php
include 'core/kernel.php';
require_login();
global $dbcon;

$usuario = $_SESSION["username"];
$cantidad = cleanValue($_POST["cantidad"]);
$descripcion = cleanValue($_POST["descripcion"]);

initDatabase();
$qselect = "SELECT * FROM cr_users WHERE username = '$usuario' ";
$rselect = mysqli_query($dbcon, $qselect);
$fselect = mysqli_fetch_row($rselect);

$departamento = $fselect[12];
$barrio = $fselect[13];
$direccion = $fselect[14];
$comercio = $fselect[15];

$categoria1 = $_POST["categoriaproducto1"];
$categoria2 = $_POST["categoriaproducto2"];
$categoria3 = $_POST["categoriaproducto3"];
$categoria4 = $_POST["categoriaproducto4"];
$categoria5 = $_POST["categoriaproducto5"];

$categoria = $categoria1;

if (strlen($categoria2)>1 ){
	$categoria2 = ":".$categoria2;
	$categoria = $categoria1.$categoria2;
}
if (strlen($categoria3)>1 ){
	$categoria3 = ":".$categoria3;
	$categoria = $categoria1.$categoria2.$categoria3;
}
if (strlen($categoria4 )>1 ){
	$categoria4 = ":".$categoria4;
	$categoria = $categoria1.$categoria2.$categoria3.$categoria4;
}
if (strlen($categoria5 )>1 ){
	$categoria5 = ":".$categoria5;
	$categoria = $categoria1.$categoria2.$categoria3.$categoria4.$categoria5;
}

$cantidad1 = $_POST["cantidad1"];
$cantidad2 = $_POST["cantidad2"];
$cantidad3 = $_POST["cantidad3"];
$cantidad4 = $_POST["cantidad4"];
$cantidad5 = $_POST["cantidad5"];

$cantidad = $cantidad1;

if (strlen($cantidad2)>1 ){
	$cantidad2 = ":".$cantidad2;
	$cantidad = $cantidad1.$cantidad2;
}
if (strlen($cantidad3)>1 ){
	$cantidad3 = ":".$cantidad3;
	$cantidad = $cantidad1.$cantidad2.$cantidad3;
}
if (strlen($cantidad4 )>1 ){
	$cantidad4 = ":".$cantidad4;
	$cantidad = $cantidad1.$cantidad2.$cantidad3.$cantidad4;
}
if (strlen($cantidad5 )>1 ){
	$cantidad5 = ":".$cantidad5;
	$cantidad = $cantidad1.$cantidad2.$cantidad3.$cantidad4.$cantidad5;
}


$qinsert = "INSERT INTO pedidos (categoria,cantidad,descripcion,departamento,barrio,direccion,comercio,usuario) VALUES ('$categoria','$cantidad','$descripcion','$departamento','$barrio','$direccion','$comercio','$usuario')";
if (mysqli_query($dbcon, $qinsert)){
	header("Location: pedidos?subido=1");
} 
else{
	header("Location: pedidos?subido=2");
}
closeDatabase();

?>