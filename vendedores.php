<?php
include 'kernel.php';
global $rol;
if($rol == 1){
	header("Location: /comprar");
}
