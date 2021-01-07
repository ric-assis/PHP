<?php
	class Tomate extends IngredienteDecorator {
		public function __construct(PizzaComponente $pizzaComponente){
			parent::__construct($pizzaComponente);			
			$this->produto = "Tomate";
			$this->valor = 0.20;
		}

		public function getValor(){
			return parent::getValor()." + <br/>".$this->valor;
		}	
		
	}