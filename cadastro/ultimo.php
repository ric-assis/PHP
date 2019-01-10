<?php
	require "connect.php";	
	
	$sql = $pdo->query("SELECT * FROM cliente ORDER BY id DESC LIMIT 1");
	if($sql->rowCount()>0){
		$cadastro = $sql->fetch();
	
		/*$dataValue = array(
			"id"=>$cadastro["id"],
			"nome"=>$cadastro["nome"],
			"cpf"=>$cadastro["cpf"],
			"email"=>$cadastro["email"],
			"telefone"=>$cadastro["telefone"]
		);*/
	
		echo json_encode($cadastro);//O json_encode não convert pra json mas deixa a escrita no formato json para que seja convertido no javascript
	}
?>