<?php
	class VisitorAscii extends Visitor{
		public function visitar(Editor $editor){
			$this->texto = $editor->getTexto();
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
			return implode($this->texto);
		}
	}