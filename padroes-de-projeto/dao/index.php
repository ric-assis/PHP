<?php 
	require_once "database.php";
	require_once "clienteDAO.php";
	
	$cliente = new clienteDAO(new Database);
	
	foreach($cliente->getCliente() as $cliente){
		echo "ID: ".$cliente["id"]."<br/>";
		echo "Nome: ".$cliente["nome"]."<br/>";
		echo "Telefone: ".$cliente["telefone"]."<br/>";
		echo "CPF: ".$cliente["cpf"]."<br/>";
		echo "Email: ".$cliente["email"]."<br/></br/>";
	}