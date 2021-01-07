<?php
	class ImpostoSenior extends Imposto{	
		public function calculaImposto($salario){	
			
			$this->salario = $salario - ($salario * (10/100));
			
			return $this->getSalario();
		}			
		
	}