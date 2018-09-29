<?php
include("core/kernel.php");
require_login();
global $dbcon;
global $billetesdelusuario;


$usuario = $_SESSION["username"];
initDatabase();
$pid = intval($_POST["idproducto"]);
$billetesproducto = "SELECT billetes FROM productos WHERE id ='$pid' ";
$resultadobilletes = mysqli_query($dbcon, $billetesproducto);
$filaresultado = mysqli_fetch_row($resultadobilletes);
$billetespublicacion = intval($_POST["crs"]);

if ($billetespublicacion < 1){
header("Location: panel?agregado=2");
return false;
}

if ($billetespublicacion > $billetesdelusuario){
header("Location: crs");
return false;
}

$billetespublicacionfinal = $billetespublicacion + $filaresultado[0];
$insertarbilletes = ("UPDATE productos SET billetes = $billetespublicacionfinal WHERE id = '$pid'");
mysqli_query($dbcon, $insertarbilletes);
$billetesaquitar = $billetesdelusuario - $billetespublicacion;
$quitarbilletes="UPDATE cr_users SET billetes = $billetesaquitar WHERE username = '$usuario'";
mysqli_query($dbcon,$quitarbilletes);
header("Location: panel?agregado=1");

closeDatabase();

?>
