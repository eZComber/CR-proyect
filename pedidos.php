<?php
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();

global $rol;

if ($rol == 1){
  header("Location: /comprar");
}

$usuario = $_SESSION["username"];
?>

<!-- paneles -->
<head>

  <style>
  @media only screen and (max-width: 950px) {
	.smbutton{
	  max-width: 50%;
	  text-align: center;
	}
  }

  .btn-file {
	position: relative;
	overflow: hidden;
  }
  .btn-file input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
  }


  .fuentes{
	font-size:1.1em;
	font-family: "Open Sans";
	font-size: 16px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 13.4px;
  }
  .fuentes2{
	font-size:1em;
	font-family: "Open Sans";
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 13.4px;
  }

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

.boton{
  box-shadow: 0px 0px 2px 2px blue;
}

.boton:hover{
  box-shadow: 0px 1px 4px 3px blue
}
.selectbonito{
    font-size: 14px;
    line-height: 1.52857143;
    color: #555;
    background-color: #fff;
    border: 1px solid grey;
}
.navbonita{
    font-size: 1em;
    line-height: 1.52857143;
    color: #555;
}
textarea {
   resize: none;
}
  </style>

</head>

<main>

<ul class="nav nav-tabs">
  <li class="nav-item dropdown float-left d-block d-sm-none">
	<a class="nav-link dropdown-toggle boton" data-toggle="dropdown">Opciones</a>
	<div class="dropdown-menu">
	  <a class="dropdown-item" data-toggle="tab" href="#publicar">Publicar pedido</a>
	  <a class="dropdown-item" data-toggle="tab" href="#pedidos">Ver pedidos</a>
	  <a class="dropdown-item" data-toggle="tab" href="#vendedores">Vendedores</a>
	</div>
  </li>


  <li class="d-none d-sm-block nav-item">
	<a class="nav-link active navbonita" data-toggle="tab" href="#publicar">Publicar pedido</a>
  </li>
  <li class="nav-item d-none d-sm-block">
	<a class="nav-link navbonita" data-toggle="tab" href="#pedidos">Ver pedidos</a>
  </li>
  <li class="nav-item d-none d-sm-block">
	<a class="nav-link navbonita" data-toggle="tab" href="#vendedores">Vendedores</a>
  </li>
</ul>

<!-- tabs -->
<div class="tab-content">
  <div class="tab-pane container active" id="publicar"><!--inicio de la tab1 -->
   
<?php
$id_subido = $_GET['subido'];
$id_eliminado = $_GET['eliminado'];
$id_agregado = $_GET['agregado'];
$id_realizado =$_GET['realizado'];

