<?php
	$nome = addslashes($_POST['nome']);
	$tel = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$cpf = addslashes($_POST['cpf']);
	
	if(isset($nome) && !empty($nome)){
		require "connect.php";	
		
		$stm = $pdo->prepare("INSERT INTO cliente(nome, telefone, email, cpf) VALUES(?, ?, ?, ?)");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $tel);
		$stm->bindValue(3, $email);
		$stm->bindValue(4, $cpf);		
		$stm->execute();		
		
		echo "Cadastro realizado";
	}else{
		echo "Cadastro não realizado";
	}

?>