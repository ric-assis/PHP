<?php
	abstract class Refrigerante extends Pedido{
		protected $refrigeranteNome;
		
		public function __construct($refrigeranteNome){
			$this->refrigeranteNome = $refrigeranteNome;			
		}
		
		abstract public function getProduto();
		
		abstract public function getValor();
	}