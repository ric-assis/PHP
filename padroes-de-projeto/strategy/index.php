<?php
	require_once "funcionario.php";
	require_once "strategy-imposto.php";
	
	$funcionario = new funcionario();
		
	$assistente = $funcionario->salarioLiquido('Assistente', new Calcula_Imposto5(1000));
	$gerente = $funcionario->salarioLiquido('Gerente', new Calcula_Imposto10(3000));
	$diretor = $funcionario->salarioLiquido('Diretor', new Calcula_Imposto15(6000));
	
	echo 'Salario liquido:'.$assistente[0].' => '.$assistente[1].'<br/>';
	echo 'Salario liquido:'.$gerente[0].' => '.$gerente[1].'<br/>';
	echo 'Salario liquido:'.$diretor[0].' => '.$diretor[1].'<br/>';

	
	
	