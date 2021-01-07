<?php
	/*
	O padrão ISP ou principio da segregação de interface diz que o cliente não deve ser forçado a 
	depender de métodos que não usa.
	Sendo muitas interfaces especificas é melhor do que uma só. Aqui poderiamos ter criado a interface
	combodo já que tanto quarto como cozinha é um combodo a ser construiro e então adicionado todos os
	moveis porém uma geladeira não faz parte de um quarto e uma escrivaninha muito menos de uma cozinha
	mas ambas fazem parte de uma casa. O que fizemos foi segregar(separar) as interfaces para que não 
	tivessemos metodos sem razão em uma classe ou outra.
	*/


	require_once 'Terreno.php';
	require_once 'IQuarto.php';
	require_once 'ICozinha.php';
	require_once 'Quarto.php';
	require_once 'Cozinha.php';
	require_once 'Casa.php';
	
	echo '<br/>------Construir Quarto independente---------------<br/>';
	$quarto  = new Quarto(10, 20);
	echo $quarto->construir();
	
	echo '<br/>-------Construir Cozinha independente-------------<br/>';
	$cozinha = new Cozinha(17, 25);
	echo $cozinha->construir();
	
	echo '<br/>-------Construir Casa-----------<br/>';
	$casa = new Casa(10, 17);
	
	foreach($casa->construirCasa() as $casa){
		echo $casa.'<br/>';
	}