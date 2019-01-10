<?php
	header("Content-type:text/html; charset=UTF-8",true);
	
	require_once "cliente.class.php";
	require_once "crud.cliente.class.php";
	
	$nome = addslashes($_POST["nome"]);
	$email = addslashes($_POST["email"]);
	$bairro = addslashes($_POST["bairro"]);
	$rua = addslashes($_POST["rua"]);
	$numero = addslashes($_POST["numero"]);
		
	if((isset($nome) && isset($email)) && (!empty($nome) && !empty($email))){	
		$cliente = new Cliente();
		
		$cliente->setNome($nome);
		$cliente->setEmail($email);
		$cliente->setBairro($bairro);
		$cliente->setRua($rua);
		$cliente->setNumero($numero);
		
		$crud = new CrudCliente();
		echo $crud->salvar($cliente);
	}else{
		echo "Nome ou email inválidos";
	}	
?>