<?php

	class Editor{
		private $conversor;
		private $texto;
		
		public function __construct($texto, $tipo){			
			$this->texto = $texto;
			
			switch($tipo){
				case "B":
					$this->conversor = new Binario($texto);
					break;
				case "A":
					$this->conversor = new Ascii($texto);
					break;
				default:
					echo "Opção de conversão invalida.";							
			}
		}
		
		public function exibir(){			
			echo "Texto original: ".$this->texto;
		}
		
		public function salvar(){
			$this->conversor->salvarTexto();
		}
		
		public function imprimir(){
			echo $this->conversor->imprimirtexto();
		}
	}