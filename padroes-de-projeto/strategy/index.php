<?php
	require_once "funcionario.php";
		
	
	$funcionario = new funcionario();
	
	echo 'Salario Liquido Assistente: '.$funcionario->salarioLiquido('Assistente', 1000).' <br/>';
	echo 'Salario Liquido Gerente: '.$funcionario->salarioLiquido('Gerente', 3000).' <br/>';
	echo 'Salario Liquido Diretor: '.$funcionario->salarioLiquido('Diretor', 6000).' <br/>';
	

	
	
	