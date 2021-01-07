<?php
	session_start();//A sessao so inicia uma vez no index e pode sser usada em todas as paginas


	/*
		O autoload procura o nome da classe instanciada e substitui a variavel $class por ela executando o require.
		O COMANDO FILE_EXISTS ANALIZA DE ACORDO COM O SO, NO WINDOWS NAO É CASE SENSITIVE JA NO LINUX É, CUIDADO COM NOMES DE ARQ. PHP E CLASSES
	*/
	spl_autoload_register(function($class){
		if(file_exists('controllers/'.$class.'.php')){
			require_once 'controllers/'.$class.'.php';
		}else if(file_exists('models/'.$class.'.php')){
			require_once 'models/'.$class.'.php';
		}else if(file_exists('core/'.$class.'.php')){
			require_once 'core/'.$class.'.php';			
		}else if(file_exists('DAO/'.$class.'.php')){
			require_once 'DAO/'.$class.'.php';
		}
	});
	
	
	
	$core = new core();
	$core->run();
	
	
