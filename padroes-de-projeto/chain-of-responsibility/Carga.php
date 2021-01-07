<?php
	class Carga{
		private $peso;
		
		public function __construct($peso){
			$this->peso = $peso;
		}
		
		public function getPeso(){
			return $this->peso;
		}		
		
	}