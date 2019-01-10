<?php	
	session_start();

	$nome = addslashes($_POST["nome"]);
	$senha = md5(addslashes($_POST["senha"]));
	
	if((isset($nome) && isset($senha))&& !(empty($nome) && empty($senha))){		
		
		require "connect.php";
		
		$chave = md5(time().rand(0,99));
		
		$stm = $pdo->prepare("SELECT nome, senha FROM usuario WHERE nome=? and senha=?");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		$count = $stm->rowCount();
		
		if($count <= 0){				
			$stm = $pdo->prepare("INSERT INTO usuario(nome, senha, chave) VALUES(?, ?, ?)");
			$stm->bindValue(1, strtolower($nome));
			$stm->bindValue(2, $senha);
			$stm->bindValue(3, $chave);
			$stm->execute();
		
			$_SESSION["id"] = $pdo->lastInsertId();	
		
			$stm = null;
			echo $count;	
		}else{
			echo $count;
		}
	}		
?>