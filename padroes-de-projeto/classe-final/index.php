<?php

	require "pessoa.php";
	
	$funcionario = new Funcionario();
	$funcionario->setNome('Alonso');
	$funcionario->setIdade('37');
	$funcionario->setRegistro('001');
	
	echo $funcionario->getRegistro().' => '.$funcionario->getNome().' => '.$funcionario->getIdade();