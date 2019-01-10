<?php
	session_start();
	
	$email = addslashes($_POST["email"]);
	$senha = md5(addslashes($_POST["senha"]));
	
	require "connect.php";
	if((isset($email) && isset($senha)) && (!empty($email) && !empty($senha))){
		$stm = $pdo->prepare("SELECT cliente.id, cliente.nome, niveis.nivel as n_nivel FROM cliente 
							LEFT JOIN niveis ON cliente.nivel = niveis.qtponto WHERE email=? and senha=?");
		$stm->bindValue(1, $email);
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$_SESSION["id"]=$stm["id"];		
			
			echo json_encode($stm);
		}
	}	
?>