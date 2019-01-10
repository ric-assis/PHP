<?php
	session_start();
	
	$senha = md5(addslashes($_POST["senha"]));
	$id = $_SESSION["id"];	
	
	if(isset($senha) && !empty($senha)){
		require "connect.php";
		
		$stm = $pdo->prepare("UPDATE cliente SET senha=? WHERE id=?");
		$stm->bindValue(1, $senha);
		$stm->bindValue(2, $id);
		$stm->execute();
					
		echo $id;		
	}
?>