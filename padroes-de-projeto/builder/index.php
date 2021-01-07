<?php
	require_once "Director.php";
	require_once "Builder.php";
	require_once "ConcreteBuilderAscii.php";
	require_once "ConcreteBuilderBinario.php";
	require_once "Ascii.php";
	require_once "Binario.php";

	$texto = "CD";
	$textoAscii = (new Director())->build(new ConcreteBuilderAscii(), $texto);
	
	echo "Salvar o texto: '".$texto."', como?<hr/>ASCII:";	
	
	foreach($textoAscii->getTexto() as $t){
		echo $t;
	}
	
	$textoBinario = (new Director())->build(new ConcreteBuilderBinario(), $texto);
	
	echo "<hr/>Binario:";
	
	foreach($textoBinario->getTexto() as $tex){
		echo $tex;
	}
	
	
	