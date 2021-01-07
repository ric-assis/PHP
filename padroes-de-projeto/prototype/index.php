<?php
	require_once "CartaPrototype.php";
	require_once "Carta.php";
	
	/*clona o objeto carta.
	/*PHP diferentemente de outras linguagens ja possui o padrao Prototype de forma primitiva
	*Esse padrão pode ser criado manualmente nas linguegens que aceitam sobrecarga de methodo
	*pois precisariamos de dois contrutores na implementação, o que não é aceito em PHP sendo
	*o padrao ja está implementado na linguagem. Basta adicionar o metodo clone() na classe
	*desejada e instanciar os clones com o metodo magico conforme exemplo. Esse metodo não 
	*aceita parametros.
	*/
	
	$carta = new Carta("7", "Paus", "Vermelho");

	$c1 = clone $carta;
	$c1->setValor("8");
	$c1->setNipe("Copas");
	$c1->setCor("Preto");
	
	$c2 = clone $carta;
	$c2->setValor("2");
	$c2->setNipe("Valete");
	$c2->setCor("Vermelho");
	
	echo $carta->getValor()."<br/>";
	echo $carta->getNipe()."<br/>";
	echo $carta->getCor()."<br/><hr/>";
	
	echo $c1->getValor()."<br/>";
	echo $c1->getNipe()."<br/>";
	echo $c1->getCor()."<br/><hr/>";
	
	echo $c2->getValor()."<br/>";
	echo $c2->getNipe()."<br/>";
	echo $c2->getCor()."<br/><hr/>";
	