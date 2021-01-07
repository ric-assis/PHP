<?php
	require_once "Editor.php";
	require_once "TemplateMethod.php";
	require_once "Binario.php";
	require_once "Ascii.php";
	
	/*O padrão Template Method trabalha com a reutilização de códigos separando
	*os metodos que variam em suas classes extendidas dos generalistas utilizados por
	*todos deixando esses metodos em sua classe abstrada e variando o que for necessário
	*em suas classes filhas extendidas. Quando a necessidade a classe base chama um 
	*atributo das classes filhas aumentando a reutilizacao de codigo pois os metodos
	*genericos ficam na mesma.
	*É um padrão que funciona muito bem com o Factory Method como estamos vendo aqui.
	*/
	
	
	$editor = new Editor("Deus seja louvado", "B");
	
	$editor->exibir(); echo "<hr/>";
	
	$editor->salvar(); echo "<hr/>";
	
	$editor->imprimir(); echo "<hr/>";