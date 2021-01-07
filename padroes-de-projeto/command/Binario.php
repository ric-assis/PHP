<?php
	class Binario extends EditorCommand{		
		
		public function __construct(TextoReceiver $texto){
			parent::__construct($texto);			
		}
				
		public function execute(){	
			file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo convertido para BINARIO\n", FILE_APPEND);
			$this->textoReceiver->converteBinario();
		}		
		
	}