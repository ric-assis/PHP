<?php
	class Ascii extends TemplateMethod{
						
		public function __construct($texto){
			parent::__construct($texto);
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
		
		protected function getTexto(){						
			return $this->texto;
		}
	}