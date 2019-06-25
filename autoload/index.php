<?php

	/*O NOME DO ARQUIVO OU PARTE DELE QUE SERÁ SUBSTITUIDO TEM QUE TER O MESMO NOME DA CLASSE (autoload nao é case sensitive)
	* Classe Pessoa arquivo pessoa.class.php; Parte substituida pessoa
	*/	
	
	require_once "autoload.php";
	
	$pessoa = new Pessoa();
	echo "Eu sou uma pessoa e ";
	$pessoa->getAndar();
	echo "<br/><br/>";
	
	$carro = new Carro();
	echo "Eu sou um carro e ";
	$carro->getRodar();