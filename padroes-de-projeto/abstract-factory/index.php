<?php
	require_once "abstract-fabrica.php";
	require_once "fabrica-Ford.php";
	require_once "fabrica-fiat.php";
	
	$fabricaFord = new FabricaFord();
	$fordPopular = $fabricaFord->criarCarroPopular('Ford KA', '2011', '26000,00');
	$fordSedan = $fabricaFord->criarCarroSedan('Ford Fiesta', '2013', '43000,00');
	
	$fabricaFiat = new FabricaFiat();
	$fiatPopular = $fabricaFiat->criarCarroPopular('Palio', '2010', '19000,00');
	$fiatSedan = $fabricaFiat->criarCarroSedan('Siena ELX', '2014', '36000,00');
	
	echo '<strong>Carros populares:</strong><br/>';
	$fordPopular->mostrarCarro();
	echo '<br/>';
	$fiatPopular->mostrarCarro();
	
	echo '<br/><strong>Carros sedan:</strong><br/>';
	$fordSedan->mostrarCarro();
	echo '<br/>';
	$fiatSedan->mostrarCarro();