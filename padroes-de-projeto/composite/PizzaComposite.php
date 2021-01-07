<?php
	abstract class PizzaComposite extends Pedido{
		private $ingredientes = array();
		
		public function addIngrediente(Pedido $ingrediente){
			$this->ingredientes[] = $ingrediente;			
		}
		
		public function removeIngrediente(Pedido $ingrediente){
			foreach($this->ingredientes as $chave => $produtoAdicionado){
				if($produtoAdicionado === $ingrediente){
					unset($this->ingredientes[$chave]);
				}			
			}
		}		
		
		public function getIngredientes(){	
			$ingrediente = array();
			foreach($this->ingredientes as $i){				
				$ingrediente[] = $i->getProduto();
			}
			
			return $ingrediente;
		}
		
		public function getIngredientesValor(){
			$valorIngrediente = array();
			foreach($this->ingredientes as $ingrediente){
				$valorIngrediente[] = $ingrediente->getValor();
			}
		
			return $valorIngrediente;
		}
		
		abstract public function getProduto();
		
		abstract public function getValor();
		
	}