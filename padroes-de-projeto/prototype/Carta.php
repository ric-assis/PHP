<?php

	class Carta extends CartaPrototype{
		
		public function __construct($valor, $nipe, $cor){
			parent::__construct($valor, $nipe, $cor);
		}
		
		public function __clone(){}
		
		
	}