<?php
	session_start();	
	
	$usuario = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));
	
	if((isset($usuario) && isset($senha)) && !(empty($usuario) && empty($senha))){
		require "connect.php";
		try{
			$pdo = new PDO($connect, $user, $password);
			$sql = $pdo->query("SELECT * FROM login WHERE nome = '$usuario' AND senha = '$senha'");
			if($sql->rowCount()>0){
				$user = $sql->fetch();//Recebe o primeiro cadastro do DB para receber todos fetchAll()
				$_SESSION["ids"]=$user["id"];//Salva  a sessão
				echo "Usuario conectado ".$user["id"];
			}else{
				echo "Usuario não encontrado";
			}
		}catch(PDOException $e){
			echo "Falha no login: ".$e->getMessage();
		}
	}else{
		echo "Dados inválidos";
	}
?>