<?php
	class Texto{
		private $texto;
		private $caretaker;
		
		public function __construct($texto){
			$this->caretaker = new Caretaker();
			$this->texto = $texto;
		}
		
		public function escrever($novoTexto){					
			$this->caretaker->adicionarMemento(new ConcreteMemento($this->texto));
			$this->texto = $this->texto.$novoTexto;	
		}
		
		public function desfazer(){
			$this->texto = $this->caretaker->getUltimoMementoSalvo()->getEstadoTextoSalvo();
		}		
				
		public function mostrarTexto(){
			return $this->texto;
		}
	}