<?php
	session_start();
	require_once "connect.class.php";
	
	if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){
		header("location:index.php");
	}
	
	$fn = addslashes($_GET["fn"]);
	$cpf = addslashes($_GET["cpfRemover"]);
		
	if((isset($fn) && !empty($fn) && isset($cpf) && !empty($cpf))){		
		if((isset($_GET["permissao_remover"]) && !empty($_GET["permissao_remover"]))){
			$desc_permissao = addslashes($_GET["permissao_remover"]);
		}
		switch($fn){
			case 1:
				seleciona_permissoes($cpf);
				break;
			case 2:
				remove_permissoes($cpf, $desc_permissao);
				break;
			default:
				echo "Dados inválidos";
		}
	}
	
	function seleciona_permissoes($cpf){
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare("SELECT permissao.descricao FROM ((usuario_permisao_permissoes AS permissoes 
							 INNER JOIN  usuario_permissoes AS usuario ON usuario.id = permissoes.id_usuario)
							 INNER JOIN  permissao_permissoes AS permissao ON permissao.id = permissoes.id_permissao) WHERE usuario.cpf=?");
		$stm->bindValue(1, $cpf);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($stm);			
		}else{
			echo "CPF não encontrado";
		}
	}
	
	function remove_permissoes($cpf, $desc_permissao){
		$pdo = Connect::getPDO();
		
		$stm = $pdo->prepare("DELETE FROM usuario_permisao_permissoes WHERE 
							id_usuario = (SELECT id FROM usuario_permissoes WHERE cpf=?) AND 
							id_permissao = (SELECT id FROM permissao_permissoes WHERE descricao=?)");
		$stm->bindValue(1, $cpf);
		$stm->bindValue(2, $desc_permissao);
		$stm->execute();
		
		if($stm->rowCount() > 0)
			echo "1";	
		else
			echo "CPF não encontrado, exclusão cancelada.";
	}
?>