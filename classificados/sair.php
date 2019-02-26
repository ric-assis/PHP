<?php
	session_start();
	
	require_once "connect.class.php";
	
	$id = $_SESSION["id"];
	
	//Apaga o registro do cookie no banco de dados e os cookies do navegador
	$pdo = Connect::getPDO();
	$sql = $pdo->query("UPDATE usuario SET cookie='' WHERE id=$id");
	if($sql->rowCount() > 0){
		setcookie("classificados[user]", null, -1);	
		setcookie("classificados[pass]", null, -1);	
		unset($_COOKIE["classificados"]);		
	}		
	session_destroy();
	
	header("location:index.php");
?>