if($id_subido==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡El pedido se ha subido correctamente!</div>';
}elseif ($id_subido==2) {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al subir el pedido</div>';
}elseif ($id_subido=='error') {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al subir el pedido</div>';
}
if($id_eliminado==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡El pedido se ha eliminado correctamente!</div>';
}elseif ($id_eliminado==2) {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al eliminar el pedido</div>';
}
if($id_realizado==1){
  echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡Se ha realizado la compra correctamente!</div>';
}
?>

    <div class="container" style="margin-top: 3%;">
      <p>Aqui podra pedir lo que necesite su comercio directamente al productor, entre 1 a 5 productos. Si necesita mas puede hacer otro pedido.</p>
      <form method="POST" action="pedido_upld">
        <div class="row">
          <div class="col-md">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="categoriaproducto1"><h5>Producto 1:</h5></label>
                <select class="selectpicker form-control" data-live-search="true" name="categoriaproducto1" id="categoriaproducto1"  data-style="selectbonito" title="Producto" required>
                    <optgroup label="Hortalizas">
                    <option>Acelga</option>
                    <option>Ajo</option>
                    <option>Albahaca</option>
                    <option>Apio</option>
                    <option>Berro</option>
                    <option>Berenjena</option>
                    <option>Boñato</option>
                    <option>Boñato zanahoria</option>
                    <option>Brocoli</option>
                    <option>Calabacin</option>
                    <option>Caquis</option>
                    <option>Calabaza</option>
                    <option>Cebolla</option>
                    <option>Cebolla de verdeo</option>
                    <option>Ciboulette</option>
                    <option>Chaucha</option>
                    <option>Choclo</option>
                    <option>Coliflor</option>
                    <option>Esparrago</option>
                    <option>Espinaca</option>
                    <option>Jengibre</option>
                    <option>Lechuga crespa</option>
                    <option>Lechuga mantecosa</option>
                    <option>Morron</option>
                    <option>Rabano</option>
                    <option>Remolacha</option>
                    <option>Repollo</option>
                    <option>Papa</option>
                    <option>Pepino</option>
                    <option>Rucula</option>
                    <option>Puerro</option>
                    <option>Tomate</option>
                    <option>Zanahoria</option>
                    <option>Zuchini</option>
                    </optgroup>
                    <optgroup label="Frutas">
                    <option>Anana</option>
                    <option>Banana</option>
                    <option>Cereza</option>
                    <option>Ciruela</option>
                    <option>Coco seco</option>
                    <option>Datiles</option>
                    <option>Frambuesa</option>
                    <option>Frutilla</option>
                    <option>Arandanos</option>
                    <option>Granada</option>
                    <option>Kiwi</option>
                    <option>Lima</option>
                    <option>Limon</option>
                    <option>Mandarina</option>
                    <option>Mango</option>
                    <option>Manzana</option>
                    <option>Durazno</option>
                    <option>Melon</option>
                    <option>Membrillo</option>
                    <option>Mamao</option>
                    <option>Naranja</option>
                    <option>Oliva</option>
                    <option>Pera</option>
                    <option>Pelon</option>
                    <option>Piña</option>
                    <option>Pomelo</option>
                    <option>Sandia</option>
                    <option>Uva</option>
                    </optgroup>
                    <optgroup label="Otros">
                    <option>Amaranto</option>
                    <option>Cilantro</option>
                    <option>Col chino</option>
                    <option>Eneldo</option>
                    <option>Escarola</option>
                    <option>Estragon</option>
                    <option>Grelo</option>
                    <option>Hinojo</option>
                    <option>Hongo</option>
                    <option>Kale</option>
                    <option>Lairel</option>
                    <option>Menta</option>
                    <option>Mizuna</option>
                    <option>Oregano</option>
                    <option>Radicheta</option>
                    <option>Romero</option>
                    <option>Tomillo</option>
                    <option>Huevo blanco</option>
                    <option>Huevo de color</option>
                    <option>Cerdo</option>
                    <option>Otros</option>
                  </optgroup>
                </select>
                 <input type="text" name="cantidad1" id="cantidad1" placeholder="Cantidad" class="form-control" maxlength="220" style="margin-top: 1%" required>
                </div>

                <div class="form-group">
                  <label for="categoriaproducto2"><h5>Producto 2:</h5></label>
                <select class="selectpicker form-control" data-live-search="true" name="categoriaproducto2" id="categoriaproducto2"  data-style="selectbonito" title="Producto">
                    <optgroup label="Hortalizas">
                    <option>Acelga</option>
                    <option>Ajo</option>
                    <option>Albahaca</option>
                    <option>Apio</option>
                    <option>Berro</option>
                    <option>Berenjena</option>
                    <option>Boñato</option>
                    <option>Boñato zanahoria</option>
                    <option>Brocoli</option>
                    <option>Calabacin</option>
                    <option>Caquis</option>
                    <option>Calabaza</option>
                    <option>Cebolla</option>
                    <option>Cebolla de verdeo</option>
                    <option>Ciboulette</option>
                    <option>Chaucha</option>
                    <option>Choclo</option>
                    <option>Coliflor</option>
                    <option>Esparrago</option>
                    <option>Espinaca</option>
                    <option>Jengibre</option>
                    <option>Lechuga crespa</option>
                    <option>Lechuga mantecosa</option>
                    <option>Morron</option>
                    <option>Rabano</option>
                    <option>Remolacha</option>
                    <option>Repollo</option>
                    <option>Papa</option>
                    <option>Pepino</option>
                    <option>Rucula</option>
                    <option>Puerro</option>
                    <option>Tomate</option>
                    <option>Zanahoria</option>
                    <option>Zuchini</option>
                    </optgroup>
                    <optgroup label="Frutas">
                    <option>Anana</option>
                    <option>Banana</option>
                    <option>Cereza</option>
                    <option>Ciruela</option>
                    <option>Coco seco</option>
                    <option>Datiles</option>
                    <option>Frambuesa</option>
                    <option>Frutilla</option>
                    <option>Arandanos</option>
                    <option>Granada</option>
                    <option>Kiwi</option>
                    <option>Lima</option>
                    <option>Limon</option>
                    <option>Mandarina</option>
                    <option>Mango</option>
                    <option>Manzana</option>
                    <option>Durazno</option>
                    <option>Melon</option>
                    <option>Membrillo</option>
                    <option>Mamao</option>
                    <option>Naranja</option>
                    <option>Oliva</option>
                    <option>Pera</option>
                    <option>Pelon</option>
                    <option>Piña</option>
                    <option>Pomelo</option>
                    <option>Sandia</option>
                    <option>Uva</option>
                    </optgroup>
                    <optgroup label="Otros">
                    <option>Amaranto</option>
                    <option>Cilantro</option>
                    <option>Col chino</option>
                    <option>Eneldo</option>
                    <option>Escarola</option>
                    <option>Estragon</option>
                    <option>Grelo</option>
                    <option>Hinojo</option>
                    <option>Hongo</option>
                    <option>Kale</option>
                    <option>Lairel</option>
                    <option>Menta</option>
                    <option>Mizuna</option>
                    <option>Oregano</option>
                    <option>Radicheta</option>
                    <option>Romero</option>
                    <option>Tomillo</option>
                    <option>Huevo blanco</option>
                    <option>Huevo de color</option>
                    <option>Cerdo</option>
                    <option>Otros</option>
                  </optgroup>
                </select>
                 <input type="text" name="cantidad2" id="cantidad2" placeholder="Cantidad" class="form-control" maxlength="220" style="margin-top: 1%">
                </div>

                <div class="form-group">
                  <label for="categoriaproducto3"><h5>Producto 3:</h5></label>
                <select class="selectpicker form-control" data-live-search="true" name="categoriaproducto3" id="categoriaproducto3"  data-style="selectbonito" title="Producto">
                    <optgroup label="Hortalizas">
                    <option>Acelga</option>
                    <option>Ajo</option>
                    <option>Albahaca</option>
                    <option>Apio</option>
                    <option>Berro</option>
                    <option>Berenjena</option>
                    <option>Boñato</option>
                    <option>Boñato zanahoria</option>
                    <option>Brocoli</option>
                    <option>Calabacin</option>
                    <option>Caquis</option>
                    <option>Calabaza</option>
                    <option>Cebolla</option>
                    <option>Cebolla de verdeo</option>
                    <option>Ciboulette</option>
                    <option>Chaucha</option>
                    <option>Choclo</option>
                    <option>Coliflor</option>
                    <option>Esparrago</option>
                    <option>Espinaca</option>
                    <option>Jengibre</option>
                    <option>Lechuga crespa</option>
                    <option>Lechuga mantecosa</option>
                    <option>Morron</option>
                    <option>Rabano</option>
                    <option>Remolacha</option>
                    <option>Repollo</option>
                    <option>Papa</option>
                    <option>Pepino</option>
                    <option>Rucula</option>
                    <option>Puerro</option>
                    <option>Tomate</option>
                    <option>Zanahoria</option>
                    <option>Zuchini</option>
                    </optgroup>
                    <optgroup label="Frutas">
                    <option>Anana</option>
                    <option>Banana</option>
                    <option>Cereza</option>
                    <option>Ciruela</option>
                    <option>Coco seco</option>
                    <option>Datiles</option>
                    <option>Frambuesa</option>
                    <option>Frutilla</option>
                    <option>Arandanos</option>
                    <option>Granada</option>
                    <option>Kiwi</option>
                    <option>Lima</option>
                    <option>Limon</option>
                    <option>Mandarina</option>
                    <option>Mango</option>
                    <option>Manzana</option>
                    <option>Durazno</option>
                    <option>Melon</option>
                    <option>Membrillo</option>
                    <option>Mamao</option>
                    <option>Naranja</option>
                    <option>Oliva</option>
                    <option>Pera</option>
                    <option>Pelon</option>
                    <option>Piña</option>
                    <option>Pomelo</option>
                    <option>Sandia</option>
                    <option>Uva</option>
                    </optgroup>
                    <optgroup label="Otros">
                    <option>Amaranto</option>
                    <option>Cilantro</option>
                    <option>Col chino</option>
                    <option>Eneldo</option>
                    <option>Escarola</option>
                    <option>Estragon</option>
                    <option>Grelo</option>
                    <option>Hinojo</option>
                    <option>Hongo</option>
                    <option>Kale</option>
                    <option>Lairel</option>
                    <option>Menta</option>
                    <option>Mizuna</option>
                    <option>Oregano</option>
                    <option>Radicheta</option>
                    <option>Romero</option>
                    <option>Tomillo</option>
                    <option>Huevo blanco</option>
                    <option>Huevo de color</option>
                    <option>Cerdo</option>
                    <option>Otros</option>
                  </optgroup>
                </select>
                 <input type="text" name="cantidad3" id="cantidad3" placeholder="Cantidad" class="form-control" maxlength="220" style="margin-top: 1%">
                </div>

                <div class="form-group">
                  <label for="categoriaproducto4"><h5>Producto 4:</h5></label>
                <select class="selectpicker form-control" data-live-search="true" name="categoriaproducto4" id="categoriaproducto4"  data-style="selectbonito" title="Producto">
                    <optgroup label="Hortalizas">
                    <option>Acelga</option>
                    <option>Ajo</option>
                    <option>Albahaca</option>
                    <option>Apio</option>
                    <option>Berro</option>
                    <option>Berenjena</option>
                    <option>Boñato</option>
                    <option>Boñato zanahoria</option>
                    <option>Brocoli</option>
                    <option>Calabacin</option>
                    <option>Caquis</option>
                    <option>Calabaza</option>
                    <option>Cebolla</option>
                    <option>Cebolla de verdeo</option>
                    <option>Ciboulette</option>
                    <option>Chaucha</option>
                    <option>Choclo</option>
                    <option>Coliflor</option>
                    <option>Esparrago</option>
                    <option>Espinaca</option>
                    <option>Jengibre</option>
                    <option>Lechuga crespa</option>
                    <option>Lechuga mantecosa</option>
                    <option>Morron</option>
                    <option>Rabano</option>
                    <option>Remolacha</option>
                    <option>Repollo</option>
                    <option>Papa</option>
                    <option>Pepino</option>
                    <option>Rucula</option>
                    <option>Puerro</option>
                    <option>Tomate</option>
                    <option>Zanahoria</option>
                    <option>Zuchini</option>
                    </optgroup>
                    <optgroup label="Frutas">
                    <option>Anana</option>
                    <option>Banana</option>
                    <option>Cereza</option>
                    <option>Ciruela</option>
                    <option>Coco seco</option>
                    <option>Datiles</option>
                    <option>Frambuesa</option>
                    <option>Frutilla</option>
                    <option>Arandanos</option>
                    <option>Granada</option>
                    <option>Kiwi</option>
                    <option>Lima</option>
                    <option>Limon</option>
                    <option>Mandarina</option>
                    <option>Mango</option>
                    <option>Manzana</option>
                    <option>Durazno</option>
                    <option>Melon</option>
                    <option>Membrillo</option>
                    <option>Mamao</option>
                    <option>Naranja</option>
                    <option>Oliva</option>
                    <option>Pera</option>
                    <option>Pelon</option>
                    <option>Piña</option>
                    <option>Pomelo</option>
                    <option>Sandia</option>
                    <option>Uva</option>
                    </optgroup>
                    <optgroup label="Otros">
                    <option>Amaranto</option>
                    <option>Cilantro</option>
                    <option>Col chino</option>
                    <option>Eneldo</option>
                    <option>Escarola</option>
                    <option>Estragon</option>
                    <option>Grelo</option>
                    <option>Hinojo</option>
                    <option>Hongo</option>
                    <option>Kale</option>
                    <option>Lairel</option>
                    <option>Menta</option>
                    <option>Mizuna</option>
                    <option>Oregano</option>
                    <option>Radicheta</option>
                    <option>Romero</option>
                    <option>Tomillo</option>
                    <option>Huevo blanco</option>
                    <option>Huevo de color</option>
                    <option>Cerdo</option>
                    <option>Otros</option>
                  </optgroup>
                </select>
                 <input type="text" name="cantidad4" id="cantidad4" placeholder="Cantidad" class="form-control" maxlength="220" style="margin-top: 1%">
                </div>

                <div class="form-group">
                  <label for="categoriaproducto5"><h5>Producto 5:</h5></label>
                <select class="selectpicker form-control" data-live-search="true" name="categoriaproducto5" id="categoriaproducto5"  data-style="selectbonito" title="Producto">
                    <optgroup label="Hortalizas">
                    <option>Acelga</option>
                    <option>Ajo</option>
                    <option>Albahaca</option>
                    <option>Apio</option>
                    <option>Berro</option>
                    <option>Berenjena</option>
                    <option>Boñato</option>
                    <option>Boñato zanahoria</option>
                    <option>Brocoli</option>
                    <option>Calabacin</option>
                    <option>Caquis</option>
                    <option>Calabaza</option>
                    <option>Cebolla</option>
                    <option>Cebolla de verdeo</option>
                    <option>Ciboulette</option>
                    <option>Chaucha</option>
                    <option>Choclo</option>
                    <option>Coliflor</option>
                    <option>Esparrago</option>
                    <option>Espinaca</option>
                    <option>Jengibre</option>
                    <option>Lechuga crespa</option>
                    <option>Lechuga mantecosa</option>
                    <option>Morron</option>
                    <option>Rabano</option>
                    <option>Remolacha</option>
                    <option>Repollo</option>
                    <option>Papa</option>
                    <option>Pepino</option>
                    <option>Rucula</option>
                    <option>Puerro</option>
                    <option>Tomate</option>
                    <option>Zanahoria</option>
                    <option>Zuchini</option>
                    </optgroup>
                    <optgroup label="Frutas">
                    <option>Anana</option>
                    <option>Banana</option>
                    <option>Cereza</option>
                    <option>Ciruela</option>
                    <option>Coco seco</option>
                    <option>Datiles</option>
                    <option>Frambuesa</option>
                    <option>Frutilla</option>
                    <option>Arandanos</option>
                    <option>Granada</option>
                    <option>Kiwi</option>
                    <option>Lima</option>
                    <option>Limon</option>
                    <option>Mandarina</option>
                    <option>Mango</option>
                    <option>Manzana</option>
                    <option>Durazno</option>
                    <option>Melon</option>
                    <option>Membrillo</option>
                    <option>Mamao</option>
                    <option>Naranja</option>
                    <option>Oliva</option>
                    <option>Pera</option>
                    <option>Pelon</option>
                    <option>Piña</option>
                    <option>Pomelo</option>
                    <option>Sandia</option>
                    <option>Uva</option>
                    </optgroup>
                    <optgroup label="Otros">
                    <option>Amaranto</option>
                    <option>Cilantro</option>
                    <option>Col chino</option>
                    <option>Eneldo</option>
                    <option>Escarola</option>
                    <option>Estragon</option>
                    <option>Grelo</option>
                    <option>Hinojo</option>
                    <option>Hongo</option>
                    <option>Kale</option>
                    <option>Lairel</option>
                    <option>Menta</option>
                    <option>Mizuna</option>
                    <option>Oregano</option>
                    <option>Radicheta</option>
                    <option>Romero</option>
                    <option>Tomillo</option>
                    <option>Huevo blanco</option>
                    <option>Huevo de color</option>
                    <option>Cerdo</option>
                    <option>Otros</option>
                  </optgroup>
                </select>
                 <input type="text" name="cantidad5" id="cantidad5" placeholder="Cantidad" class="form-control" maxlength="220" style="margin-top: 1%">
                </div>

                <div class="form-group">
                  <label for="descripcion"><h5>Descripción:</h5></label>
                  <textarea type="text" name="descripcion" id="descripcion" placeholder="Descripción" class="form-control" maxlength="220"></textarea>
                </div>

                <input  type="submit" class="btn btn-success" style="margin-top:12px;" value="Publicar"/>


              </div>
          </div>
      </div>
  </div>
