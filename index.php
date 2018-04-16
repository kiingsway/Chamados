<!DOCTYPE html>
<html>
<head>
	<title>Chamados</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<!-- Ícones Material Design Google -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- CSS  -->
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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

	  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">call_received</i>Chamados</a>
      <ul class="right hide-on-med-and-down">
        <li><a>Total: <?php echo $chamados['Total']; } ?> </a></li>
      </ul>
    </div>
  </nav>

	<div class="container">
		<table class="table highlight">
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
				<a class='btn-floating btn-large waves-effect waves-light red btn-small tooltipped' data-tooltip='Editar'>
				<i class='material-icons'>edit</i></a>
				<a class='btn-floating btn-large waves-effect waves-light red btn-small tooltipped'  data-tooltip='Mandar e-mail'>
				<i class='material-icons'>email</i></a>
				<br>
				</td>";
				echo "</tr>";
			}
			?>

		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script >
      	$(document).ready(function(){
    $('.tooltipped').tooltip();
  });
      </script>
</body>
</html>