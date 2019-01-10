<?php
	session_start();
	
	require "connect.php";
	require "fn-patente.php";
	$id = $_SESSION["id"];
	$limite = 3;//Limite de cadastros filhos por cliente
	
	$stm = $pdo->prepare("SELECT id FROM cliente WHERE id = ? LIMIT 1");
	$stm->bindValue(1, $id);
	$stm->execute();
	
	
	if($stm->rowCount() > 0){
		$raiz =  $stm->fetch(PDO::FETCH_ASSOC);				
	}
	//$stm = null;
	
	$clientes = patentes($id, $limite);	
	
	
	echo json_encode($clientes);	
	
?>