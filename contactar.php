<?php
include 'core/kernel.php';
require_login();
global $dbcon;

$usuario = $_SESSION["username"];
$motivo = cleanValue($_POST["motivo"]);
$mensaje = cleanValue($_POST["mensaje"]);

if ( strlen($motivo) < 1 || strlen($mensaje) < 1 ){header("Location: premium?enviado=2"); return false;}

initDatabase();
$consulta = "INSERT INTO contacto (usuario, mensaje, motivo) VALUES ('$usuario', '$mensaje', '$motivo') ";
if(mysqli_query($dbcon, $consulta) ){
	header("Location: premium?enviado=1");
}else{
	header("Location: premium?enviado=2");
}
closeDatabase();
?>
