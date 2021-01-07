<?php
	/*Sem violar o encapsulamento, capturar e externalizar um estado interno de um 
	* objeto, de maneira que o objeto possa ser restaurado para este estado mais tarde.
	*/
	
	abstract class Memento{		
		protected $estadoTexto;
		
		public function __construct($texto){
			$this->estadoTexto = $texto;
		}
		
		public abstract function getEstadoTextoSalvo();
	}