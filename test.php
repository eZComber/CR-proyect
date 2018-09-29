<?php
include 'core/kernel.php';
global $dbcon;

initDatabase();
$querypedidos = "SELECT * FROM pedidos";
$resultadopedidos = mysqli_query($dbcon, $querypedidos);
while(($filapedidos = mysqli_fetch_row($resultadopedidos))==true) {

$categorias = $filapedidos[1];
$categorias = explode(":", $categorias);
$len=count($categorias);
echo "<br>";
for ($i=0;$i<$len;$i++)
   echo $categorias[$i]."<br>";

}
closeDatabase();
?>


