<?php
ob_start();
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();

initDatabase();
$usuario_sesion = $_SESSION['username'];

$id = cleanValue($_GET['id']);

$consulta="SELECT * FROM pedidos";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
  if($fila[0]==$id){
    $usuario = $fila[9];
  }
}

if($usuario_sesion==$usuario){
  $sql = "DELETE FROM pedidos WHERE id='$id'";
  mysqli_query($dbcon, $sql);
  header("Location: pedidos?eliminado=1");
}
else{
	header("Location: pedidos?eliminado=2");
}
closeDatabase();
?>
