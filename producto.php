<title>Productos</title>
<?php
include 'core/kernel.php';
inc_header();
inc_navbar();
global $dbcon;


$usuario = $_SESSION["username"];
initDatabase();

$id = $_GET['id'];
$id = cleanValue($id);
    $consulta="SELECT * FROM productos WHERE id='$id'";
    $resultados=mysqli_query($dbcon,$consulta);
    $fila=mysqli_fetch_row($resultados);
	$dirfoto = 'public/img/subidas/'.$fila[7];
    closeDatabase();
    

initDatabase();
    $verificarcompra = "SELECT * FROM compradores WHERE nombre = '$usuario' AND producto='$id' ";
    $resultadoverificar = mysqli_query($dbcon, $verificarcompra);
    $verificarcomprador=mysqli_fetch_row($resultadoverificar);
    if (isset($verificarcomprador[1])) {
    $datosvendedor1 = "SELECT vendedor FROM productos WHERE id= '$id'";
    $resultadovendedor1 = mysqli_query($dbcon, $datosvendedor1);
    $filavendedor=mysqli_fetch_row($resultadovendedor1);

    $vendedor = $filavendedor[0];

    $datosvendedor = "SELECT * FROM cr_users WHERE username= '$vendedor'";
    $resultadovendedor = mysqli_query($dbcon, $datosvendedor);
    $filavendedortotal=mysqli_fetch_row($resultadovendedor);

    $nombrevendedor = $filavendedortotal[3];
    $correovendedor = $filavendedortotal[4];
    $telefonovendedor = $filavendedortotal[10];
    } //ya ha comprado ese producto

    $datosvendedor1 = "SELECT vendedor FROM productos WHERE id= '$id'";
    $resultadovendedor1 = mysqli_query($dbcon, $datosvendedor1);
    $filavendedor=mysqli_fetch_row($resultadovendedor1);


    $vendedor = $filavendedor[0];

closeDatabase();


if (isset($_POST["comprar"])){
    require_login();
    initDatabase();
    $verificarcompra = "SELECT * FROM compradores WHERE nombre = '$usuario' AND producto='$id' ";
    $resultadoverificar = mysqli_query($dbcon, $verificarcompra);
    $verificarcomprador=mysqli_fetch_row($resultadoverificar);


    if (isset($verificarcomprador[1])) 
    {
    echo '<center><h3 style="margin-top: 2%;" >Error usted ya compro este producto</h3></center>'; 
    echo '<center><a class="btn btn-primary" href="/comprar">Volver</a></center> ';
    return false;
    } //ya ha comprado ese producto



    if ($usuario==$vendedor){
    echo '<center><h3 style="margin-top: 2%;" >Error usted publico este producto</h3></center>'; 
    echo '<center><a class="btn btn-primary" href="/comprar">Volver</a></center> ';
    return false;
    } //verifica si es el vendedor quien compra


    $datosvendedor = "SELECT * FROM cr_users WHERE username= '$vendedor'";
    $resultadovendedor = mysqli_query($dbcon, $datosvendedor);
    $filavendedortotal=mysqli_fetch_row($resultadovendedor);

    $nombrevendedor = strval($filavendedortotal[3]);
    $correovendedor = $filavendedortotal[4];
    $telefonovendedor = $filavendedortotal[10];


    $datosusuario = "SELECT * FROM cr_users WHERE username = '$usuario'";
    $resultadodatos = mysqli_query($dbcon, $datosusuario);
    $filadatos=mysqli_fetch_row($resultadodatos);

    $telefono = intval($filadatos[10]);
    $correo = strval($filadatos[4]);
    $usuario = strval($usuario);

    $agregardatos = "INSERT INTO compradores (nombre,email,telefono,producto,vendedor) VALUES ('$usuario','$correo','$telefono','$id','$nombrevendedor' )";
    mysqli_query($dbcon, $agregardatos);


    closeDatabase();

}


?>
<title><?php echo WEB_TITULO; ?></title>
<header>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);
  .cajita{
    padding: 10px;
    border-left: 10px solid green;
    margin-bottom: 1%;
    background-color: #f6f9b1;
    box-shadow: 1px 2px 5px black;
  }
  .animacion:hover{
    animation: pulse 0.5s infinite;
  }
  @keyframes pulse {
  from {
    transform: scale(1, 1);
  }
  to {
    transform: scale(1.02, 1.02);
  }
}
textarea {
   resize: none;
}
.preguntas{
    border-bottom: 2px dashed grey;
    margin-bottom: 1%;
    margin-left: 1%;
    margin-right: 1%;
}
  </style>
</header>
<main>
<?php
$enviado = $_GET["enviado"];

if ($enviado==1){
    echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡El mensaje se ha enviado correctamente!</div>';
}

$reporte = $_GET["reporte"];

if ($reporte==1){
    echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡Se ha reportado correctamente!</div>';
}

