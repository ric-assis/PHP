<?php
	/*Compõe objetos em estrutura de arvore para representar hierarquias parte-todo
	*Composite permite aos clientes tratarem de maneira uniforme objetos individuais e 
	*composições de objetos.
	*Esse padrão usa a recursividade para compor o todo.
	*O maior problema é a questão de ter uma interface única para todos os objetos o que 
	*acaba sendo necessário uma interface bem generica ou abstrata.
	*Se olharmos o exemplo vemos uma arvore onde o no raiz produto tem o no lanche que tem 
	*no pizza com 2 nos que tem o no ingredientes com 3 folhas além de refrigerante com 2 folhas
	*/


	class LancheComposite extends Pedido{
		private $produtos = array();
		
		public function addProdutos(Pedido $produto){
			$this->produtos[] = $produto;			
		}
		
		public function removeProdutos(Pedido $produto){
			foreach($this->produtos as $chave => $produtoAdicionado){
				if($produtoAdicionado === $produto){
					unset($this->produtos[$chave]);
				}			
			}
		}
		
		public function getProduto(){	
			$produto = array();
			foreach($this->produtos as $p){				
				$produto[] = $p->getProduto();
			}
			
			return $produto;
		}
		
		public function getValor(){
			$valorProduto = array();
			foreach($this->produtos as $produto){
				$valorProduto[] = $produto->getValor();
			}
		
			return $valorProduto;
		}
	}
	