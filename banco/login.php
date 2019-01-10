<?php
	session_start();
	
	header("Content-type:text/html; charset=UTF-8",true);
	
	$conta = addslashes($_POST["conta"]);
	$senha = md5(addslashes($_POST["senha"]));	

	if((isset($conta) && isset($senha)) && (!empty($conta) && !empty($senha))){
		
		require "connect.php";	
		
		$stm = $pdo->prepare("SELECT id, conta, senha FROM contas WHERE conta=? and senha=?");
		$stm->bindValue(1, $conta);
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$_SESSION["id"] = $stm["id"];
			echo $stm["id"];			
		}else{
			echo "Senha ou conta inválida";
		}
		
	}else{
		echo "Preencha a senha ou conta.";
	}
		
?>