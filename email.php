<?php include ('edit.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Chamados</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<!-- Ícones Material Design Google -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
	<!-- Deixe o browser saber que esse site serve em mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Cor da barra de navegação do Chrome para Android -->
	<meta name="theme-color" content="#c62828">
	<!-- Título -->
</head>
<body>
	<?php
	$db = mysqli_connect('localhost','root','','dbchamados');
	$query = "SELECT COUNT(ticket) AS Total FROM tbchamados";
	$result = mysqli_query($db, $query);
	while ($chamados = mysqli_fetch_assoc($result)) { ?>


	<!--Main Navigation-->
	<header>
	    <nav class="navbar fixed-top navbar-expand-lg navbar-dark pink scrolling-navbar">
	        <a class="navbar-brand" href="#"><strong>Chamados   </strong><span class="badge badge-pill light-blue"><?php echo $chamados['Total']; } ?> </span></a>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">

	            <ul class="nav navbar-nav nav-flex-icons ml-auto">
	                <li class="nav-item">
	                    <a href="index.php"><span class="badge badge-pill green"><i class="fa fa-bars fa-2x"></i></span></a>
	                </li>
	            </ul>
	        </div>
	    </nav>
	</header><br><br><br>
	<!--Main Navigation-->


	<div class="container">

<!-- Card deck -->
<div class="card-deck">
<!-- Card -->
<div class="card">
  <!-- Card content -->
  <div class="card-body">
    <!-- Title -->
    <h4 class="card-title"><a>iTarget </a><span class="badge badge-pill rgba-red-strong">4</span></h4>
    <!-- Text -->
    <p class="card-text">45000: Prazo 08/08 vencido</p>
    <p class="card-text">45000: Prazo 08/08 vencido</p>
    <p class="card-text">45000: Prazo 08/08 vencido</p>
    <p class="card-text">45000: Prazo 08/08 vencido</p>
  </div>
  <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li><a href="mailto:marcos.oranmiyan@cbr.org.br" class="btn btn-primary">Mandar e-mail</a></li>
    </ul>
  </div>
</div>
<!-- Card -->
<!-- Card -->
<div class="card">
  <!-- Card content -->
  <div class="card-body">
    <!-- Title -->
    <h4 class="card-title"><a>Marcos </a><span class="badge badge-pill rgba-yellow-strong">2</span></h4>
    <!-- Text -->
    <p class="card-text">45000</p>
    <p class="card-text">45000</p>
  </div>
  <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li><a href="mailto:marcos.oranmiyan@cbr.org.br" class="btn btn-primary">Mandar e-mail</a></li>
    </ul>
  </div>
</div>
<!-- Card -->
<!-- Card -->
<div class="card">
  <!-- Card content -->
  <div class="card-body">
    <!-- Title -->
    <h4 class="card-title"><a>Lorem </a><span class="badge badge-pill rgba-green-strong">1</span></h4>
    <!-- Text -->
    <p class="card-text">45000</p>
  </div>
  <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li><a href="mailto:marcos.oranmiyan@cbr.org.br" class="btn btn-primary">Mandar e-mail</a></li>
    </ul>
  </div>
</div>
<!-- Card -->



</div>
<!-- Card deck -->













</div>

	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

	<script>$('.datepicker').pickadate();</script>

	<script>
		// Tooltips Initialization
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()});
	</script>

</body>