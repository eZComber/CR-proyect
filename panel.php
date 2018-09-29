<?php
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();

global $rol;

if($rol == 2){
  header("Location: /comprar");
}

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

  </style>

</head>

<main>

<ul class="nav nav-tabs">
  <li class="nav-item dropdown float-left d-block d-sm-none">
  <a class="nav-link dropdown-toggle boton" data-toggle="dropdown">Opciones</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="tab" href="#publicar">Publicar venta</a>
    <a class="dropdown-item" data-toggle="tab" href="#ventas">Ver ventas</a>
    <a class="dropdown-item" data-toggle="tab" href="#compradores">Compradores</a>
  </div>
  </li>


  <li class="d-none d-sm-block nav-item">
  <a class="nav-link active" data-toggle="tab" href="#publicar">Publicar venta</a>
  </li>
  <li class="nav-item d-none d-sm-block">
  <a class="nav-link" data-toggle="tab" href="#ventas">Ver ventas</a>
  </li>
  <li class="nav-item d-none d-sm-block">
  <a class="nav-link" data-toggle="tab" href="#compradores">Compradores</a>
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
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡El producto se ha subido correctamente!</div>';
}elseif ($id_subido==2) {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al subir el producto</div>';
}elseif ($id_subido=='error') {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al subir el producto</div>';
}
if($id_eliminado==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡El producto se ha eliminado correctamente!</div>';
}elseif ($id_eliminado==2) {
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error al eliminar el producto</div>';
}
if($id_agregado==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;Se han agregado correctamente los CRs!</div>';
}
elseif($id_agregado==2){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Ha ocurrido un error!</div>';
}
if($id_realizado==1){
  echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡Se ha realizado la compra correctamente!</div>';
}
?>


<div class="container" style="margin-top: 3%;">
              <form form method="POST" action="pic_upld" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="nombreproducto"><h5>Nombre del producto</h5></label>
                      <input type="text" class="form-control" name="nombreproducto" id="nombreproducto" required>
                    </div>
                    <div class="form-group">
                      <label for="DescripcionTA"><h5>Descripción del producto</h5></label>
                      <textarea class="form-control" id="DescripcionTA" name="descripcionproducto" rows="6" required></textarea>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="categoriaproducto"><h5>Categoría</h5></label>
                          <select class="form-control" id="categoriaproducto" name="categoriaproducto" required>
                            <option>Frutas</option>
                            <option>Verduras</option>
                            <option>Hortalizas</option>
                            <option>Otros</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="categoriaproducto"><h5>Precio</h5></label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                            </div>
                            <input type="number" step="0.01" class="form-control" aria-label="precio" name="precioproducto" required>
                          </div>
                          <label for="billetes"><h5>CRs</h5></label>
                          <input type="number" step="1" class="form-control" aria-label="billetes" name="billetes">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-group">
                      <span class="btn btn-info btn-file" style="background-color: #a6c721">
                        Subir imagen <input type="file" name="archivo" id="archivo" onchange="readURL(this);" required>
                      </span>
                    </div>
                    <img src="/public/img/default-placeholder.png" id="blah" class="rounded float-right img-fluid" alt="Sube una imagen">
                    <input  type="submit" class="btn btn-success float-right" style="margin-top:12px;" accept='image/*' value="Publicar"/>
                  </div>
                </div>
              </form>
            </div>

  </div><!--fin de la tab1 -->

  <div class="tab-pane container fade" id="ventas"><!--inicio de la tab2 -->
 
      <h4 style="margin-top: 2%">Ventas de <?php echo $_SESSION['username'];?></h4>  
