<?php
	session_start();

	
	/*
		O autoload procura o nome da classe instanciada e substitui a variavel $class por ela executando o require.
	*/
	spl_autoload_register(function($class){
		if(file_exists('controllers/'.$class.'.php')){
			require_once 'controllers/'.$class.'.php';
		}else if(file_exists('models/'.$class.'.php')){
			require_once 'models/'.$class.'.php';
		}else if(file_exists('core/'.$class.'.php')){
			require_once 'core/'.$class.'.php';			
		}
	});
	
	$core = new Core();
	$core->run();
	
	
