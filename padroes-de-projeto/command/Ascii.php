<?php
	class Ascii extends EditorCommand{
						
		public function __construct(TextoReceiver $textoReceiver){
			parent::__construct($textoReceiver);
		}
		
		public function execute(){
			file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo convertido para ASCII\n", FILE_APPEND);
			$this->textoReceiver->converteAscii();				
		}		
		
	}