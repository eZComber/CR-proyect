<?php
include 'core/kernel.php';
require_login();
global $dbcon;

$usuario = $_POST["usuarioreportante"];
$motivo = 'Reporte';
$mensaje = 'Usuario reportado: '.$_POST["vendedor"].' en el producto '.$_POST["idproducto"].' con el mensaje: '.$_POST["mensajedereporte"];

$mensaje = cleanValue($mensaje);



initDatabase();
$consultareporte = "INSERT INTO contacto (usuario, mensaje, motivo) VALUES ('$usuario', '$mensaje' , '$motivo' ) ";
if (mysqli_query($dbcon, $consultareporte) ) {

	header("Location: producto?id=".$_POST["idproducto"]."&reporte=1");

}
else{
	echo 'ha ocurrido un error';
}

closeDatabase();

?>
