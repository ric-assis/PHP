<?php

	class Arquivo{
		private $arquivo;		
		
		public function __construct(object $arquivo){
			$this->arquivo = $arquivo;			
		}			
		
		public function salvarTexto():void{	
			
			$salvar = file_put_contents("texto.txt", $this->arquivo->getTexto());
									
			if($salvar != false){
				echo "Tamanho do arquivo salvo ".$salvar."bytes"; 
			}else{
				echo "Ocorreu um erro ao salvar";
			}		
			
		}
		
		public function imprimirTexto():string{ 
			$contArquivo = file_get_contents("texto.txt");			
			if($contArquivo !== false){
				return $contArquivo;
			}else{
				echo "Ocorreu um erro ao abrir o arquivo";			
			}			
		}		
		
	}