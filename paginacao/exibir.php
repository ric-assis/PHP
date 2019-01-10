<?php
	require_once "connect.php";
	
	$sql = $pdo->query("SELECT * FROM novelas ORDER BY id DESC LIMIT 1");
	if($sql->rowCount() > 0){
		$sql = $sql->fetch();
		echo json_encode($sql);
	}else{
		echo "Ocorreu um erro na sua inserção do cadastro, tente novamente.";
	}		
?>