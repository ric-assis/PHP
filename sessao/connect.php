<?php
	$conn = "mysql:dbname=sessao;host=localhost;";
	$user = "root";
	$pass = "1234";
	
	try{
		$pdo = new PDO($conn, $user, $pass);
	}catch(PDOException $e){
		echo "Erro de conexão com o banco: ".$e->getMessage();
	}	
?>