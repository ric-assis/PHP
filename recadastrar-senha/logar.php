<?php
	session_start();
	
	require_once "connect.php";
	
	$nome = addslashes($_POST["nome"]);
	$senha = addslashes($_POST["senha"]);
	
	if((isset($nome) && isset($senha)) && (!empty($nome) && !empty($senha))){
		$senha = md5($senha);		
		$pdo = Connect::getPDO(); 
		
		$stm = $pdo->prepare("SELECT id FROM usuario WHERE nome=? and senha=?");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$_SESSION["id"] = $stm["id"];
			echo json_encode($stm);
		}else{
			echo "Usuario não encontrado";
		}		
	}else{
		echo "Dados informados inválido."; 
	}
?>