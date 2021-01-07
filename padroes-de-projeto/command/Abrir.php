<?php
	class Abrir extends EditorCommand{		
		
		public function __construct(TextoReceiver $textoReceiver){
			parent::__construct($textoReceiver);
		}		
		
		public function execute(){			
			$abrirArquivo = $this->textoReceiver->abrir();
			if($abrirArquivo !== false){
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo ABERTO\n", FILE_APPEND);				
			}else{
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Erro ao abrir Arquivo\n", FILE_APPEND);
			}		
		}		
		
	}