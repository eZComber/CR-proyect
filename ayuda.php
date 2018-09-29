<?php
include 'core/kernel.php';
inc_header();
?>

<title><?php echo WEB_TITULO; ?> - Ayuda</title>
<header>
  <?php inc_navbar(); ?>



</header>

<main>
<div class="container vertical-center">
	<br>
	<div class="justify-content-center align-self-center row">
    <div class="col-md-offset-5">
	<h3>¿En que te podemos ayudar?</h3>
	<div id="accordion">
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-block btn-primary" href="#registro" >¿Como y para que me registro?</a>
	<div id="registro" class="collapse" data-parent="#accordion">
    <br>
    <p>Puede registrarse presionando en "Acceder" y luego eligiendo el tipo de registro.</p>
    <p>
Para que debe registrarse: Cuando usted realice una compra sus datos serán otorgados a el vendedor. De igual manera si es a usted a quien le compran sus datos serán otorgados al comprador.</p>
	</div>
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-block btn-primary" href="#funcionamiento" >¿Como funciona?</a>
	 <div id="funcionamiento" class="collapse" data-parent="#accordion">
    <br>
    <p>
    	Si usted es un comerciante podra realizar su propio pedido en la aplicacion web, o buscar los productos publicados por los productores.
    </p>
    <p>
    	Si usted es productor, podra publicar sus productos los que seran mostrados directamente al comerciante.
    </p>
	</div>
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-block btn-primary" href="#premium">¿Que es el premium?</a>
	<div id="premium" class="collapse" data-parent="#accordion">
    <br>
	<p>El rango premium te otorga ciertos beneficios con respecto al resto de usuarios, tales como:</p>
	<p>El usuario premium tendrá acceso a una lista inicial de 100 puestos de fruta y verdura. Y se agregaran 30 puestos por mes.</p>
	<p>El usuario premium tendrá una mejor disposición en la busqueda de productos.</p>
	<p>Se le otorgara 50 CR's que equivale a la mitad del valor del premium.</p>
	<p>Tendra un 20% de descuento al comprar CR's</p>
	</div>
	<br>
	<a style="color:white;" data-toggle="collapse" class="btn btn-block btn-primary" href="#CR" >¿Que son los CR?</a>
	<div id="CR" class="collapse" data-parent="#accordion">
    <br>
    <p>Los CR son una manera simple de organizar las publicaciones, las publicaciones con mayor cantidad de CR's serán las mejor posicionadas.</p>
    <p>Comprar estos CR te permitirá que tus publicaciones sean mas visibles para los usuarios, por ende ayudara a tus ventas.</p>
	</div>
	<br>
	<!--<a style="color:white;" data-toggle="collapse" class="btn btn-block btn-primary" href="#contactar" >Contactar</a>
	<div id="contactar" class="collapse" data-parent="#accordion">
    <br>
    <p>Puede contactarse al correo comercioruralcontacto@gmail.com o utilizando el siguiente campo.</p>
    <input type="text" placeholder = "Motivo">
    <textarea placeholder = "Su mensaje"></textarea>
	</div>-->
</div>


</div>
</div>
</div>
</main>