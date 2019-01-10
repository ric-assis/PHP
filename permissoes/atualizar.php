<?php
	session_start();
	
	require_once "connect.class.php";
	require_once "permissao.class.php";
	
	$id = addslashes($_POST["id"]);
	$nome = addslashes($_POST["nome"]);
	$email = addslashes($_POST["email"]);
	$rua = addslashes($_POST["rua"]);
	$num = addslashes($_POST["numero"]);
	
	if(isset($id) && !empty($id)){
		$pdo = Connect::getPDO();
		
		$permissao = new Permissao();
		
		if($permissao->getPermissao($_SESSION["id"], 3)){
			$stm = $pdo->prepare("UPDATE cliente_permissoes SET nome=?, email=?, rua=?, numero=? WHERE id=?");
			$stm->bindValue(1, $nome);
			$stm->bindValue(2, $email);
			$stm->bindValue(3, $rua);
			$stm->bindValue(4, $num);
			$stm->bindValue(5, $id);
			$stm->execute();
		}else{
			echo "Você não tem permissão para atualizar esse registro. Entre em contato com o administrador.";
		}

	}else{
		echo "Erro ao atualizar";
	}
?>