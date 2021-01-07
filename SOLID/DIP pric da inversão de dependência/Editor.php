<?php

	class Editor{
		private $conversor;		
			
		public function __construct(IConversor $conversor){		
			$this->conversor = $conversor;
		}		
						
		public function salvarTexto():string{
			
			$salvar = file_put_contents('texto.txt', $this->conversor->getTexto());
			
			if($salvar != false){
				return 'Tamanho do arquivo salvo '.$salvar.'bytes'; 
			}else{
				return 'Ocorreu um erro ao salvar';
			}		
			
		}
		
		public function imprimirTexto():string{ 
			$contArquivo = file_get_contents('texto.txt');			
			if($contArquivo !== false){
				return $contArquivo;
			}else{
				return 'Ocorreu um erro ao abrir o arquivo';			
			}			
		}
	}