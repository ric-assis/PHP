<?php
	/* Prepared Statement ou declaração preparada é otimizada pelo banco rodando mais rápido além de evitar SQL injection pois recebe os valores diretamente das 
variaaveis identificando que ? ou :nome é uma variavel e não parte do texto da consulta query evitando adicionar aspas como parte do comando sql,
a consulta é divida em duas partes os aargumentos e o comando.*/
	
	require "connect.php";
	
	$id = addslashes($_GET["id"]);
	
	if(isset($id) && !empty($id)){
		$stm = $pdo->prepare("SELECT * FROM cliente WHERE id < ? ORDER BY id DESC LIMIT 1");
		$stm->bindValue(1, $id);		
		$stm->execute();
		
				
		if($stm->rowCount() > 0){
			$cadastro = $stm->fetch(PDO::FETCH_ASSOC);			
			echo json_encode($cadastro);		
		}
	}
?>