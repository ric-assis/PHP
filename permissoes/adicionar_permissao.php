<?php
	session_start();
	require_once "connect.class.php";
	
	if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){
		header("location:index.php");
	}
	
	$pdo = Connect::getPDO();
	
	$sql = $pdo->query("SELECT cpf FROM usuario_permissoes");
	if($sql->rowCount() > 0){
		$cpf = $sql->fetchAll();
	}else{
		echo "Não existem usuarios";
	}
	
	$sql = $pdo->query("SELECT descricao FROM permissao_permissoes");
	if($sql->rowCount() > 0){
		$tipo_permissao = $sql->fetchAll();
	}else{
		echo "Não existem permissões";		
	}
	
	echo json_encode($permissao = array_merge($cpf, $tipo_permissao));
	
	
?>