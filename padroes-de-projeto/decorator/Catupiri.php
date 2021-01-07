<?php
	class Catupiri extends IngredienteDecorator {		
		
		public function __construct(PizzaComponente $pizzaComponente){
			parent::__construct($pizzaComponente);			
			$this->produto = "Catupiri";
			$this->valor = 1.25;
		}
		
		/*Não sei qual pizza será escolhida entao pego a pizza da classe pai que é a 
		escolhida e decoro no caso com o valor individual do catupiri*/
		public function getValor(){
			return parent::getValor()."+ <br/>".$this->valor;
		}
		
	}