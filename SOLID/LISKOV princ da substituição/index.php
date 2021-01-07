<?php
	/*
		O padrão LISKOV deixa o código limpo e desacoplado. Apesar de parecer redudande na implementação
		das classes o ganho compensa o trabalho quando olhamos a facilidade de reaproveitamento do 
		das classes e se olharmos as mesmas podemos ver que estão fechadas para alteração e abertas
		para extensões seguindo também o principio do OCP, os dois padrões tem uma relação bem harmoniosa.
		Aqui tratarmos tipos iguais com necessidade de soluções diferentes onde cada conversão devolve um texto
		porém convertido de formas especificas. 		
		Esse principio se encaixa bem onde apesar de seguir todas as regras de OO e do mundo real os objetos não
		se encaixam ao usar polimorfismo ou herança assim ele permite uma distinção única de cada objeto.
	*/
	
	
	require_once 'Arquivo.php';
	require_once 'Ascii.php';
	require_once 'Binario.php';
	
	$textoAscii = new Ascii('Deus seja louvado');
	$arquivoA = new Arquivo($textoAscii);
	
	$arquivoA->salvarTexto();
	echo '<br/>';
	echo $arquivoA->imprimirTexto();
	
	echo '<br/>------------------------<br/>';
	
	$textoBinario = new Binario('Deus seja louvado');
	$arquivoB = new Arquivo($textoBinario);
	
	$arquivoB->salvarTexto();
	echo '<br/>';
	echo $arquivoB->imprimirTexto();