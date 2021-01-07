<?php
	class Ascii implements IConversor{
		private $texto;
		
		public function __construct(string $texto){			
			$this->texto = $texto;
			$this->converteAscii();
		}				
					
		private function converteAscii():void{			
			$texto = array();
			$quantTexto = strlen($this->texto);
		
			for($i=0; $i<$quantTexto; $i++){
				array_push($texto, ord($this->texto[$i]));				
			}
			
			$this->texto = $texto;			
		}
		
		public function getTexto():array{						
			return $this->texto;
		}
	}