<?php
	class ConcreteBuilderbinario implements Builder{
		private $binario;
		
		public function criar($texto){
			$this->binario = new Binario();	
			$this->binario->setTexto($texto);	
		}
		
		public function getTexto(){
			$this->binario->getTexto();
		}
								
		public function getConversor(){
			return $this->binario;//Retorna o objeto Binario
		}
	}