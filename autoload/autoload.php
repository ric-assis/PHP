<?php 
	/*O NOME DO ARQUIVO OU PARTE DELE QUE SERÁ SUBSTITUIDO TEM QUE TER O MESMO NOME DA CLASSE (autoload nao é case sensitive)
	* Classe Pessoa arquivo pessoa.class.php; Parte substituida pessoa
	*/
	
	spl_autoload_register(function($class){
		if(file_exists('pessoa/'.$class.'.class.php')){
			require 'pessoa/'.$class.'.class.php';
		}elseif(file_exists('carro/'.$class.'.class.php')){
			require 'carro/'.$class.'.class.php';
		}
	});