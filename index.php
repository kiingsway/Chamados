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
	        <a class="navbar-brand" href="#"><strong>Chamados</strong></a>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">

	            <ul class="nav navbar-nav nav-flex-icons ml-auto">
	                <li class="nav-item">
	                    <a class="nav-link">Total: <?php echo $chamados['Total']; } ?> </a>
	                </li>
	            </ul>
	        </div>
	    </nav>
	</header><br><br><br>
	<!--Main Navigation-->

	<div class="container-fluid">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>Ticket</th>
					<th>Ação</th>
					<th>Pessoa</th>
					<th>Prazo</th>
					<th>Detalhes</th>
					<th>Fez</th>
					<th>Opções</th>
				</tr>
				<?php 
				$query = "SELECT * FROM tbchamados";
				$result = mysqli_query($db, $query);
				while ($chamados = mysqli_fetch_assoc($result)) {
					echo "<tr class='hoverable'>";
					echo "<td>".$chamados['ticket']."</td>";
					echo "<td>".$chamados['acao']."</td>";
					echo "<td>".$chamados['pessoa']."</td>";
					echo "<td>".$chamados['prazo']."</td>";
					echo "<td>".$chamados['obs']."</td>";
					$fez = $chamados['fez'];
					if ($fez == 1) echo "<td>Sim</td>";
					if ($fez == 0) echo "<td>Não</td>";
					echo "<td class='hoverable'>
					<a class='btn btn-primary btn-sm active waves-light' mdbWavesEffect role='button'><i class='fa fa-check-square-o' aria-hidden='true'></i></a>
					<a class='btn btn-primary btn-sm active waves-light' mdbWavesEffect role='button'><i class='fa fa-edit' aria-hidden='true'></i></a>
					<a class='btn btn-primary btn-sm active waves-light' mdbWavesEffect role='button'><i class='fa fa-envelope-o' aria-hidden='true'></i></a>
					</td>";
					echo "</tr>";
				}
				?>

			</table>
		</div>
	</div>

	
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
            
</body>
</html>