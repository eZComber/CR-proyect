<?php
include 'core/kernel.php';
if(!is_logged()){
  header("Location: " . WEB_RUTA . "/login");
}
else{
function preguntar($productoid, $autor, $pregunta) {
	global $dbcon;
    initDatabase();
	$consulta = "INSERT INTO productos_preguntas (productoid, usuario, pregunta) VALUES ('$productoid' , '$autor', '$pregunta')";
	return mysqli_query($dbcon, $consulta);
	closeDatabase();
}

function responder($id, $respuesta){
    global $dbcon;
    initDatabase();
	$consulta2 = "UPDATE productos_preguntas SET respuesta = '$respuesta' WHERE id = $id";
	return mysqli_query($dbcon, $consulta2);
	closeDatabase();
}

if (isset($_POST["productopregunta"]) && strlen($_POST["productopregunta"]) > 0){
$id = $_POST["idproducto"];
$usuario = $_POST["usuarioemisor"];
$usuariopregunta = cleanValue($_POST["productopregunta"]);
preguntar($id, $usuario, $usuariopregunta);
header("Location: producto?id=".$id.'&enviado=1');
}

elseif ( isset($_POST["productorespuesta"]) && strlen($_POST["productorespuesta"]) > 0 ){
	$id = $_POST["idpregunta"];
	$productoid = $_POST["idproducto"];
	$usuariorespuesta = cleanValue($_POST["productorespuesta"]);
	responder($id, $usuariorespuesta);
	header("Location: producto?id=".$productoid.'&enviado=1');
}
}
?>