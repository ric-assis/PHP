<?php
	require_once "pecas.php";
	require_once "simple-factory.php";

	$fabricaPecas = new PecasFactory();
	
	$peca1 = $fabricaPecas->criarPecas();//Recebe a instancia da classe concreta pecas
	$peca1->setNome('Amortecedor');
	$peca1->setCodigo('001');
	$peca1->setValor('250.00');
	
	echo 'Codigo: '.$peca1->getCodigo().'<br/>';
	echo 'Nome: '.$peca1->getNome().'<br/>';
	echo 'Valor: '.$peca1->getValor().'<br/><br/>';
	
	$peca2 = $fabricaPecas->criarPecas();
	$peca2->setNome('Motor');
	$peca2->setCodigo('002');
	$peca2->setValor('1000.00');	

	echo 'Codigo: '.$peca2->getCodigo().'<br/>';
	echo 'Nome: '.$peca2->getNome().'<br/>';
	echo 'Valor: '.$peca2->getValor().'<br/>';