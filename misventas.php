<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);
  .card-img-top{
  	border-radius: 4px;
  }
	.card {
	border-radius: 0 !important;
	border: 0 none;
	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	}
	.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    /*object-fit: cover;
    min-height: 100%;
    min-width: 100%;
    */
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}
</style>
<?php
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();
global $dbcon;

$usuario = $_SESSION["username"];

?>

<div class="container">
<div class="row" style="padding:2%;">

<?php

initDatabase();

$consulta1 = "SELECT * FROM atendedores WHERE nombre = '$usuario' ";
$respuesta1 = mysqli_query($dbcon, $consulta1);
while(($resultado1=mysqli_fetch_row($respuesta1))==true){
$pedido = $resultado1[4];

$consulta2 = "SELECT * FROM pedidos WHERE id = '$pedido' ";
$respuesta2 = mysqli_query($dbcon, $consulta2);
$resultado2 = mysqli_fetch_row($respuesta2);
if (isset($resultado2[0])){
	$cantidad = $resultado2[2];
	$cantidad = explode(":", $cantidad);
	$categorias = $resultado2[1];
	$categorias = explode(":", $categorias);
	$len=count($categorias);
?>
<div class="col-md-4">
	<figure class="card card-product">
		<figcaption class="info-wrap">
				<h4 class="title"><?php for ($i=0;$i<$len;$i++) {echo $categorias[$i]." Cantidad: ".$cantidad[$i]."<br>";} ?></h4>
				<p class="desc"><?php if(strlen($resultado2[3]) > 60){echo substr($resultado2[3], 0, 60).'...'; }else{echo $resultado2[3];} ?></p>
		</figcaption>
		<div class="bottom-wrap">
			<a href="<?php echo 'pedido?id='.$resultado2[0]; ?>" class="btn btn-sm btn-primary float-right">Visitar</a>	
		</div>
	</figure>
</div>

<?php
}
else{
	initDatabase();
	$borrar = "DELETE FROM atendedores WHERE pedido = $pedido";
	mysqli_query($dbcon, $borrar);
	closeDatabase();
}
}

closeDatabase();
?>
</div>
</div>
