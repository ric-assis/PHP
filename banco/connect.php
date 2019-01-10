<?php
	$conn = "mysql:dbname=caixa;host=localhost";
	$user = "root";
	$pass = "1234";
	
	try{
		$pdo = new PDO($conn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Falha ao conectar no DB.".$e->getMessage();
	}
	

?>