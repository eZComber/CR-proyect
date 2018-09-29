<?php
ob_start();
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();

initDatabase();
$usuario_sesion = $_SESSION['username'];

$id = $_GET['id'];

$consulta="SELECT * FROM productos";
$resultados=mysqli_query($dbcon,$consulta);
while(($fila=mysqli_fetch_row($resultados))==true){
  if($fila[0]==$id){
    $vendedor = $fila[1];
    $imagen = $fila[7];
  }
}

if($usuario_sesion==$vendedor){
  $sql = "DELETE FROM productos WHERE id='$id'";
  mysqli_query($dbcon, $sql);
  unlink('public/img/subidas/'.$imagen);
  header("Location: panel?eliminado=1");
}
else{
	header("Location: panel?eliminado=2");
}
closeDatabase();
?>
