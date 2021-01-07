<?php
	require_once "peca.php";
	require_once "pecasTrator.php";
	require_once "pecasCarro.php";
	require_once "simple-factory.php";

	$fabricaPecas = new PecasFactory();
	
	$pecaCarro = $fabricaPecas->criarPecas("carro");//Recebe a instancia da classe concreta pecas
	$pecaCarro->setNome('Amortecedor veiculo de passeio 2020');
	$pecaCarro->setCodigo('001');
	$pecaCarro->setValor('250.00');
	
	echo 'Codigo: '.$pecaCarro->getCodigo().'<br/>';
	echo 'Nome: '.$pecaCarro->getNome().'<br/>';
	echo 'Valor: '.$pecaCarro->getValor().'<br/><br/>';
	
	$pecaTrator = $fabricaPecas->criarPecas("trator");
	$pecaTrator->setNome('Motor Trator Agrale');
	$pecaTrator->setCodigo('002');
	$pecaTrator->setValor('20000.00');	

	echo 'Codigo: '.$pecaTrator->getCodigo().'<br/>';
	echo 'Nome: '.$pecaTrator->getNome().'<br/>';
	echo 'Valor: '.$pecaTrator->getValor().'<br/>';
	