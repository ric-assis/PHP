<?php
	require_once "Invoker.php";
	require_once "TextoReceiver.php";
	require_once "EditorCommand.php";
	require_once "Abrir.php";
	require_once "Salvar.php";
	require_once "Ascii.php";
	require_once "Binario.php";
	
	/*
	*Uma das vantagens do Command é o tratamento de metodos como objetos
	*além de eliminar os ifs nas verificações dos objetos necessários pra execução.
	*Outra vantagem do padrão é a facilidade em manter um log ou desfazer e refazer
	*ações através da classe invoker. 
	*O Invoker é o responsavél por executar os comandos, para isso ele utiliza somente um metodo comum a todas as classes 
	*O command funciona como uma camada intermediaria evitando o acoplamento entre a classe cliente e as 
	*classes concretas.
	*A classe Receiver poderia ser qualquer classe ela simplemente possui os metodos a serem tratados. Poderia ser uma classe de
	*terceiros.
	*/
	
	try{
		$textoReceiver = new TextoReceiver("Deus seja louvado");
		
		$binario = new Binario($textoReceiver);		
		$invoker = new Invoker($binario);
		echo $textoReceiver->getTexto();
		
		$salvar = new Salvar($textoReceiver);
		$invoker = new Invoker($salvar);
		
	}catch (Exception $e){
		echo $e->getMessage();
	}
	
	
