<?php
	class Calabresa extends PizzaComponente {	
		public function __construct(){				
			$this->produto =  "Pizza de Calabresa";
			$this->valor = 28.00;
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