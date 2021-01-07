<?php
	require_once "Editor.php";
	require_once "Visitor.php";
	require_once "VisitorBinario.php";
	require_once "VisitorAscii.php";
	
	/*O padrão separa o algoritmo dos objetos nos quais eles operam, ou seja temos dois grupos 
	*os visitantes e os elementos sobre os quais estão sendo aplicadas as operações temdo um 
	*baixo acoplamento e auta reutilização de código.
	*Esse padrão é muito utilizado para operações complexas como criação de compiladores devido 
	*a sua forma de trabalhar com estruturas complexas como arvores no caso dos compiladores, no
	*exemplo temos uma unica classe ao inves de uma estrutura o que pode nao deixar claro seu uso aqui. 
	*No exemplo ele foi usado devido a existencia da classe editor que permitia salvar e abrir 
	*um texto além de mostra-lo mas que não poderia ser reescrita ou alterada e nem extendida, 
	*então como adicionar novos algoritmos? 
	*O padrão Visitor ou visitante é injetado na classe que operam que na verdade irá receber uma 
	*pequena alteração, um metodo pra receber o visitante(accept) e devolver a classe que operam.	
	*Se você se deparar mais tarde adicionando um novo comportamento relacionado ao editor, 
	*tudo que você precisa fazer é implementar uma nova classe visitante.
	*Porem os visitantes podem não ter seu acesso permitido para campos e métodos privados dos 
	*elementos que eles deveriam estar trabalhando.
	*/
	
	
	$editor = new Editor("Deus seja louvado.");
	
	$binario = new VisitorBinario($editor);
	
	$editor->accept($binario);	
	
	echo $binario->getTexto();
	
	