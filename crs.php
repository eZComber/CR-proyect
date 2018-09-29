<?php
include 'core/kernel.php';
require_login();
inc_header();
global $dbcon
?>
<title> CRS </title>
<header>
  <?php inc_navbar(); ?>

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

</style>

<maiin>

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


<div class="col-md">
<div class="card text-center">
  <div class="card-header">
    <img src="/public/img/billete.jpg" style="max-width:60px">
  </div>
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




</main>
