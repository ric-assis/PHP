<?php
	require_once "cliente.php";
	require_once "adapter-cliente.php";
	
	$cliente = new Adapter_Cliente(new Cliente('Alonso', 'a.ric.c.assis@gmail.com'), 37);
	
	echo 'Nome: '.$cliente->getNome().'<br/>';
	echo 'Email: '.$cliente->getEmail().'<br/>';
	echo 'Idade: '.$cliente->getIdade().'<br/>';