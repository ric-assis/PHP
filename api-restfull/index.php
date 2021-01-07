<?php	
	/*
	* Exemplo simples de API RESTFULL não forão implementados metodos de proteção 
	* para minimizar o código e entendimento
	*/
	
	session_start();
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: *");
	
	use core\Core;
	require __DIR__ ."/routers.php";
	require __DIR__ ."/vendor/autoload.php";
	
	$core = new Core();	
	$core->iniciar();