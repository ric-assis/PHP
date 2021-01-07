<?php
	/*
		O problema reflete uma situação onde o OCP se encaixa bem,
		poderiamos ter N impostos ou cada ano ser necessário o acrescimo de novos
		impostos na empresa porém mesmo assim ela continua uma classe extensivel 
		coesa e limpa. Além de atender o padrão SRP facilitando a reutilização das classes.
		As classes devem ser fechadas para alteração e abertas para novas extensões.
		A classe estão fechadas para a necessidade de modificações no codigo pois executam exatamente
		o que foi proposto e caso necessite de alteracao como um novo imposto ela esta aberta para 
		novas extensoes ou impostos sem alterar o codigo existente que está fechado.
		
		
	*/
	
	require_once 'Imposto.php';
	require_once 'ImpostoJunior.php';
	require_once 'ImpostoSenior.php';
		
		
	$impostoJunior = new Imposto();
	$impostoJunior->setNome('Alonso');
	$impostoJunior->setCargo('Junior');
	$impostoJunior->setSalario(1000);
			
	echo $impostoJunior->getNome().'<br/>';
	echo $impostoJunior->getCargo().'<br/>';
	echo $impostoJunior->salarioLiquido();
		

	echo '<br/>--------------------------------<br/>';
	
	$impostoSenior = new Imposto();
	$impostoSenior->setNome('Ricardo');
	$impostoSenior->setCargo('Senior');
	$impostoSenior->setSalario(2000);
	
	echo $impostoSenior->getNome().'<br/>';
	echo $impostoSenior->getCargo().'<br/>';
	echo $impostoSenior->salarioLiquido();
	

	