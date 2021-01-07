<?php 
    error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Colleague.php";	
	
	class Aviao1 extends Colleague{
		
		public function decolar(){
			echo "Avião 1 decolou da pista A001<br/>";
			$this->mediator->notificar($this, "Avião 1 decolou");			
		}
		
		public function pousar(){
			echo "Avião 1 pousou na pista A002<br/>";
			$this->mediator->notificar($this, "Avião 1 pousou");
			
		}
		
	}