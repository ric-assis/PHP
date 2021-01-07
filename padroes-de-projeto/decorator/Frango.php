<?php
	class Frango extends PizzaComponente {	
		public function __construct(){				
			$this->produto =  "Pizza de Frango";
			$this->valor = 35.00;
		}
			
		public function getProduto(){
			return $this->produto;
		}			
		
		public function getValor(){
			return $this->valor;
		}
		
		public function getValorTotal(){
			return $this->valor;
		}	
		
		
	
	}