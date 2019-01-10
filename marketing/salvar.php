<?php
	session_start();
	
	date_default_timezone_set("America/Sao_Paulo");//Pega o time zone de São Paulo ao inves do servidor que pode ser -2 e nao -3, use get() pra saber o timezone
	
	$nome = addslashes(strtolower($_POST["nome"]));
	$email = addslashes(strtolower($_POST["email"]));
	$senha = md5(addslashes($_POST["senha"]));
	
	$id_pai = $_SESSION["id"];
	$data = date("Y-m-d");
	$nivel = 0;
	
	require "connect.php";
	
	$stm = $pdo->prepare("INSERT INTO cliente(nome, email, senha, id_pai, data_cad, nivel) VALUES(?, ?, ?, ?, ?, ?)");
	$stm->bindValue(1, $nome);
	$stm->bindValue(2, $email);
	$stm->bindValue(3, $senha);
	$stm->bindValue(4, $id_pai);
	$stm->bindValue(5, $data);
	$stm->bindValue(6, $nivel);
	$stm->execute();	
	

	echo $pdo->lastInsertId();
?>