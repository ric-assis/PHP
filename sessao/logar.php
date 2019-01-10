<?php
	session_start();
	
	$nome = addslashes($_POST["nome"]);
	$senha = md5(addslashes($_POST["senha"]));
	
	if((isset($nome) && isset($senha)) && !(empty($nome) && empty($senha))){
		require "connect.php";
		
		$stm = $pdo->prepare("SELECT * FROM usuario WHERE nome=? and senha=?");
		$stm->bindValue(1, strtolower($nome));
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$cadastro = $stm->fetch(PDO::FETCH_ASSOC);			
			$_SESSION["id"] = $cadastro["id"];	
			echo $stm->rowCount();	
			$stm = null;			
		}
	}
?>