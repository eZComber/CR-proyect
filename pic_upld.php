<?php
include("core/kernel.php");
require_login();
global $dbcon;
global $dbcon;
global $billetesdelusuario;


if(@is_array(getimagesize($_FILES["archivo"]["type"]))){
    $image = true;
} else {
    header("Location: panel?subido=2");
}

if ($_FILES['archivo']["error"] > 0) {
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
} else {
  $nombreproducto = cleanValue($_POST['nombreproducto']);
  $descripcionproducto = cleanValue($_POST['descripcionproducto']);
  $categoriaproducto = cleanValue($_POST['categoriaproducto']);
  $precioproducto = cleanValue($_POST['precioproducto']);
  $nombrearchivo =  cleanValue($_FILES['archivo']['name']);



  //billetes para publicitar
  initDatabase();
  $billetes = intval($_POST['billetes']);
  if ($billetes < 0){header( "Location: panel?subido=error"); return false; }
  if($billetes > $billetesdelusuario){header("Location: crs"); return false;}
  $cantidadfinal = $billetesdelusuario - $billetes;
  $consultabilletes="UPDATE cr_users SET billetes = '$cantidadfinal' WHERE username = '$usuario'";
  mysqli_query($dbcon,$consultabilletes);
  closeDatabase();


  // Comprimir archivo
  if ($_FILES["archivo"]["type"] == "image/jpg" || $_FILES["archivo"]["type"] == "image/jpeg") {
    $imageTmp=imagecreatefromjpeg($_FILES["archivo"]["tmp_name"]);
  } else if ($_FILES["archivo"]["type"] == "image/png"){
    $imageTmp=imagecreatefrompng($_FILES["archivo"]["tmp_name"]);
  } else if ($_FILES["archivo"]["type"] == "image/gif") {
    $imageTmp=imagecreatefromgif($_FILES["archivo"]["tmp_name"]);
  } else if ($_FILES["archivo"]["type"] == "image/bmp") {
    $imageTmp=imagecreatefrombmp($_FILES["archivo"]["tmp_name"]);
  } else if ($_FILES["archivo"]["type"] == "image/jpeg") {
  $imageTmp=imagecreatefrombmp($_FILES["archivo"]["tmp_name"]);
  } else {
    echo "Error: formato de imagen no soportado.<br>Formato subido: ".$_FILES["archivo"]["type"];
    header("Location: panel#badimage");
  }
  imagejpeg($imageTmp, $nombrearchivo, 500);
  imagedestroy($imageTmp);


  // MD5
  $ext = pathinfo($nombrearchivo, PATHINFO_EXTENSION);
  $nombrearchivomd5 = md5($nombrearchivo);
  $nombrearchivomd5 = $nombrearchivomd5 . "." . $ext;
  while (file_exists('public/img/subidas/'.$nombrearchivomd5)) {
    $nombrearchivomd5 = md5($nombrearchivomd5).".".$ext;
  }

  $rutadestino = getcwd().'/public/img/subidas/';
  $ruta_archivo = $rutadestino. $nombrearchivomd5;

  print "<pre>";
  if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_archivo)) {
     echo "Archivo valido y subido correctamente en ".$ruta_archivo;
  } else {
     echo "Error en la subida de <b>".$nombrearchivomd5."</b> en <b>".$ruta_archivo. "</b> con nombre original: <b>".$_FILES['archivo']['name']."</b> <br>Debug:\n\n<div style='background-color:black;color:white;padding:10px 10px 10px 20px'>";
     print_r($_FILES);
     echo "</div>";
  }


  initDatabase();
  $query = $dbcon->prepare("INSERT INTO productos (vendedor,nombre,descripcion,categoria,precio,archivo,archivoMD5,billetes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $query->bind_param("sssssssi",
  $_SESSION["username"],
  $nombreproducto,
  $descripcionproducto,
  $categoriaproducto,
  $precioproducto,
  $nombrearchivo,
  $nombrearchivomd5,
  $billetes
);
if ($query->execute()) {
  header("Location: panel?subido=1");
} else {
  if (DEBUG) {
    echo "error --> " . $query->error;
  } else {
    header("Location: panel?subido=error");
  }
}
closeDatabase();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Subida</title>
</head>
<body>

</body>
</html>
