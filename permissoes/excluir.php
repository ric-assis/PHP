<?php
	session_start();
	
	require_once "connect.class.php";
	require_once "permissao.class.php";
		
	$id = addslashes($_POST["id"]);
	
	if(isset($id) && !empty($id)){
		$pdo = Connect::getPDO();
		
		$permissao = new Permissao();
				
		if($permissao->getPermissao($_SESSION["id"], 2)){
			$stm = $pdo->prepare("DELETE FROM cliente_permissoes WHERE id=?");
			$stm->bindValue(1, $id);
			$stm->execute();
			
			if($stm->rowCount() > 0){
				echo $id;
			}else{		
				echo "Cadastro não encontrado";
			}
		}else{
			echo "Você não tem permissão para excluir esse registro. Entre em contato com o administrador.";
		}	
	
	}else{
		echo "ID iválido";
	}
?>