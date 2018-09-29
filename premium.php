<title>premium</title>
<?php
include 'core/kernel.php';
require_login();
inc_header();
inc_navbar();
?>

<header>

  <style>
.card{
  box-shadow: 12px 15px 20px 10px rgba(46,61,73,0.15);
  margin-top: 2%;
}
.card-header{
  background-color: #BDB0FF;
}
body{
  background-color: #EBFFCC;
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

  .selectbonito{
    font-size: 14px;
    line-height: 1.52857143;
    color: #555;
    background-color: #fff;
    border: 1px solid grey;
}
.navbonita{
    font-size: 14px;
    line-height: 1.52857143;
    color: #555;
    border: 1px solid grey;
}
.boton{
  box-shadow: 0px 0px 2px 2px grey;
}

.boton:hover{
  box-shadow: 0px 1px 4px 3px grey;
}

.lista{
  border: 1px solid black;
}

.jumbotron{
background: #d53369; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #d53369 , #cbad6d); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #d53369 , #cbad6d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
box-shadow: 5px 5px 10px black;
margin-right: auto;
margin-left: auto;
margin-top: 1%;
    }
.jumbotron  {
    width: 95%;
    border-radius: 10px;
    padding: 3%;
    
  }
    
.highlight img {
    
    float: left;
    width: 100px;
    height: 100px; 
    margin: 10px;
    }
    
.highlight ul {
    list-style-image: url('http://icons.iconarchive.com/icons/yusuke-kamiyamane/fugue/16/tick-small-icon.png');
    margin-left: 1%;
    float: left; 
    clear: right
    }
    
.highlight button {

    }

.highlight h1,h2,h3,h4,h5,h6 {
    padding-bottom: 2%;
  border-bottom: 2px dashed rgba(255, 255, 255, 0.41);
    font-size:20px;
    text-align : center;
    text-transform: uppercase;
    }
    
.highlight p {
  text-align:center;
    }
textarea {
   resize: none;
}
</style>

</header>

<main>

<?php
$id_publicacion =$_GET['publicaciones'];
if ($id_publicacion==1){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Error debe ser usuario premium para hacer mas de 3 publicaciones</div>';
}
?>

<ul class="nav nav-tabs">
  <li class="nav-item dropdown float-left d-block d-sm-none">
  <a class="nav-link dropdown-toggle boton" data-toggle="dropdown">Opciones</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="tab" href="#premium">Comprar premium</a>
    <a class="dropdown-item" data-toggle="tab" href="#crs">Comprar CRS</a>
    <a class="dropdown-item" data-toggle="tab" href="#contacto">Contactar</a>
    <a class="dropdown-item lista
    \" href="listapuestos">Lista</a>
  </div>
  </li>

  <li class="d-none d-sm-block nav-item">
  <a class="nav-link active navbonita" data-toggle="tab" href="#premium">Comprar premium</a>
  </li>
  <li class="d-none d-sm-block nav-item">
  <a class="nav-link navbonita" data-toggle="tab" href="#crs">Comprar CRS</a>
  </li>
  <li class="nav-item d-none d-sm-block">
  <a class="nav-link navbonita" data-toggle="tab" href="#contacto">Contactar</a>
  </li>
  <li class="nav-item d-none d-sm-block">
  <a class="btn btn-info" href="listapuestos" style="font-size: 14px;line-height: 1.52857143;">Lista</a>
  </li>
</ul>


<div class="tab-content">
  <div class="tab-pane container active" id="premium"><!--inicio de la tab0 -->
<?php
$enviado = $_GET["enviado"];
if($enviado==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡Se ha enviado correctamente!</div>';
}
elseif($enviado==2){
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Ah ocurrido un error</div>';
}

?>
</header>
<main>

<div class="jumbotron">

<div class=" highlight">
<h2>Beneficios premium</h2>
  <div class="row">
  
    
        <img src ="/public/img/logo.png" /> 
        <center>Para acceder a la version premium usted debera abonar $1000 mensuales, a cambio recivira los siguientes beneficios:</center>
        <br>
        <ul>
            <li>Lista de puestos con direccion y telefono (cada semana se agregaran 30)</li>
            <li>La mitad del precio pagado se le otorgara en monedas.</li>
            <li>Una mejor disposición en la busqueda de productos.</li>
            <li>Un 20% de descuento al comprar CR's.</li>
            <li>Cantidad y durabilidad de publicaciones ilimitadas.</li>
           
        </ul>
        </div>
        <br>
        <p>Por mas informacion contacte a: comercioruralcontacto@gmail.com</p>
        <p>o contacte al telefono 098124750</p>
    </div>
  </div>

  </div>
  <div class="tab-pane container" id="crs"><!--inicio de la tab1 -->
   

<div class="container">
  <div class="row">
    <div class="col-md">


<div class="card text-center">
  <div class="card-header">
    <img src="/public/img/billete.jpg" style="max-width:60px">
  </div>
  <div class="card-body">
    <h5 class="card-title">50 CRS</h5>
    <p>$500</p>
  </div>
  <div class="card-footer text-muted">
    Por mas informacion contacte a: comercioruralcontacto@gmail.com
  </div>
</div>


    </div>
<div class="col-md">
      
<div class="card text-center">
  <div class="card-header">
    <img src="/public/img/billete.jpg" style="max-width:60px">
  </div>
  <div class="card-body">
    <h5 class="card-title">100 CRS</h5>
    <p>$1000</p>
  </div>
  <div class="card-footer text-muted">
    Por mas informacion contacte a: comercioruralcontacto@gmail.com
  </div>
</div>
  </div>

</div>
</div>
   <div class="col-md">
<div class="card text-center">
  <div class="card-header">
    <img src="/public/img/billete.jpg" style="max-width:60px">
  </div>
  <div class="card-body"
  <div class="card-body">
    <h5 class="card-title">500 CRS</h5>
    <p>$4500</p>
  </div>
  <div class="card-footer text-muted">
    Por mas informacion contacte a: comercioruralcontacto@gmail.com
  </div>
</div>
</div>
</div>

  <div class="tab-pane container" id="contacto"><!--inicio de la tab2 -->
    <form action="contactar" method="post">
    <input type="text" name="motivo" class="form-control" maxlength="120" style="margin-top: 2%; margin-bottom:3%;" placeholder="Motivo">
    <textarea class="form-control" rows="6" maxlength="5000" placeholder="Mensaje" name="mensaje"></textarea>
    <input type="submit" class="btn btn-success" value="Enviar" style="margin-top: 3%;">
    </form>
   </div>
 </div>


</main>