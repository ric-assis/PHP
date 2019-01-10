<?php
	require "connect.php";
	
	$sql = $pdo->query("SELECT * FROM cliente LIMIT 1");
	
	if($sql->rowCount() > 0){
		$cadastro = $sql->fetch();		
		
		/*$dataValue =array("id" => $cadastro["id"],
						"nome" => $cadastro["nome"],
						"email" => $cadastro["email"],
						"telefone" => $cadastro["telefone"],
						"cpf" => $cadastro["cpf"]
					);*/		
		
		echo json_encode($cadastro);
	}
	
?>