<?php
	abstract class PizzaComponente{	
		protected $produto;
		protected $valor;
		
		abstract public function getProduto();

		abstract public function getValor();
		
		abstract public function getValorTotal();
			
	}