?>
<div class="container-fluid" style="margin-top: 1%">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="menu row">
                    <div class="col-md-9 p-t-2 col-lg-12">
                        <?php if (isset($_POST["comprar"]) || strlen($verificarcomprador[1]) > 0 ) { 
                            require_login();
                            echo '<div class="cajita">';
                            echo 'Vendedor: '.$nombrevendedor.'<br>' ;
                            echo 'Correo del vendedor: '.$correovendedor.'<br>' ;
                            echo 'Teléfono del vendedor: '.$telefonovendedor.'<br>' ;
                            echo '</div>';
                        }
                        ?>
                        <img class="img-fluid d-block mx-auto img-responsive" src=" <?php echo $dirfoto; ?>">
                        <hr>
                        <h2><?php echo $fila[2]; ?></h2>
						<p class="text-justify"><?php echo $fila[3]; ?></p>
                        <hr>
                        <h2 class="pull-xs-right"><?php echo '$'.$fila[5]; ?></h2>
                        <button class="btn btn-primary btn-lg animacion" data-toggle="modal" data-target="#modal" style="margin-bottom: 2%;">Comprar</button>
                        <?php if ($usuario!==$vendedor){ ?>

                        <button class="btn btn-primary btn-lg animacion" data-toggle="modal" data-target="#modal2" style="margin-bottom: 2%;">Preguntar</button>
                        <button class="btn btn-danger btn" data-toggle="modal" data-target="#modal4" style="margin-bottom: 2%;">Reportar</button>

                    <?php } ?>
                        <div class="tab-content m-t-2">
                        </div>
                        <center><h4>Preguntas</h4></center>
                        <?php
                        initDatabase();
                        $preguntasproducto="SELECT * FROM productos_preguntas WHERE productoid = '$id' ORDER BY timestamp DESC ";
                        $resultadopreguntas=mysqli_query($dbcon,$preguntasproducto);
                        while(($filapreguntas=mysqli_fetch_row($resultadopreguntas))==true){
                        echo '<div class="preguntas"> ';
                        echo '<p class="text-dark">'.$filapreguntas[3].'</p>';
                        if (!is_null($filapreguntas[4])){
                            echo '<p class="text-muted">'.$filapreguntas[4].'</p>';

                        }else{
                            echo '<p class="text-muted">Sin respuesta</p>';
                        }
                        if ($usuario===$vendedor){
                            if (!is_null($filapreguntas[4]) ){
                                echo ' <button class="btn btn-primary btn-sm animacion" data-toggle="modal" data-target="#modal3" style="margin-bottom: 1%;">Editar respuesta</button> ';
                            }else{
                            echo ' <button class="btn btn-primary btn-sm animacion" data-toggle="modal" data-target="#modal3" style="margin-bottom: 1%;">Responder</button> ';
                        }
                        }
                        echo '</div>';
?>
                <div class="modal fade" id="modal3">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title">Responder:</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                        <form action="preguntas" method="post">
                        <input type="hidden" value=" <?php echo $filapreguntas[0]; ?> " name="idpregunta">
                        <input type="hidden" value=" <?php echo $id; ?> " name="idproducto">
                        <textarea placeholder="Escribe tu respuesta..." class="form-control" rows=6 name="productorespuesta"></textarea> 

                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Enviar" name="enviarpregunta">
                        </form>
                      </div>
                  </div>
                </div>
                </div>
<?php

                        }
                        closeDatabase();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal compra -->
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Comprar <?php echo $fila[2] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        ¿Esta seguro que desea realizar esta compra?
      </div>

      <div class="modal-footer">
        <form action="" method="post">
        <input type="submit" name="comprar" class="btn btn-success" value="Si">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </form>
      </div>
  </div>
</div>
</div>

<!-- Modal preguntas -->

<div class="modal fade" id="modal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Preguntar:</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="preguntas" method="post">
        <input type="hidden" value=" <?php echo $id; ?> " name="idproducto">
        <input type="hidden" value=" <?php echo $usuario; ?> " name="usuarioemisor">
        <textarea placeholder="Escribe tu pregunta..." class="form-control" rows=6 name="productopregunta"></textarea> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-success" value="Enviar" name="enviarpregunta">
        </form>
      </div>
  </div>
</div>
</div>


<!-- Modal reportes -->
<div class="modal fade" id="modal4">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Reportar vendedor</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="reporte" method="post">
        <input type="hidden" value=" <?php echo $id; ?> " name="idproducto">
        <input type="hidden" value=" <?php echo $usuario; ?> " name="usuarioreportante">
        <input type="hidden" value=" <?php echo $vendedor; ?> " name="vendedor">
        <textarea placeholder="Escribe tu queja..." class="form-control" rows=6 name="mensajedereporte"></textarea> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-danger" value="Reportar" name="enviarpregunta">
        </form>
      </div>
  </div>
</div>
</div>

</main>
