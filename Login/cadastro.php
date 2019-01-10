<?php
	session_start();
	
	$usuario = addslashes($_POST['nomeCad']);
	$senha = md5(addslashes($_POST['senhaCad'])); 
	
	if((isset($usuario) && isset($senha))&& !(empty($usuario) && empty($senha))){
		require "connect.php";
		try{
			$pdo = new PDO($connect, $user, $password);
			
			$sql = $pdo->query("INSERT INTO login(nome, senha) VALUES('$usuario', '$senha')");
			echo "Salvo com o ID = ".$pdo->lastInsertId();//Pega o id no BD			
		}catch(PDOException $e){
			echo "Falha no cadastro".$e->getMessage();
		}
	}else{
		echo "Dados inválidos";
	}
	

?>