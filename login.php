<?php
include 'core/kernel.php';
inc_header();
inc_navbar();

// Si ya tiene una sesión abierta, lo mandamos atrás
if(isset($_SESSION['username'])){ header("Location: " . WEB_RUTA . "/comprar"); }

// Para checkear si se logea
if(isset($_POST['loginS'])){
  if(!isset($_POST['loginUser'])){ echo "4"; return false; }
  if(!isset($_POST['loginPassword'])) { echo "5"; return false; }
  $_POST["loginUser"] = cleanValue($_POST["loginUser"]);
  $_POST["loginPassword"] = cleanValue($_POST["loginPassword"]);
  $_POST["loginPassword"] = hashp($_POST['loginPassword']);
  if(loginUser($_POST['loginUser'],$_POST['loginPassword'] ) ){
    header("Location: /comprar");
    exit();
  }
    header("Location: login?error=1");
}

  ?>
  <style>


@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.cbonito {
  position: relative;
  z-index: 1;
  max-width: 300px;
  border: 1px solid black;
  padding:1%;
  background-color:#f2f2f2;
}

body{
  background-color: #fffef7;
}
  
  </style>
</header>
<main>

  <div class="container cbonito" style="margin-top: 5%;">

    <center><h1 style="border-bottom: 1px solid black;">Acceder</h1></center>

      <form class="" action="" method="post">

        <div class="form-group">
          <label for="loginUser">Usuario</label>
          <input type="text" class="form-control" name="loginUser" id="loginUser" aria-describedby="Ayuda usuario" placeholder="Introduce el nombre de usuario" required>
        </div>

        <div class="form-group">
          <label for="loginPassword">Contraseña</label>
          <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Contraseña" required>
        </div>

        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="loginRemember" id="loginRemember">
          <label class="form-check-label" for="loginRemember">Recuérdame</label>
        </div>

        <button type="submit" name="loginS" id="loginS" class="btn btn-primary btn-block">Acceder</button>
      </form>

        <a class="btn btn-sm btn-info btn-block" href="registroproductor" style="margin-top:3%; border: 1px solid green;">Registarse como productor</a>
        <a class="btn btn-sm btn-info btn-block" href="registrocomerciante" style="border: 1px solid green;">Registrarse como comerciante</a>
    </div>
</main>
