<?php
	//Client do livro GOF
	require_once "ExpAlgebrica.php";
	require_once "Variavel.php";
	require_once "Contexto.php";
	require_once "Somar.php";
	require_once "Subtrair.php";
	
	$x = new Variavel("X");
	$y = new Variavel("Y");
	$z = new Variavel("Z");
	$a = new Variavel("A");
	
	$contexto = new Contexto();
	
	$contexto->assign($x, 5);
	$contexto->assign($y, 2);
	$contexto->assign($z, 3);
	$contexto->assign($a, 4);
	
	$expressao = new Subtrair(new Somar(new Subtrair($x, $y), $z), $a);	
	
	
	echo "Resultado = ". $expressao->interpret($contexto);