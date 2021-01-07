<?php
	class Binario{
		private $texto;
				
		public function setTexto($texto){
			$this->texto = $texto;	
			$this->converteBinario();
		}
		
		private function converteBinario(){
			$texto = array();
			$quantTexto = strlen($this->texto);
			for($i=0; $i<$quantTexto; $i++){
				array_push($texto, $this->conversorBinario($valor = '', ord($this->texto[$i])));
				while(strlen($texto[$i]) < 8) $texto[$i] = '0'.$texto[$i]; 
			}
			$this->texto = $texto;	
		}
		
		private function conversorBinario($v, $caracter){	
			$v = ($caracter % 2).$v;
			
			if($caracter == 1) return $v;		
			return $this->conversorBinario($v, floor($caracter / 2));		
		}
		
		public function getTexto(){
			return $this->texto;
		}
	}
	
	