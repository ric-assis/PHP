<?php
	abstract class Ingrediente extends Pedido{
		protected $IngredienteNome;		
		
		public function __construct($ingredienteNome){
			$this->ingredienteNome = $ingredienteNome;	
		}
		
		abstract public function getProduto();
		
		abstract public function getValor();
	}