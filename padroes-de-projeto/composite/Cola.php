<?php
	class Cola extends Refrigerante{
		public function __construct($refrigeranteNome){
			parent::__construct($refrigeranteNome);
		}		
		
		public function getProduto(){
			return $this->refrigeranteNome;
		}
		
		public function getValor(){
			return 8;
		}
	}