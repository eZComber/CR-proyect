<?php
include 'core/kernel.php';
require_login();
global $dbcon;

$usuario = $_POST["usuarioreportante"];
$motivo = 'Reporte';
$mensaje = 'Usuario reportado: '.$_POST["vendedor"].' en el pedido '.$_POST["idpedido"].' con el mensaje: '.$_POST["mensajedereporte"];

$mensaje = cleanValue($mensaje);



initDatabase();
$consultareporte = "INSERT INTO contacto (usuario, mensaje, motivo) VALUES ('$usuario', '$mensaje' , '$motivo' ) ";
if (mysqli_query($dbcon, $consultareporte) ) {

	header("Location: pedido?id=".$_POST["idpedido"]."&reporte=1");

}
else{
	echo 'ha ocurrido un error';
}

closeDatabase();

?>
