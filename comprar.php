<?php
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();

?>

<head>

  <style>
 @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .card-img-top{
    border-radius: 4px;
  }
  .responsive-carousel{
    height: 80%;
    max-width: 100%;
  }
  .card {
  border-radius: 0 !important;
  border: 0 none;
  -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  }

  .card:hover{
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);  
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
body{
  background-color:#D2FFC9;
}

.selectbonito{
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    box-shadow: 4px 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.selectbonito:hover{
    box-shadow: 10px 8px 16px 4px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    transform: scale(1.1, 1.1);
}

.navbonita{
    font-size: 1em;
    line-height: 1.52857143;
    color: #555;
}

  </style>

</head>

<main>

  <div class="container" style="margin-left: auto; margin-right:auto; margin-bottom: 3%;">
    <div class="menu row">
    <div class="">
<div id="carousel" class="carousel slide bg-inverse ml-auto mr-auto" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/public/img/test.jpg">
      <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' " >Espacio publicitario en venta</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/public/img/test2.jpg">
        <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' ">Espacio publicitario en venta</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 responsive-carousel" src="/public/img/test3.jpg">
        <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' ">Espacio publicitario en venta</button>
      </div>
    </div>
      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev" style="width:5%">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next" style="width:5%;">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>
</div>
</div>
</div>
  
<?php
$busqueda = $_POST["seleccion"];
 if  ( strlen($busqueda) > 0 || isset($busqueda) ) {

echo '<ul class="nav nav-tabs nav-fill" style="background-color: #e2e2e2; border-bottom:1px solid black;">
  <li class="nav-item">
  <a class="nav-link active navbonita" data-toggle="tab" href="#productor">Productor ofrece</a>
  </li>
  <li class="nav-item">
	<a class="nav-link navbonita" data-toggle="tab" href="#comerciante">Ver pedidos</a>
  </li>
</ul>';
}else{
echo '<ul class="nav nav-tabs nav-fill" style="background-color: #e2e2e2; border-bottom:1px solid black;">
  <li class="nav-item">
  <a class="nav-link active navbonita" data-toggle="tab" href="#comerciante">Ver pedidos</a>
  </li>
  <li class="nav-item">
  <a class="nav-link navbonita" data-toggle="tab" href="#productor">Productor ofrece</a>
  </li>
</ul>';
}

?>
<!-- tabs -->
<div class="tab-content">
<!--inicio de la tab1 -->
  <?php if (strlen($busqueda) < 1 || !isset($busqueda) ) {echo '<div class="tab-pane container active" id="comerciante">';}else{echo '<div class="tab-pane container fade" id="comerciante">';} ?>



<div class="container">

<a class="btn btn-primary d-block" href="/premium" style="color:white; margin-top: 4%;">Ver un listado de comerciantes</a>



<form action="" method="post">
<select class="selectpicker btn" data-live-search="true" data-style="selectbonito" data-width="100%"  name="seleccion1" onchange="this.form.submit()" title="Buscar...">
<option>Todo</option>
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
</form>

<?php
$busqueda1 = $_POST["seleccion1"];
if ($busqueda1=="Todo" || !isset($busqueda1)){
?>

<div class="row" style="padding:2%;">
<?php
  initDatabase();
  $limit = 12;
    $adjacents = 2;
    $sql = "SELECT COUNT(*) 'total_rows' FROM pedidos";
    $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
    $total_rows = $res->total_rows;
    $total_pages = ceil($total_rows / $limit);
    
    
    if(isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    $offset = $limit * ($page-1);
    } else {
    $page = 1;
    $offset = 0;
    }

    $query  = "SELECT * FROM pedidos ORDER BY crs DESC LIMIT $offset, $limit";
    $result = mysqli_query($dbcon, $query);
    if(mysqli_num_rows($result) > 0) {

    while(($fila = mysqli_fetch_row($result))==true) {
      $categorias = $fila[1];
      $cantidad = $fila[2];
      $categorias = explode(":", $categorias);
      $cantidad = explode(":", $cantidad);
      $lencategorias=count($categorias);
    ?>
<div class="col-md-4">
  <figure class="card card-product">
  <figcaption class="info-wrap">
    <h4 class="title" style="border-bottom:1px solid #00bfff; margin-bottom:1%"><?php echo '<center>'.$fila[7].'</center>' ;?></h4>

    <h6 class="desc"><?php for ($i=0;$i<$lencategorias;$i++){echo "Necesita: ".$categorias[$i]."<br> Cantidad: ".$cantidad[$i]."<br><br>";} ?></h6>

    <?php if ( strlen( $fila[3] ) > 0 ) { ?>
    <p class="desc"><?php echo "Descripcion: "; if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    <?php } ?>
    <center><h5 style="text-decoration: underline green;">Localidad:</h5></center>
    <?php echo "Departamento: ".$fila[4]; ?><br>
    <?php echo "Barrio: ".$fila[5]; ?>
  </figcaption>
  <div class="bottom-wrap">
    <div class="price-wrap h6">
    <a href="<?php echo 'pedido?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver pedido</a>  
    </div>
  </div> 
  </figure>
</div> 

<?php
}
    }
    if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
    } else {
    if(($page - $adjacents) > 1) { 
      if(($page + $adjacents) < $total_pages) { 
      $start = ($page - $adjacents);            
      $end   = ($page + $adjacents);         
      } else {             
      $start = ($total_pages - (1+($adjacents*2)));  
      $end   = $total_pages;               
      }
    } else {               
      $start = 1;                                
      $end   = (1+($adjacents * 2));             
    }
    }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
      <ul class="pagination pagination-sm justify-content-center">
      <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=1'><<</a>
      </li>
      <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
      </li>
      <?php for($i=$start; $i<=$end; $i++) { ?>
      <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
        <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
      </li>
      <?php } ?>
      <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
      </li>
      <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
        </a>
      </li>
      </ul>
     <?php } 
   }
   elseif(strlen($busqueda1) > 0){
    $busqueda1 = cleanValue($busqueda1);
    ?>

<div class="row" style="padding:2%;">
<?php
  initDatabase();
  $limit = 12;
    $adjacents = 2;
    $sql = "SELECT COUNT(*) 'total_rows' FROM pedidos WHERE categoria = '$busqueda1' ";
    $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
    $total_rows = $res->total_rows;
    $total_pages = ceil($total_rows / $limit);
    
    
    if(isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    $offset = $limit * ($page-1);
    } else {
    $page = 1;
    $offset = 0;
    }

    $query  = "SELECT * FROM pedidos ORDER BY crs DESC LIMIT $offset, $limit";
    $result = mysqli_query($dbcon, $query);

    while(($fila = mysqli_fetch_row($result))==true) {
      $conclucion = 0;
      $categorias = $fila[1];
      $cantidad = $fila[2];
      $categorias = explode(":", $categorias);
      $cantidad = explode(":", $cantidad);
      $lencategorias=count($categorias);
      for ($b=0;$b<$lencategorias;$b++){if ($categorias[$b] == $busqueda1){ $conclucion = 1; } }
      if ($conclucion == 1){
      $concluciontotal = 1;
    ?>
<div class="col-md-4">
  <figure class="card card-product">
  <figcaption class="info-wrap">
    <h5 class="title"><?php for ($i=0;$i<$lencategorias;$i++){echo $categorias[$i]." Cantidad: ".$cantidad[$i]."<br>";} ?></h5>
    <p class="desc"><?php if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    <br>
    <p class="desc"><?php echo "Departamento: ".$fila[4]; ?></p>
    <p class="desc"><?php echo "Barrio: ".$fila[5]; ?></p>
  </figcaption>
  <div class="bottom-wrap">
    <div class="price-wrap h6">
    <a href="<?php echo 'pedido?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver pedido</a>  
    </div>
  </div> 
  </figure>
</div> 

<?php
}
}
if ( !isset($concluciontotal)){echo "No hay resultados para ".$busqueda1." en pedidos";}
    if($total_pages <= (1+($adjacents * 2))) {
    $start = 1;
    $end   = $total_pages;
    } else {
    if(($page - $adjacents) > 1) { 
      if(($page + $adjacents) < $total_pages) { 
      $start = ($page - $adjacents);            
      $end   = ($page + $adjacents);         
      } else {             
      $start = ($total_pages - (1+($adjacents*2)));  
      $end   = $total_pages;               
      }
    } else {               
      $start = 1;                                
      $end   = (1+($adjacents * 2));             
    }
    }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
      <ul class="pagination pagination-sm justify-content-center">
      <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=1'><<</a>
      </li>
      <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
      </li>
      <?php for($i=$start; $i<=$end; $i++) { ?>
      <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
        <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
      </li>
      <?php } ?>
      <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
      </li>
      <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
        <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
        </a>
      </li>
      </ul>
     <?php }
     } ?> 

