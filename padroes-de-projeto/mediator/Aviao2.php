<?php 	
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Colleague.php";	
	
	class Aviao2 extends Colleague{
		
		public function decolar(){
			echo "Avião 2 decolou da pista A001<br/>";
			$this->mediator->notificar($this, "Avião 2 decolou");
			
		}
		
		public function pousar(){
			echo "Avião 2 pousou na pista A002<br/>";
			$this->mediator->notificar($this, "Avião 2 pousou");
			
		}
		
	}