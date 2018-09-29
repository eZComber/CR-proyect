<?php
include 'core/kernel.php';
// Si ya tiene una sesión abierta, lo mandamos atrás

if(isset($_SESSION['username'])){ header("Location: " . WEB_RUTA . "/comprar"); }

// Google ReCaptchap

$response = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
$secret = '6Lda7FwUAAAAAPcbkJ9B7SJJjdbH_umUsGVZ4ZJ5';
$remoteip = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
if($response != ''){
    $post_fields = array('response' => $response,'secret'=>$secret,'remoteip'=>$remoteip);
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $server_output = curl_post($url,$post_fields);   
    if($server_output->success === true){
    }
    else{
      header("Location: registrocomerciante?captcha=1");
    }
}

function curl_post($url,$post_fields){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return json_decode($server_output);
}

// End Google Recaptcha

// Para checkear si se registra
if(isset($_POST['registerS'])) {
  
  if (strlen($_POST['registerComercio'])>100){ header("Location: registrocomerciante?error=9"); return false;  } // Nombre del comercio muy largo

  if (strlen($_POST['registerBarrio'])>100 || strlen($_POST['registerBarrio'])<2){ header("Location: registrocomerciante?error=10"); return false;  } // Barrio muy largo

  if (strlen($_POST['registerDireccion'])>200 || strlen($_POST['registerDireccion'])<2){ header("Location: registrocomerciante?error=11"); return false;  } // Direccion muy larga

  if (!isset($_POST['registerEmail'])
  || is_null($_POST['registerEmail'])) { header("Location: registrocomerciante?error=1"); return false; } // email vacío
  
  if (!isset($_POST['registerPass'])
  || is_null($_POST['registerPass'])) { header("Location: registrocomerciante?error=1"); return false; } // primera pass vacía
  
  if (!isset($_POST['registerPassV'])
  || is_null($_POST['registerPassV'])) { header("Location: registrocomerciante?error=1"); return false; } // segunda pass vacía
  /*if (!isset($_POST['codigoInv'])
  || is_null($_POST['codigoInv'])) { echo '4'; return false; } // codigo de invitación vacío*/
  
  if (!isset($_POST['registerNumber'])
  || is_null($_POST['registerNumber'])) { header("Location: registrocomerciante?error=1"); return false; } // Numero vacio
  
  if (strlen($_POST["registerNumber"]) < 7 || strlen($_POST["registerNumber"]) > 12 ){header("Location: registrocomerciante?error=5"); return false;} //Numero de 7 digitos a 12
  
  if (!isset($_POST['registerUser'])
  || is_null($_POST['registerUser'])) { header("Location: registrocomerciante?error=1"); return false; } // El usuario está vacío
  
  if ($_POST['registerPass'] != $_POST['registerPassV']) { header("Location: registrocomerciante?error=2"); return false; } // las claves no coinciden
  
  if (strlen($_POST['registerUser'])>16 || strlen($_POST['registerUser'])<3){ header("Location: registrocomerciante?error=6"); return false;	} // Username cant be less than 5 chars, and more than 16

  if (!preg_match("/^[A-Za-z0-9_]*$/",$_POST['registerUser'])) { header("Location: registrocomerciante?error=3"); return false;	} // Check if username is only numbers and letters

  if (!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)) { header("Location: registrocomerciante?error=4"); return false;	} // Validate if the mail is valid

  if (!is_numeric($_POST['registerNumber']) ){header("Location: registrocomerciante?error=8"); return false;}//verificar si el numero es solo numeros

  if (registerComercio($_POST['registerUser'],$_POST['registerEmail'],$_POST['registerPass'],$_POST['registerNumber'],$_POST['registerComercio'],$_POST['registerDepartamento'],$_POST['registerBarrio'],$_POST['registerDireccion'] ) ){
    loginUser(cleanValue($_POST['registerUser']),hashp($_POST['registerPass']) ) ;
    header("Location: " . WEB_RUTA . "/comprar");
  }
}

inc_header();
?>
<title><?php echo WEB_TITULO; ?> - Acceder</title>
<header>
  <?php inc_navbar();
  $id_error =$_GET['error'];

