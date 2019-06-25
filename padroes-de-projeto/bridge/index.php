<?php 
	require_once "veiculo.php";
	require_once "pneu.php";

	$veiculoPasseio = new Passeio(new Pneu13());
	echo $veiculoPasseio->getAro();
	
	echo '<br/>';
	
	$veiculoCaminhonete = new Caminhonete(new Pneu15());
	echo $veiculoCaminhonete->getAro();


	

