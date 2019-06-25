<?php
	require_once "interface-pneu.php";
	
	//Supomos que os numeros dos aros em estoque estão cadastrados do banco
	class Pneu13 implements Pneu{
		public $aro_p;
		
		public function aroPneu(){			
			$this->aro_p = 13;			
		}	
			
		public function getPneu(){
			return $this->aro_p;			
		}
		
	}
	
	class Pneu14 implements Pneu{
		private $aro_p;
		
		public function aroPneu(){
			$this->aro_p = 14;
		}
		
		public function getPneu(){
			return $this->aro_p;
		}
	}
	
	class Pneu15 implements Pneu{
		private $aro_p;
		
		public function aroPneu(){
			$this->aro_p = 15;
		}	
			
		public function getPneu(){
			return $this->aro_p;
		}			
		
	}