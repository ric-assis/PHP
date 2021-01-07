<?php 
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "ConcreteObserver.php";	
	require_once "Produto.php";
	
	/* Digamos que seus clientes gostam de ser avisados quando o seu tipo de leitura chega na banca
	*uns gostam de revistas outros livros etc... Avisar que chegou revista a todos nao seria interessantes 
	*para os que gostam de revistas por exemplo então so devemos enviar o email de aviso quando o produto
	*referente ao tipo de leitura do cliente chegar. Para resolver o padrao obsesrver irá ter 2 observers 
	*um para livro e um para revistas quando um ou outro chegar ele ativa o envio de email somente para
	*os clientes cadastrados como um ou outro tipo por exemplo. Podemos ter tantos observers quando precisar 
	*e podemos ativar ou desativar o observador de acordo com a necessidade.
	*/
	
	echo "-----------Aviso aos clientes que gostam de revistas -------------------<br/>";
	$observador = new ConcreteObserver();
			
	$produto = new Produto("Revista");
	
	$produto->attach($observador); //Ativando o observador
	
	echo "Produto na banca - ".$produto->getProduto()."<hr/><br/>";
	
	$produto->setProduto("Jornais");	
			
	$produto->setProduto("Revistas em quadrinhos");

	$produto->detach($observador); //Dasabilitando o observador
	
	$produto->setProduto("Revistas de moda");
	
	echo $produto->getProduto()."<hr/><br/>";	

	
	echo "-----------Aviso aos clientes que gostam de livros -------------------<br/>";
	
	$observador2 = new ConcreteObserver();
	
	$produto2 = new Produto("Livros");
	
	$produto2->attach($observador2);
	
	$produto2->setProduto("Livros romanticos");
	
	$produto2->setProduto("Livros de guerra");
	
	
	
	
	
	
	