<title>Productos</title>
<?php
include 'core/kernel.php';
inc_header();
inc_navbar();
global $dbcon;
global $rol;


//limpiamos la id para que no pasen cosas raras
$id = $_GET['id'];
$id = cleanValue($id);

$usuario = $_SESSION["username"];


// seleccionar los datos de la base de datos para mostrarlos luego
    initDatabase();
    $consulta="SELECT * FROM pedidos WHERE id='$id'";
    $resultados=mysqli_query($dbcon,$consulta);
    $fila=mysqli_fetch_row($resultados);
    closeDatabase();
    

//Para tener los datos por si ya compro el producto

initDatabase();
    $verificaratender = "SELECT * FROM atendedores WHERE nombre = '$usuario' AND pedido='$id' ";
    $resultadoverificar = mysqli_query($dbcon, $verificaratender);
    $verificaratender=mysqli_fetch_row($resultadoverificar);

    $datospedidor1 = "SELECT usuario FROM pedidos WHERE id= '$id'";
    $resultadospedidor1 = mysqli_query($dbcon, $datospedidor1);
    $filapedidor=mysqli_fetch_row($resultadospedidor1);

    $pedidor = $filapedidor[0];

    $datosatendedor = "SELECT * FROM cr_users WHERE username= '$pedidor'";
    $resultadosatendedor = mysqli_query($dbcon, $datosatendedor);
    $filaatendedor=mysqli_fetch_row($resultadosatendedor);

    $nombreatendedor = $filaatendedor[3];
    $correoatendedor = $filaatendedor[4];
    $telefonoatendedor = $filaatendedor[10];

closeDatabase();



 // si preciona el boton de atender
if (isset($_POST["atender"])){
    require_login();
    if ($rol){
        echo "Error, los comerciantes no puede atender productos, solo puede solicitarlos. <br>";
        echo "<a class='btn btn-primary' style='text-decoration: none;' href='/comprar'>Volver</a>";
        return false;
    }
    initDatabase();
    $verificaratender = "SELECT * FROM atendedores WHERE nombre = '$usuario' AND pedido='$id' ";
    $resultadoverificar = mysqli_query($dbcon, $verificaratender);
    $verificaratender=mysqli_fetch_row($resultadoverificar);


    if (isset($verificaratender[1])) 
    {
    echo '<center><h3 style="margin-top: 2%;" >Error usted ya compro este producto</h3></center>'; 
    echo '<center><a class="btn btn-primary" href="/comprar">Volver</a></center> ';
    return false;
    } //ya ha comprado ese producto



    //verifica si es el pedidor quien compra
    if ($usuario==$pedidor){
    echo '<center><h3 style="margin-top: 2%;" >Error usted publico este producto</h3></center>'; 
    echo '<center><a class="btn btn-primary" href="/comprar">Volver</a></center> ';
    return false;
    } 

    $datosusuario = "SELECT * FROM cr_users WHERE username = '$nombreatendedor'";
    $resultadodatos = mysqli_query($dbcon, $datosusuario);
    $filadatos=mysqli_fetch_row($resultadodatos);

    $telefono = strval($filadatos[10]);
    $correo = strval($filadatos[4]);
    $usuario = strval($usuario);

    $agregardatos = "INSERT INTO atendedores (nombre,email,telefono,pedido,atendedor) VALUES ('$usuario','$correo','$telefono','$id','$nombreatendedor' )";
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
                        <?php
                        //Categoria y cantidad
                        $categorias = $fila[1];
                        $categorias = explode(":", $categorias);
                        $cantidad = $fila[2];
                        $cantidad = explode(":", $cantidad);
                        $len=count($categorias);


                        //Resultados si le da a atender
                         if (isset($_POST["atender"]) || strlen($verificaratender[1]) > 0 ) { 
                            require_login();
                            echo '<div class="cajita">';
                            echo 'Nombre del usuario: '.$nombreatendedor.'<br>' ;
                            echo 'Correo del usuario: '.$correoatendedor.'<br>' ;
                            echo 'Teléfono del usuario: '.$telefonoatendedor.'<br>' ;
                            echo '</div>';
                        }
                        ?>
                        <hr>
                        <h1 class="text-center"><?php echo $fila[7]; ?></h1>
                        <h5 class="pull-xs-right"><?php for ($i=0;$i<$len;$i++){echo $categorias[$i]." Cantidad: ".$cantidad[$i]."<br>";} ?></h5>
						            <p class="pull-xs-right"><?php echo "<br>Descripcion: <br>"; if (strlen($fila[3]) > 0 ) {echo $fila[3];} else {echo "No hay descripcion para este producto.";} ?></p>
                        <hr>
                        <h5 class="pull-xs-right"><?php echo "Departamento: ".$fila[4]; ?></h5>
                        <h5 class="pull-xs-right"><?php echo "Barrio: ".$fila[5]; ?></h5>
                        <button class="btn btn-primary btn-lg animacion" data-toggle="modal" data-target="#modal" style="margin-bottom: 2%;">Atender</button>
                        <?php if ($usuario!==$pedidor){ ?>

                        <button class="btn btn-danger btn" data-toggle="modal" data-target="#modal4" style="margin-bottom: 2%;">Reportar</button>

                    <?php } ?>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        ¿Esta seguro que desea atender este pedido?
      </div>
        <form action="" method="post" class="text-center">
        <input type="submit" name="atender" class="btn btn-success" value="Si">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </form>
  </div>
</div>
</div>

</div>


<!-- Arreglar esto, esta pensado para el productor -->
<div class="modal fade" id="modal4">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Reportar publicante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="reportepedido" method="post">
        <input type="hidden" value=" <?php echo $id; ?> " name="idpedido">
        <input type="hidden" value=" <?php echo $usuario; ?> " name="usuarioreportante">
        <input type="hidden" value=" <?php echo $pedidor; ?> " name="pedidor">
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

