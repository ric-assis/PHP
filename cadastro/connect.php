<?php
	$con = "mysql:dbname=cadastro;host=localhost";
	$user = "root";
	$pass = "1234";
	
	try{
		$pdo = new PDO($con, $user, $pass);		
	}catch(PDOException $e){
		echo "Falha ao conectar no DB ".$e->getMessage();
	}
?>