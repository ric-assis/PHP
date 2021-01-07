<?php
	/* Todas as classes são command abrir, salvar, ascii, binario
	*/
	abstract class EditorCommand{
		protected $textoReceiver;
		
		public function __construct(TextoReceiver $textoReceiver){
			$this->textoReceiver = $textoReceiver;
		}
		
		abstract public function execute();
	}