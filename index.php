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
	                    <a href="email.php"><span class="badge badge-pill green"><i class="fa fa-envelope-o fa-2x"></i></span></a>
	                </li>
	            </ul>
	        </div>
	    </nav>
	</header><br><br><br>
	<!--Main Navigation-->

	<div class="container-fluid">
		<div class="table-responsive">
			<form method="POST" action="#">
				<table class="table">
					<tr>
						<th>Ticket</th>
						<th>Ação</th>
						<th>Pessoa</th>
						<th>Prazo</th>
						<th>Detalhes</th>
						<?php
						$query = "SELECT fez FROM tbchamados LIMIT 1";
						$result = mysqli_query($db, $query);
						while ($chamados = mysqli_fetch_assoc($result)) {
							$fez = $chamados['fez'];
							if ($fez == '0') echo "<th><button type='submit' name='btnTodosFez' class='btn btn-sm btn-outline-success waves-effect'>Fez?</button></th>";
							else echo "<td><button type='submit' name='btnTodosFez' class='btn btn-sm btn-outline-danger waves-effect'>Fez?</button></td>";
						}?>
						<th>Opções</th>
					</tr>
						<?php 
						$query = "SELECT * FROM tbchamados";
						$result = mysqli_query($db, $query);
						while ($chamados = mysqli_fetch_assoc($result)) {
							echo "<tr class='hoverable'>";
							echo "<td class='inner'><b>".$chamados['ticket']."</b></td>";

							echo "<td> <select class='browser-default'>
							<option value='3'".(($chamados['acao'] == 'Em analise') ? "selected": "") ." >Em análise</option>
							<option value='3'".(($chamados['acao'] == 'Prazo') ? "selected": "") ." >Prazo</option>
							<option value='3'".(($chamados['acao'] == 'Cobrar') ? "selected": "") ." >Cobrar</option>
							<option value='3'".(($chamados['acao'] == 'Encerrar') ? "selected": "") ." >Encerrar</option>
							</select>
							</td>";

							echo "<td> <select class='browser-default'>";
							echo "<option></option>";
							$query1 = "SELECT nome FROM tbusers";
							$result1 = mysqli_query($db, $query1);
							while ($users = mysqli_fetch_assoc($result1))
							{
								if ($chamados['pessoa'] == $users['nome']) echo "<option selected>".$users['nome']."</option>";
								else echo "<option>".$users['nome']."</option>";
							}
							echo "</select></td>";

							echo '<td><input type="date" value="'.$chamados['prazo'].'"></td>';

							echo "<td>".$chamados['obs']."</td>";
							$fez = $chamados['fez'];
							if ($fez == 1) echo "<td><button type='submit' name='btnFez' value=".$chamados['ticket']." class='btn btn-sm btn-outline-success waves-effect' data-toggle='tooltip' data-placement='top' title='Sim'><i class='fa fa-check' aria-hidden='true'></i></button></td>";
							if ($fez == 0) echo "<td><button type='submit' name='btnFez' value=".$chamados['ticket']." class='btn btn-sm btn-outline-danger waves-effect' data-toggle='tooltip' data-placement='top' title='Não'><i class='fa fa-close' aria-hidden='true'></i></button></td>";
							echo "<td class='hoverable'>
							<button type='button' class='btn btn-sm btn-blue' data-toggle='tooltip' data-placement='top' title='Salvar'><i class='fa fa-check-square-o' aria-hidden='true'></i></button>
							<button type='submit' class='btn btn-sm btn-blue' data-toggle='tooltip' data-placement='top' title='Apagar' value='".$chamados['ticket']."' name='btnApagar'><i class='fa fa-trash' aria-hidden='true'></i></button>
							</td>";
							echo "</tr>";
						}
						?>
				</table>
			</form>
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
</html>