<?php
include 'core/kernel.php';
if(isset($_SESSION['username'])){
  $_SESSION = array();
  session_destroy(); 
  setcookie('PHPSESSID', ", time()-3600,'/', ", 0, 0);
  session_destroy();
  header("Location: " . WEB_RUTA . "/login");
}else{
  header("Location: " . WEB_RUTA . "/login");
}
?>
