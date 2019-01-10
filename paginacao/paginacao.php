<?php
	require_once "connect.php";
	
	//Conta o numero de elementos no banco e determina o numero de paginas
	$sql = $pdo->query("SELECT COUNT(*) AS quantidade FROM novelas");
	$sql = $sql->fetch();
	$qt = $sql["quantidade"];
	
	echo $num_pg = ceil($qt / 5);	
?>