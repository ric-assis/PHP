<?php
	session_start();
	
	require_once "connect.class.php";
	require_once "permissao.class.php";
	
	$nome = addslashes($_POST["nome"]);
	$email = addslashes($_POST["email"]);
	$rua = addslashes($_POST["rua"]);
	$num = addslashes($_POST["numero"]);
	
	if(isset($nome) && !empty($nome)){
		$pdo = Connect::getPDO();
		
		$permissao = new Permissao();
		
		if($permissao->getPermissao($_SESSION["id"], 1)){
			$stm = $pdo->prepare("INSERT INTO cliente_permissoes(nome, email, rua, numero) VALUES(?, ?, ?, ?)");
			$stm->bindValue(1, $nome);
			$stm->bindValue(2, $email);
			$stm->bindValue(3, $rua);
			$stm->bindValue(4, $num);		
			$stm->execute();	
		}else{
			echo "Você não tem permissão para salvar esse registro. Entre em contato com o administrador.";
		}

	}else{
		echo "Erro ao atualizar";
	}
?>