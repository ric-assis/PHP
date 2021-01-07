<?php
	/*Dinamicamente, agregar responsabilidades adicionais a objetos. Os Decorators fornecem 
	*uma alternativa flexível ao uso de subclasses para extensão de funcionalidades.
	*No nosso exemplo simples temos 2 pizzas e 3 ingredientes para decorar as nossas pizzas,
	*imagine criar novas classes com essas combinações, seriam 6 classes para representa-las
	*algo bem complicado, já com o padrão isso se torna flexivel e dinamico diferentee de 
	*utilizarmos herança de combinações que seriam staticas e não poderiam ser criadas em tempo
	*de execução.
	*/
	
	abstract class IngredienteDecorator extends PizzaComponente{
		protected $pizzaComponente;		
		
		public function __construct(PizzaComponente $pizzaComponente){
			$this->pizzaComponente = $pizzaComponente;				
		}
				
		public function getProduto(){
			return $this->pizzaComponente->getProduto()." + <br/>".$this->produto;			
		}
		
		public function getValor(){
			return $this->pizzaComponente->getValor();
		}
		
		public function getValorTotal(){			
			return $this->pizzaComponente->getValorTotal() + $this->valor;			
		}		
	
	}