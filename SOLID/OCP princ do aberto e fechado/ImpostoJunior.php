<?php
	class ImpostoJunior extends Imposto{	
		
		public function calculaImposto($salario):int{	
			
			$this->salario = $salario - ($salario * (5/100));
			
			//Retorna o proprio metodo get herdado e nao o da classe base
			return $this->getSalario();
		}
		
	}