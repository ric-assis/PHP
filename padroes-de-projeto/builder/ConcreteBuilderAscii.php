<?php
	class ConcreteBuilderAscii implements Builder{
		private $ascii;
		
		public function criar($texto){
			$this->ascii = new Ascii();
			$this->ascii->setTexto($texto);	
		}
		
		public function getTexto(){
			$this->ascii->getTexto();
		}
		
		public function getConversor(){
			return $this->ascii;
		}
	}