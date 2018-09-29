<?php
include 'core/kernel.php';
require_login();
inc_header();
global $dbcon;




if (isset($_POST['correoboton'])) {
	$emailnuevo = $_POST["en"];
	$emailnuevo = strtolower($emailnuevo);
	$emailnuevo = cleanValue($emailnuevo);
	if(!isset($emailnuevo) || is_null($emailnuevo)){header("Location: /account?cambio=2"); return false;} // esta vacio
	initDatabase();
	$consultamail = "SELECT email FROM cr_users WHERE email = '$emailnuevo' ";
	$resultadosmail=mysqli_query($dbcon,$consultamail);
	$filamail=mysqli_fetch_row($resultadosmail);
	if(isset($filamail[0])){ header("Location: /account?cambio=2"); return false;}//Ya existe el mail
	$cambiomail = "UPDATE cr_users SET email= '$emailnuevo' WHERE username= '$usuario' ";
	mysqli_query($dbcon,$cambiomail);
	closeDatabase();
	header("Location: /account?cambio=1");
	}

elseif(isset($_POST['passwordboton'])){
	$actualpassword = $_POST["ca"];
	$password = $_POST["cn"];
	$passwordrepeat = $_POST["cnr"];
	$password = cleanValue($password);
	$passwordrepeat = cleanValue($passwordrepeat);
	if(loginUser($usuario,hashp($actualpassword))) {
    	if($password != $passwordrepeat){header("Location: /account?cambio=2"); return false;}
    	if(strlen($password) < 7){header("Location: /account?cambio=2"); return false;}
		$password = hashp($password);
		echo $password;
		initDatabase();
		$cambiopassword="UPDATE cr_users SET password= '$password' WHERE username= '$usuario' ";
		mysqli_query($dbcon,$cambiopassword);
		header("Location: /account?cambio=1");
  	}

	closeDatabase();
	}

elseif(isset($_POST['numeroboton'])){
	
	$telefononuevo = intval($_POST["nn"]);
	$telefononuevo = cleanValue($telefononuevo);
	if(!isset($telefononuevo) || is_null($telefononuevo)){header("Location: /account?cambio=2"); return false;} // esta vacio
	if (strlen($telefononuevo) < 7 || strlen($telefononuevo) > 12 ){header("Location: /account?cambio=2"); return false;} 
	initDatabase();
	$consultatelefono = "SELECT Telefono FROM cr_users WHERE Telefono = '$telefononuevo' ";
	$resultadostelefono=mysqli_query($dbcon,$consultatelefono);
	$filatelefono=mysqli_fetch_row($resultadostelefono);
	if(isset($filatelefono[0])){header("Location: /settings/account?cambio=2"); return false;} // el telefono ya existe
	$cambiotelefono = "UPDATE cr_users SET Telefono= '$telefononuevo' WHERE username= '$usuario' ";
	mysqli_query($dbcon,$cambiotelefono);
	closeDatabase();
	header("Location: /account?cambio=1");

}





?>
<title>Ajustes de cuenta</title>
<header>
  <?php inc_navbar(); ?>
</header>
<main>
  <?php
	$usuario = strval($_SESSION["username"]);

$id_cambio =$_GET['cambio'];
if($id_cambio==2){
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, revise los datos!</div>';
}
elseif($id_cambio==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;¡Se han cambiado los datos correctamente!</div>';
}

  ?>

<br>
<h4 style="text-align:center;">Ajustes de <?php echo $usuario; ?></h4>
<div class="container vertical-center">
	<div class="justify-content-center align-self-center col-xs-12 col-md-6" style="margin-left:auto; margin-right:auto;">
    <div class="col-md-offset-5">
	<div id="accordion">
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-info btn-block btn-primary" href="#correo" >Cambiar correo</a>
	<div id="correo" class="collapse" data-parent="#accordion">
    <form action="" method="post" style="margin-top:4%;">
  	<input type="email" name="en" class="form-control" placeholder="Correo nuevo"> 
  	<input type="submit" class="btn btn-primary" value="Cambiar" name="correoboton" style="margin-top: 2%;">
	</form>
	</div>
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-info btn-block btn-primary" href="#passwordch" >Cambiar contraseña</a>
	 <div id="passwordch" class="collapse" data-parent="#accordion">
     <form action="" method="post" style="margin-top:4%;">
	  <input type="password" name="ca" class="form-control" placeholder="Contraseña actual">
	  <input type="password" name="cn" class="form-control" placeholder="Contraseña nueva"> 
	  <input type="password" name="cnr" class="form-control" placeholder="Repetir contraseña nueva"> 
	  <input type="submit" class="btn btn-primary" value="Cambiar" name="passwordboton" style="margin-top:2%;">
	</form>
	</div>
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-info btn-block btn-primary" href="#numberch">Cambiar numero</a>
	<div id="numberch" class="collapse" data-parent="#accordion">
    <form action="" method="post" style="margin-top:4%;">
	  <input type="number" name="nn" class="form-control" placeholder="Numero nuevo"> 
	  <input type="submit" class="btn btn-primary" value="Cambiar" name="numeroboton" style="margin-top:2%;">
	</form>
	</div>

<a class="btn btn-danger btn-block btn-sm" href="https://www.comerciorural.net/logout" style="margin-top:16%;">Desconectarse</a>
</div>


<!--
 <form action="" method="post" class="col-4">
  <input type="email" name="en" class="form-control" placeholder="Correo nuevo"> 
  <input type="submit" class="btn btn-primary" value="Cambiar" name="correoboton">
</form>

 <form action="" method="post" class="col-4">
  <input type="password" name="ca" class="form-control" placeholder="Contraseña actual">
  <input type="password" name="cn" class="form-control" placeholder="Contraseña nueva"> 
  <input type="password" name="cnr" class="form-control" placeholder="Repetir contraseña nueva"> 
  <input type="submit" class="btn btn-primary" value="Cambiar" name="passwordboton">
</form>

 <form action="" method="post" class="col-4">
  <input type="number" name="nn" class="form-control" placeholder="Numero nuevo"> 
  <input type="submit" class="btn btn-primary" value="Cambiar" name="numeroboton">
</form>

<a class="btn btn-primary" href="https://www.comerciorural.net/logout">Desconectarse</a>
-->

</div>

</main>
