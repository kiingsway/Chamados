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


	<div class="container-fluid">
		<div class="card-group">
			<?php
				$query = "SELECT DISTINCT pessoa FROM tbchamados WHERE pessoa IS NOT NULL";
				$result = mysqli_query($db, $query);

				$numbers = range(1, 8);
				shuffle($numbers);
				$i = 0;

				while ($chamados = mysqli_fetch_assoc($result)) {

					echo '<div class="card mb-4">';
					echo '<div class="view overlay">';
					echo '<img class="card-img-top" src="imgs/'.$numbers[$i].'.jpg">';
					echo '<a href="#!"><div class="mask rgba-white-slight"></div></a>';
					echo '</div>';
					echo '<div class="card-body">';

					$query3 = "SELECT COUNT(pessoa) AS Total FROM tbchamados WHERE pessoa = '".$chamados['pessoa']."'";
					$result3 = mysqli_query($db, $query3);

					$totalChamados = mysqli_fetch_assoc($result3)['Total'];

					if ($totalChamados == 1) $cor = "green";
					if ($totalChamados == 2 || $totalChamados == 3) $cor = "amber";
					if ($totalChamados >= 4) $cor = "red";

					echo '<h4 class="card-title"><a>'.$chamados['pessoa'].' </a><span class="badge badge-pill rgba-'.$cor.'-strong">'.$totalChamados.'</span></h4>';

					$query2 = "SELECT ticket, obs FROM `tbchamados` WHERE pessoa = '".$chamados['pessoa']."'";
					$result2 = mysqli_query($db, $query2);
					while ($obs = mysqli_fetch_assoc($result2))
					{
						echo '<p class="card-text">';
						echo $obs['ticket'] . ' ' . $obs['obs'];
						echo '</p>';
					}

					$query4 = "SELECT email FROM tbusers WHERE nome = '".$chamados['pessoa']."'";
					$result4 = mysqli_query($db, $query4);
					$email = mysqli_fetch_assoc($result4)['email'];

					echo '</div>';
					echo '<div class="rounded-bottom mdb-color lighten-3 text-center pt-3">';
				    echo '<ul class="list-unstyled list-inline font-small">';
				    echo '<li><a href=mailto:"'.$email.'" class="btn btn-primary">Mandar e-mail</a></li>';
					echo '</ul>';
					echo '</div>';
					echo '</div>';

					$i++;
				}


			?>
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

	<script>$('.datepicker').pickadate();</script>

	<script>
		// Tooltips Initialization
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()});
	</script>

</body>