<?php
	class Tomate extends Ingrediente {
		public function __construct($ingredienteNome){
			parent::__construct($ingredienteNome);
		}
		
		public function getProduto(){
			return $this->ingredienteNome;
		}
		
		public function getValor(){
			return 0.20;
		}
	}