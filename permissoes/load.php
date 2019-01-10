<?php
	session_start();
	
	require_once "connect.class.php";
	require_once "permissao.class.php";
	
	$pdo = Connect::getPDO();
	
	$permissao = new Permissao();
	//Verifica a permissão 4 - leitura do usuário
	if($permissao->getPermissao($_SESSION["id"], 4)){
			$sql = $pdo->query("SELECT * FROM cliente_permissoes");
			
		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll();

			echo json_encode($sql);
		}else{
			echo "Não existem registros";
		}
	}else{
		echo "Você não tem permissão para vizualizar os registros. Entre em contato com o administrador.";
	}	
?>