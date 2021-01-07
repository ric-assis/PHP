<?php
	class Ascii{
		private $texto;
				
		public function setTexto($texto){		
			$this->texto = $texto;	
			$this->converteAscii();	
		}
				
		private function converteAscii(){			
			$texto = array();
			$quantTexto = strlen($this->texto);
		
			for($i=0; $i<$quantTexto; $i++){
				array_push($texto, ord($this->texto[$i]));				
			}
			
			$this->texto = $texto;			
		}
		
		public function getTexto(){						
			return $this->texto;
		}
	}