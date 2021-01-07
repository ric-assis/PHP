<?php
	require_once "Funcionario.php";
	require_once "funcionarioContabilidade.php";
	require_once "funcionarioTi.php";
	require_once "Iterator.php";
	require_once "FuncionarioContabilidadeIterator.php";
	require_once "FuncionarioTiIterator.php";
	
	/*O padrão permite percorrer coleções como array, matriz, lista, pilha etc
	*sem que conheça sua implementação e sem expor seus atributos ou metodos pois
	*trabalhamos com interface e todo o movimento de percorrer é feito pelo iterator.	
	*Devemos ter atenção caso o iterator exclua ou altere a coleção pois podemos ter 
	*varios iteiradores sobre uma coleção e se um excluir um indice poderá acarretar
	*problemas para os outros iteiradores.
	*Para cada coleção teremos um iteirador que poderá que receberá a coleção porém 
	*essa terá uma dempendencia de seu iteirador.
	*/	
	
	$f = new FuncionarioTi();
	$f->adicionarFuncionario("Alonso");
	$f->adicionarFuncionario("Ricardo");		
	$f->adicionarFuncionario("Assis");	
		
	
	echo "FUNCIONARIOS DE TI<br/>";	
	$fiterator = $f->listaDeFuncionario();	
		
	while(!$fiterator->isDone()){
		echo"<hr/>".$fiterator->currentItem();
		$fiterator->next();				
	};		
			
	
	echo "<hr/>FUNCIONARIOS DA CONTABILIDADE<br/>";
	
	$f = new FuncionarioContabilidade();
	$f->adicionarFuncionario("001", "Daniel");
	$f->adicionarFuncionario("002", "Jõao");	
	$f->adicionarFuncionario("003", "Maria");
	
	
	$fiterator = $f->listaDeFuncionario();	
	
	$fiterator->first();
	echo "Primeiro: ".$fiterator->currentItem()[1];
	
	$fiterator->next();	
	echo"<hr/>Proximo: ".$fiterator->currentItem()[1];
	
	$fiterator->next();	
	echo"<hr/>Proximo: ".$fiterator->currentItem()[1];	

	
	
	