<div class="row" style="padding:2%;">
              <br>
                <?php
                initDatabase();
                $consulta="SELECT * FROM productos";
                $resultados=mysqli_query($dbcon,$consulta);
                while(($fila=mysqli_fetch_row($resultados))==true){
                  if($_SESSION['username']==$fila[1]){
                    $dirfoto = 'public/img/subidas/'.$fila[7];
                    ?>

                    <div class="col-md-4">
                      <figure class="card card-product">
                        <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
                        <figcaption class="info-wrap">
                            <h4 class="title"><?php echo $fila[2]; ?></h4>
                            <p class="desc"><?php echo $fila[3]; ?></p>
                        </figcaption>
                        <div class="bottom-wrap">
                          <p><?php echo 'Categoria: '.$fila[4]; ?></p>
                          <p><?php echo 'Precio: $'.$fila[5]; ?></p>
                          <?php echo '<button type="submit" name="eliminar" class="btn btn-danger" id="'.$fila[0].'" onClick="parent.location=\'del?id='.$fila[0].'\'"><i class="far fa-trash-alt"></i> &nbsp;Eliminar producto</button>'; ?>
                            <?php
                            //Agregar billetes
                            if ($fila[1] == $usuario){
                            ?>
                            <div class="row" style="padding-left: 2%; padding-top:4%;">
                            <form action="addcrpanel" method="post">
                            <input type="hidden" name="idproducto" value="<?php echo $fila[0] ?>" required>
                            <input type="number" class="form-control" placeholder="CRs" name="crs" required>
                            <input type="submit" name="agregar" value="Añadir" class="btn btn-sm btn-success" style="padding-top:3%;">
                            </form>
                            </div>
                          <?php } ?>
                        </div> 
                      </figure>
                    </div> 
                    <?php
                  }
                }

                closeDatabase();
                ?>
        </div>
  </div><!--fin de la tab2 -->

  <div class="tab-pane container fade" id="compradores"><!--inicio de la tab4 -->
   <br>
   <div class="row" style="padding:2%;">
<?php
$usuario = $_SESSION["username"];
initDatabase();
$verificarcomprador = "SELECT * FROM compradores WHERE vendedor = '$usuario' ";
$resultadoverificar = mysqli_query($dbcon, $verificarcomprador);
while(($verificacion=mysqli_fetch_row($resultadoverificar))==true){

  $productocomprador = "SELECT * FROM productos WHERE id = '$verificacion[4]' ";
  $productocomprar = mysqli_query($dbcon, $productocomprador);
  $productoid = mysqli_fetch_row($productocomprar);
  $dirfoto = 'public/img/subidas/'.$productoid[7];
  if (!isset($productoid[0])) {
    $idproducto = strval($verificacion[4]);
  $borrar = "DELETE FROM compradores WHERE producto = '$idproducto' ";
  mysqli_query($dbcon, $borrar);
  }
?>
<div class="col-md-4">
  <figure class="card card-product">
    <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
    <figcaption class="info-wrap">
        <p class="desc">Nombre: <?php echo $verificacion[1]; ?></p>
        <p class="desc">Email: <?php echo $verificacion[2]; ?></p>
        <p class="desc">Teléfono: <?php echo $verificacion[3]; ?></p>
    </figcaption>
    <div class="bottom-wrap">
      <a href="<?php echo 'producto?id='.$productoid[0]; ?>" class="btn btn-sm btn-primary float-right">Ver producto</a> 
      <form action="" method="post"> 
      <input type="submit" class="btn btn-success btn-sm float-right" name="borrarcomprador" value="Compra realizada" style="margin-top: 1%;" >
      </form>
      <div class="price-wrap h5">
        <span class="price-new"><?php echo '$'.$productoid[5]; ?></span> 
      </div>
    </div>
  </figure>
</div>


<?php
}
if (isset($_POST["borrarcomprador"])){
  $borrardecompradores = "DELETE FROM compradores WHERE producto = $productoid[0]";
  mysqli_query($dbcon, $borrardecompradores);
  header("Location: panel?realizado=1");
  
  }
closeDatabase();
?>
</div>
  </div><!--fin de la tab4 -->

</div><!--fin de todas las tabs -->
</main>

<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#blah')
    .attr('src', e.target.result)
    };

    reader.readAsDataURL(input.files[0]);
  }
  }
</script>