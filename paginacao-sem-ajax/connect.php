<?php

	$conn = "mysql:dbname=paginacao2;host=localhost";
	$user = "root";
	$pass = "1234";
	
	try{
		$pdo = new PDO($conn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}catch(PDOException $e){
		echo "ocorreu um erro na conexão com o banco. ".$e->getMessage();
	}
?>