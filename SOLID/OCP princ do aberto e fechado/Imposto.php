<?php
		
	class Imposto{		
		protected $nome;
		protected $cargo;
		protected $salario;		
		
		public function setNome(string $nome):void{
			$this->nome = $nome;
		}
		
		public function setCargo(string $cargo):void{
			$this->cargo = $cargo;
		}
		
		public function setSalario(int $salario):void{
			$this->salario = $salario;
		}
		
			
		public function getNome():string{
			return $this->nome;
		}

		public function getCargo():string{
			return $this->cargo;
		}		
		
				
		public function salarioLiquido():int{
			try{
				
				$classe = 'Imposto'.$this->cargo;
			
				return call_user_func_array([new $classe, 'calculaImposto'], [$this->salario]);
				//OU
				/*				
				$imp = new $classe();
				return $imp->calculaImposto($this->salario);
				*/
							
			}catch(Exception $e){
				echo 'Cargo não encontrado '.$e->getMessage();
			}
			
		}

		public function getSalario():int{
			return $this->salario;
		}			

	}