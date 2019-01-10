<?php
	session_start();
	
	$chave = addslashes($_GET["chave"]);
	
	header("Content-type:text/html; charset=UTF-8");
	
	if(isset($chave) && !empty($chave)){
		require "connect.php";
		
		$stm = $pdo->prepare("SELECT chave FROM usuario WHERE chave=?");
		$stm-> bindValue(1, $chave);
		$stm->execute();

		if($stm->rowCount() > 0){
			$stm = null;
			header("Location:cadastrar.php");
		}else{
			echo " Chave inválida.";
		}		
	}
	
?>
