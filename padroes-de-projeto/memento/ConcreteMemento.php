<?php
	class ConcreteMemento extends Memento{
		/*Salva o estado do objeto*/
		public function __construct($texto){
			parent::__construct($texto);
		}
		
		public function getEstadoTextoSalvo(){
			return $this->estadoTexto;
		}
	}