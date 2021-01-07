<?php 
	/*A nossa classe receiver pode ser qualquer classe inclusive de terceiros	
	*/
	
	class TextoReceiver{
		private $texto;
				
		public function __construct($texto){
			$this->texto = $texto;
		}
		
		public function setTexto($texto){
			$this->texto = $texto;
		}
				
		public function converteBinario(){
			$texto = array();
			$quantTexto = strlen($this->texto);
			for($i=0; $i<$quantTexto; $i++){
				array_push($texto, $this->conversorBinario($valor = '', ord($this->texto[$i])));
				while(strlen($texto[$i]) < 8) $texto[$i] = '0'.$texto[$i]; 
			}
			$this->texto = implode($texto);	
		}
		
		private function conversorBinario($v, $caracter){	
			$v = ($caracter % 2).$v;
			
			if($caracter == 1) return $v;		
			return $this->conversorBinario($v, floor($caracter / 2));		
		}
		
		public function converteAscii(){			
			$texto = array();
			$quantTexto = strlen($this->texto);
		
			for($i=0; $i<$quantTexto; $i++){
				array_push($texto, ord($this->texto[$i]));				
			}
			
			$this->texto = implode($texto);			
		}
		
		public function abrir(){		
			$this->texto = file_get_contents("texto.txt");						
			
			if(!$this->texto){
				throw new Exception("Ocorreu um erro ao abrir o arquivo.");
			}			
		}
		
		public function salvar(){				
			$salvar = file_put_contents("texto.txt", $this->texto);
			
			if(!$salvar){
				throw new Exception("Ocorreu um erro ao salvar o arquivo.");
			}
			
			$this->texto = $salvar;	
			
		}
		
		public function getTexto(){
			return $this->texto;
		}
		
	}