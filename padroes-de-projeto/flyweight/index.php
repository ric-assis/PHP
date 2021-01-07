<?php
	/*A vantagem do Flyweight ou peso mosca é a de usar objetos que ja foram instanciados ao inves de criar novamente
	*, ele separa o que varia do que não varia em um objeto. No exemplo varias arvores sao plantadas em lugares diferentes
	*porem muitas dessas arvores tem a especie em comum e só os lugares de plantar variam para todas. Assim separamos as 
	*arvores dos lugares e o factory do flyweight é que decide quando instanciar ou quando devolver um objeto com sua posicao
	*assim podemos ter 1000 objetos que na verdade ocupa na memoria o espeço de 1. É muito usado em jopgos para criar objetos 
	*repetidos como soldados por ex. 
	Permite uma baita economia de memoria dependendo da situação.
	*/

	require_once "FlyweightFactory.php";
	
	$arvoresPlantadas = array();
	
	$flyweightFactory = new FlyweightFactory();
	
	
	//Cria 20 arvores com as 4 especies Especie-0, Especie-1, Especie-2,Especie-3	
	for($i=0; $i<20; $i++){		
		$especies = mt_rand(0, 3);
		array_push($arvoresPlantadas, $flyweightFactory->getFlyweight("Especie-".$especies));		
	}
	
	
	//Depois de criada as arvores sao plantadas em posicoes diferentes
	foreach($arvoresPlantadas as $arvore){
		$x = mt_rand(0, 99);
		$y = mt_rand(0, 99);
		
		$arvore->plantarArvores(new ArvorePlantada($x, $y));
		echo "<br/>";
	}
	
	echo "<hr/>Quantidade de árvores criadas: ".$arvoresPlantadas[0]::$cont;
	echo "<hr/>Quantidade de árvores plantadas: ".count($arvoresPlantadas);
	