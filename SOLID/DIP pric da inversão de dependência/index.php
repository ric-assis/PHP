<?php

	/*
		Módulos de alto nível não devem depender de módulos de baixo nível. Ambos
		devem depender de abstração.
		Dependa de uma abstração e não de uma implementação.
		Abstrações não devem depender de detalhes. Detalhes devem depender de abstrações
		
		Módulos de alto nível são as classes que utilizam outras classes e que não devem depender de classes
		concretas de baixo nível que serão utilizadas para não gerar um alto acoplamento na dependência. 
		Como ex. a classe Editor é alto nível e a classe Ascii é baixo nível.
		Uma classe deve depender(estar associada) a abstrações e não implementação(instancias de classes concretas)
		ou seja a dependência deve ser das classes abstratas  como na classe editor que recebe no construtor uma abstração
		e não teve implementação(instancias de classes) em seu código. 
		Abstrações não devem depender de detalhes das classes de baixo nível ou seja não precisa conhecer todas as suas propriedades
		se olharmos as classes ascii por exemplo deixamos inclusive alguns metodos privados ja que a sua interface não precisa conhecer
		todos os seus comportamentos(metodos) e sim os que ela irá necessitar somente para substituir nas classes de baixo nível que 
		foi o caso do getTexto;
		Com isso permitimos eliminar o forte acoplamento, a classe de alto nível nao se torna fragil a mudanças, o código se torna flexível 
		devido a injeção receber uma abstração e um modelo contreto.
	*/

	require_once 'Editor.php';
	require_once 'Conversor.php';	
	require_once 'Ascii.php';
	require_once 'Binario.php';
	
	
	$ascii = new Ascii('Deus seja louvado');//implementação
	$editor1 = new Editor($ascii);//implementação
	
	echo '-------ASCII------------<br/>';
	echo $editor1->salvarTexto().'<br/>';
	echo $editor1->imprimirTexto();
	
	$binario = new Binario('Deus seja louvado');
	$editor2 = new Editor($binario);
	
	echo '<br/>-------BINARIO------------<br/>';
	echo $editor2->salvarTexto().'<br/>';
	echo $editor2->imprimirTexto();