<?php
	$conn = "mysql:dbname=paginacao;host=localhost";
	$user = "root";
	$pass = "1234";
	
	try{
		$pdo = new PDO($conn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}catch(PDOException $e){
		echo "Erro na conexão ".$e->getMessage();
	}
?>