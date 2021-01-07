<?php
	require_once "abstract-fabrica-fabricante.php";
	require_once "abstract-fabrica.php";
	require_once "fabrica-Ford.php";
	require_once "fabrica-fiat.php";
	
	/*A diferença entre um Factory Method e um Abstract Method é o agrupamento de objetos enquanto que 
	*na Factory Method só temos uma fábrica pra um unico modelo de produto no abstract podemos ter varias
	*fabricas como uma matriz de objetos agrupados por linha ou por colunas. No exemplo do factory method
	*criamos uma unica fabrica que produz pecas de varios tipos mas todas peças ja aqui temos uma fabrica
	*que produz veiculos sedan e outra popular e esses veiculos sao agrupados em marcas entao temos uma
	*outra fabrica da ford e uma da fiat que sao fabricas também porém das fabricas de veiculos. 
	*A ideia principal aqui é a necessidade de agrupar e variar porém sem conhecer o objeto escolhido.
	*como em uma pizaria que pode ter varios tamanhos de pizza entao uma fabrica pra pizza grande, pequena, media 
	*porém nao basta temos que ter um sabor pra cada pizza que seja fabricada grande, media e pequena então
	*além de fabricarmos os tamanhos variados temos também que fabricar os sabores que so saberemos qual
	*instanciar quando o cliente selecionar.
	*/
	
	
	$fabricaFord = new FabricaFord();
	$fordPopular = $fabricaFord->criarCarro('popular', 'Ford KA', '2011', '26000,00');
	$fordPopular = $fabricaFord->criarCarro('popular', 'Ford Cruise', '2015', '28000,00');
	$fordPopular = $fabricaFord->criarCarro('popular', 'Ford Fiesta Ztec', '2013', '32000,00');
	
	$fordSedan = $fabricaFord->criarCarro('sedan', 'Ford Fiesta Titanium', '2013', '43000,00');
	$fordSedan = $fabricaFord->criarCarro('sedan', 'Ford Ranger', '2017', '80000,00');
	
	$fabricaFiat = new FabricaFiat();
	$fiatPopular = $fabricaFiat->criarCarro('popular', 'Palio', '2010', '19000,00');
	$fiatPopular = $fabricaFiat->criarCarro('popular', 'Uno', '2015', '16000,00');
	
	$fiatSedan = $fabricaFiat->criarCarro('sedan', 'Siena ELX', '2014', '36000,00');
	$fiatSedan = $fabricaFiat->criarCarro('sedan', 'Pickup Estrada', '2016', '46000,00');
	$fiatSedan = $fabricaFiat->criarCarro('sedan', 'Fiat Toro', '2017', '79000,00');
	
	echo '<strong>Carros populares:</strong><br/>';
	foreach($fordPopular as $fp){
		$fp->mostrarCarro();
		echo '<br/>';
	}
	foreach($fiatPopular as $fp){
		$fp->mostrarCarro();
		echo '<br/>';
	}
	
	echo '<br/><strong>Carros sedan:</strong><br/>';
	
	foreach($fordSedan as $fs){
		$fs->mostrarCarro();
		echo '<br/>';
	}
	foreach($fiatSedan as $fs){
		$fs->mostrarCarro();
		echo '<br/>';
	}
	
	