</div>


   
  </div><!--fin de la tab1 -->

 <?php if  (strlen($busqueda) > 0 || isset($busqueda) ) {echo '<div class="tab-pane container active" id="productor">';}else{echo '<div class="tab-pane container fade" id="productor">';} ?><!--inicio de la tab2 -->





<div class="container">




<form action="" method="post">
<select class="selectpicker btn" data-live-search="true" data-style="selectbonito" data-width="100%"  name="seleccion" onchange="this.form.submit()" title="Buscar...">
    <option>Todo</option>
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
</form>

<?php
$busqueda = $_POST["seleccion"];
if ($busqueda=="Todo" || !isset($busqueda)){
?>

<div class="row" style="padding:2%;">
<?php
    initDatabase();
  $limit = 12;
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM productos ORDER BY billetes DESC";
      $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * FROM productos ORDER BY billetes DESC LIMIT $offset, $limit";
      $result = mysqli_query($dbcon, $query);
      if(mysqli_num_rows($result) > 0) {
        while(($fila = mysqli_fetch_row($result))==true) {
            $dirfoto = 'public/img/subidas/'.$fila[7];
        ?>
<div class="col-md-4">
  <figure class="card card-product">
    <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
    <figcaption class="info-wrap">
        <h4 class="title"><?php echo $fila[2]; ?></h4>
        <p class="desc"><?php if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    </figcaption>
    <div class="bottom-wrap">
      <a href="<?php echo 'producto?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver detalles</a>  
      <div class="price-wrap h5">
        <span class="price-new"><?php echo '$'.$fila[5]; ?></span> 
      </div>
    </div> 
  </figure>
</div> 

<?php
}
      }
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=1'><<</a>
            </li>
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
       <?php } 
     }
     elseif(strlen($busqueda) > 0){
      cleanValue($busqueda);
      ?>

<div class="row" style="padding:2%;">
<?php
    initDatabase();
  $limit = 12;
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM productos WHERE categoria = '$busqueda' ";
      $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * FROM productos WHERE categoria = '$busqueda' LIMIT $offset, $limit";
      $result = mysqli_query($dbcon, $query);
      if(mysqli_num_rows($result) > 0) {
        while(($fila = mysqli_fetch_row($result))==true) {
            $dirfoto = 'public/img/subidas/'.$fila[7];
        ?>
<div class="col-md-4">
  <figure class="card card-product">
    <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
    <figcaption class="info-wrap">
        <h4 class="title"><?php echo $fila[2]; ?></h4>
        <p class="desc"><?php if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    </figcaption>
    <div class="bottom-wrap">
      <a href="<?php echo 'producto?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver detalles</a>  
      <div class="price-wrap h5">
        <span class="price-new"><?php echo '$'.$fila[5]; ?></span> 
      </div>
    </div> 
  </figure>
</div> 

<?php
}
      }
      else{
        echo 'No hay resultados para '.$busqueda." en productos";
      }
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=1'><<</a>
            </li>
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
       <?php }
       } ?> 




  </div><!--fin de la tab2 -->
</div><!--fin de todas las tabs -->
</main>
