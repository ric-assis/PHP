<?php
	
	require_once "Memento.php";
	require_once "ConcreteMemento.php";
	require_once "Caretaker.php";
	require_once "Texto.php";
	
	/*Padrão utilizado para desfazer ações realizadas pelo usuario em forma de testes por exemplo. O padrão 
	*é bem simples na implementação.
	*/
	
	$texto = new Texto("1 - Primeiro texto a ser adicionado<br/>");	

	//$texto->escrever("1 - Primeiro texto a ser adicionado<br/>");	
	
	$texto->escrever("2 - Segundo texto a ser adicionado<br/>");
	
	$texto->escrever("3 - Terceiro texto a ser adicionado<br/>");
	
	$texto->escrever("4 - Quarto texto a ser adicionado<br/>");
	
	echo $texto->mostrarTexto()."<hr/>";
	
	$texto->desfazer();
	echo "Desfazer acionado...<br/>";
	echo $texto->mostrarTexto()."<hr/>";	
	
	$texto->desfazer();
	echo "Desfazer acionado...<br/>";
	echo $texto->mostrarTexto()."<hr/>";
	
	$texto->desfazer();
	echo "Desfazer acionado...<br/>";
	echo $texto->mostrarTexto()."<hr/>";	
	
	$texto->desfazer();
	echo "Desfazer acionado...<br/>";
	echo $texto->mostrarTexto()."<hr/>";	

	$texto->escrever("5 - Quinto texto a ser adicionado<br/>");	
	$texto->escrever("6 - Sexto texto a ser adicionado<br/>");
	echo $texto->mostrarTexto();
	