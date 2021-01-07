<?php
	class Salvar extends EditorCommand{	
		public function __construct(TextoReceiver $textoReceiver){
			parent::__construct($textoReceiver);
		}		
		
		public function execute(){			
			$salvar = $this->textoReceiver->salvar();		
			
			if($salvar !== false){
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo SALVO\n", FILE_APPEND);				 
			}else{
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Erro ao SALVAR\n", FILE_APPEND);			
			}				
		}		
	}