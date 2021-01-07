<?php
	session_start();
	
	spl_autoload_register(function($classe){
		if(file_exists('controllers/'.$classe.'.php')){
			require_once 'controllers/'.$classe.'.php';
		}else if(file_exists('models/'.$classe.'.php')){
			require_once 'models/'.$classe.'.php';
		}else if(file_exists('core/'.$classe.'.php')){
			require_once 'core/'.$classe.'.php';			
		}else if(file_exists('DAO/'.$classe.'.php')){
			require_once 'DAO/'.$classe.'.php';
		}
	});
	
	$core = new Core();
	$core->iniciar();