</form>
</div>
  </div><!--fin de la tab1 -->

  <div class="tab-pane container fade" id="pedidos"><!--inicio de la tab2 -->
 
<div class="row" style="padding:2%;">
<?php
initDatabase();
$consultapedidos="SELECT * FROM pedidos";
$resultadospedidos=mysqli_query($dbcon,$consultapedidos);
while(($filapedidos=mysqli_fetch_row($resultadospedidos))==true){
  if($_SESSION['username']==$filapedidos[9]){
    $categorias = $filapedidos[1];
    $cantidad = $filapedidos[2];
    $cantidad = explode(":", $cantidad);
    $categorias = explode(":", $categorias);
    $len=count($categorias);
    ?>

    <div class="col-md-4">
      <figure class="card card-product">
        <figcaption class="info-wrap">
            <h4 class="title"><?php echo $filapedidos[7]; ?></h4>
            <h4 class="desc"><?php echo $filapedidos[3]; ?></h4>
        </figcaption>
        <div class="bottom-wrap">
          <p><?php for ($i=0;$i<$len;$i++) {echo $categorias[$i]." Cantidad: ".$cantidad[$i]."<br>";} ?></p>
         <?php echo '<button type="submit" name="eliminar" class="btn btn-danger" id="'.$filapedidos[0].'" onClick="parent.location=\'delpedido?id='.$filapedidos[0].'\'"><i class="far fa-trash-alt"></i> &nbsp;Eliminar pedido</button>'; ?>
        </div> 
      </figure>
    </div> 
    <?php
  }
if( !$categorias){ echo "No hay resultados.";}
}


closeDatabase();
?>
</div>
  </div><!--fin de la tab2 -->

  <div class="tab-pane container fade" id="vendedores"><!--inicio de la tab4 -->

<div class="row" style="padding:2%;">
    <?php
initDatabase();
$consultaatendedor="SELECT * FROM atendedores WHERE nombre = '$usuario'";
$resultadosatendedor=mysqli_query($dbcon,$consultaatendedor);

if(!$resultadosatendedor || mysqli_num_rows($resultadosatendedor)==0){ echo "No hay resultados."; }
while(($filaatendedor=mysqli_fetch_row($resultadosatendedor))==true){
    ?>

    <div class="col-md-4">
      <figure class="card card-product">
        <figcaption class="info-wrap">
            <h4 class="title"><?php echo $filaatendedor[5]; ?></h4>
        </figcaption>
        <div class="bottom-wrap">
          <p><?php echo "Telefono: ".$filaatendedor[3]; ?></p>
          <p><?php echo "e-mail: ".$filaatendedor[2]; ?></p>
        </div> 
      </figure>
    </div>
    <?php
}

closeDatabase();
?>

</div>
  </div><!--fin de la tab4 -->

</div><!--fin de todas las tabs -->
</main>
