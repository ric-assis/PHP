<?php
	$id = addslashes($_GET['id']);
	
	if(isset($id) && !empty($id)){
		require "connect.php";
		
		$stm = $pdo->prepare("DELETE FROM cliente WHERE id=?");
		$stm = bindValue(1, $id);
		$stm->execute();
		
		echo "Cadastro ".$id." removido";
	}else{
		echo "Informe um código válido - não removido.";
	}
	
?>