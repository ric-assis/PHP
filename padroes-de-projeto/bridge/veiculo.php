<?php
	require_once "abstract-veiculo.php";
	require_once "pneu.php";
	
	class Passeio extends Veiculo{		
		public function __construct(Pneu $pneu){
			parent::__construct($pneu);
		}
		
		public function getAro(){			
			$this->pneu->aroPneu();
			if($this->pneu->getPneu() == 13)
				return 'Veiculo de passeio aro '.$this->pneu->getPneu();	
			else
				return 'Tipo de pneu incompativel';					
		}	
		
	}
	
	class Caminhonete extends Veiculo{
		public function __construct(Pneu $pneu){
			parent::__construct($pneu);
		}
		
		public function getAro(){
			$this->pneu->aroPneu();
			if($this->pneu->getPneu() >= 15)			
				return 'Veiculo Caminhonete aro '.$this->pneu->getPneu();			
			else
				return 'Tipo de pneu incompativel';
		}		
	}