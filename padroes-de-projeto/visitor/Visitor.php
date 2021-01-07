<?php
	/*Representar uma operação a ser executada nos elementos de uma 
	*estrutura de objetos. Visitor permite definir uma nova operação 
	*sem mudar as classes dos elementos sobre os quais opera.
	*O Visitor é um padrão de projeto comportamental que 
	*permite que você separe algoritmos dos objetos nos quais eles operam.
	*Além de permitir adicionar novos comportamentos à hierarquia de classes 
	*existente sem alterar nenhum código existente.
	*/
	
	abstract class Visitor{
		private $texto;
		
		abstract public function visitar(Editor $editor);		
		
	}