if ($id_error==1){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, revise los datos!</div>';
}
if ($id_error==2){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, las claves no coinciden!</div>';
}
elseif ($id_error==3){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, solo se permiten letras y numeros en el nombre de usuario!</div>';
}
elseif ($id_error==4){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el correo no es valido!</div>';
}
elseif ($id_error==5){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el numero no es valido!</div>';
}
elseif ($id_error==6){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre de usuario debe tener entre 3 a 16 caracteres!</div>';
}
elseif ($id_error==7){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre de usuario ya existe!</div>';
}
elseif ($id_error==8){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, revise el numero!</div>';
}
elseif ($id_error==9){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre del comercio debe tener menos de 100 caracteres!</div>';
}
elseif ($id_error==10){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre del barrio debe tener entre 2 a 100 caracteres!</div>';
}
elseif ($id_error==11){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, la direccion debe tener entre 2 a 200 caracteres!</div>';
}

  $id_captcha =$_GET['captcha'];
  if($id_captcha==1){
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error revise el captcha!</div>';
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

.selectbonito{
    font-size: 14px;
    line-height: 1.32857143;
    color: #555;
    background-color: #fff;
    border: 1px solid black;
}
  
  </style>
</header>
<main>

  <div class="container cbonito" style="margin-top: 2%; margin-bottom:2%;">
    <center><h3 style="margin-right:20%; margin-left:20%; border-bottom: 1px solid green;">Registro comerciante</h3></center>

      <form class="" action="" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="registerUser" id="registerUser" aria-describedby="Ayuda usuario" placeholder="Nombre de usuario" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="registerComercio" id="registerComercio" aria-describedby="Ayuda puesto" placeholder="Nombre del comercio (opcional)" required>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" name="registerEmail" id="registerEmail" aria-describedby="Ayuda email" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" name="registerNumber" id="registerNumber" aria-describedby="Ayuda email" placeholder="Número de teléfono" required>
      </div>

        <div class="form-group">
           <select class="selectpicker d-block" data-live-search="true" name="registerDepartamento" data-width="fit" data-style="selectbonito" title="Departamento" required>
            <option>Artigas</option>
            <option>Canelones</option>
            <option>Cerro Largo</option>
            <option>Colonia</option>
            <option>Durazno</option>
            <option>Flores</option>
            <option>Florida</option>
            <option>Lavalleja</option>
            <option>Maldonado</option>
            <option>Montevideo</option>
            <option>Paysandú</option>
            <option>Río Negro</option>
            <option>Rivera</option>
            <option>Rocha</option>
            <option>Salto</option>
            <option>San José</option>
            <option>Soriano</option>
            <option>Tacuarembó</option>
            <option>Treinta y Tres</option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="registerBarrio" id="registerBarrio" aria-describedby="Ayuda barrio" placeholder="Barrio" required>
		</div>

		<div class="form-group">
          <input type="text" class="form-control" name="registerDireccion" id="registerDireccion" aria-describedby="Ayuda direccion" placeholder="Direccion del comercio" required>
		</div>

        <div class="form-group">
          <input type="password" class="form-control" name="registerPass" id="registerPass" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="registerPassV" id="registerPassV" placeholder="Repetir contraseña" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="registerToS" id="registerToS" required>
          <label class="form-check-label" for="loginRemember">Acepto los <a target="_blank" href="<?php echo WEB_RUTA; ?>/tos">términos de uso y condiciones</a>.</label>
        </div>
        <br>
        <div class="g-recaptcha" data-sitekey="6Lda7FwUAAAAADmyO9GcGfPEfY20c9m7h8P1hz8p"></div>
        <br>
        <button type="submit" name="registerS" id="registerS" class="btn btn-primary btn-block">Registrarse</button>
      </form>
    </div>

<script>
function scaleCaptcha(elementWidth) {
  // Width of the reCAPTCHA element, in pixels
  var reCaptchaWidth = 304;
  // Get the containing element's width
  var containerWidth = $('.container').width();
  
  // Only scale the reCAPTCHA if it won't fit
  // inside the container
  if(reCaptchaWidth > containerWidth) {
    // Calculate the scale
    var captchaScale = containerWidth / reCaptchaWidth;
    // Apply the transformation
    $('.g-recaptcha').css({
      'transform':'scale('+captchaScale+')'
    });
  }
}

$(function() { 
 
  // Initialize scaling
  scaleCaptcha();
  
  // Update scaling on window resize
  // Uses jQuery throttle plugin to limit strain on the browser
  $(window).resize( $.throttle( 100, scaleCaptcha ) );
  
});
</script>

</main>
