<?php
	class Queijo extends IngredienteDecorator {		
		public function __construct(PizzaComponente $pizzaComponente){
			parent::__construct($pizzaComponente);			
			$this->produto = "Queijo";
			$this->valor =  0.50;
		}

		public function getValor(){
			return parent::getValor()." + <br/>".$this->valor;
		}
		
	}