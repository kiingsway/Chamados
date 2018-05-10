<?php
if (isset($_POST['btnFez'])) {
	$db = mysqli_connect('localhost', 'root', '', 'dbchamados');
	$query = "SELECT fez FROM tbchamados WHERE ticket = ".$_POST['btnFez'].";";
	$results = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($results);
	if ($user['fez'] == '0') $fez ='1';
	else $fez = '0';
	$query = "UPDATE tbchamados	SET fez = '".$fez."' WHERE ticket = '".$_POST['btnFez']."';";
	mysqli_query($db, $query) or die('Erro: '.mysqli_error($db));
}
if (isset($_POST['btnTodosFez'])) {
	$db = mysqli_connect('localhost', 'root', '', 'dbchamados');
	$query = "SELECT fez FROM `tbchamados` LIMIT 1;";
	$results = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($results);
	if ($user['fez'] == '0') $fez ='1';
	else $fez = '0';
	//$query = "UPDATE tbchamados	SET fez = '".$fez."';";
	$query = "UPDATE tbchamados	SET fez = '".$fez."' WHERE ticket = '".$_POST['btnTodosFez']."';";
	mysqli_query($db, $query) or die('Erro: '.mysqli_error($db));
}
if (isset($_POST['btnApagar'])) {
	$db = mysqli_connect('localhost', 'root', '', 'dbchamados');
	//$sql = "DELETE FROM tbchamados WHERE ticket='49049'";
	$sql = "DELETE FROM tbchamados WHERE ticket=".$_POST['btnApagar'];
	mysqli_query($db, $sql) or die('Erro: '.mysqli_error($db));
}