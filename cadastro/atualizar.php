<?php
	$id = addslashes($_GET['id']);
	$nome =addslashes($_GET['nome']); 
	$tel = addslashes($_GET['tel']);
	$cpf = addslashes($_GET['cpf']);
	$email = addslashes($_GET['email']);
	

	if(isset($id) && !empty($id)){
		require "connect.php";		
				
		$stm = $pdo->prepare("UPDATE cliente SET nome=?, telefone=?, cpf=?, email=? WHERE id=?");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $tel);
		$stm->bindValue(3, $cpf);
		$stm->bindValue(4, $email);
		$stm->bindValue(5, $id);
		$stm->execute();
		
		echo "Cadastro atualizado com sucesso.";
	}else{
		echo "Cadastro não atualizado.";
	}
?>