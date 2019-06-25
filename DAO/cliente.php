<?php
	require_once "database.php";
	require_once "clienteDAO.php";
	
	$clienteDAO = new ClienteDAO(new Database);
	
	foreach($clienteDAO->listarClientes() as $cliente){
		echo $cliente["id"]." ".$cliente["nome"]." ".$cliente["telefone"]." ".$cliente["cpf"]." ".$cliente["email"]."<br/>";
	}
	
	
	
	
	
	
	
	