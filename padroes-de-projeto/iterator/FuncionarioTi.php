<?php
	class FuncionarioTi implements Funcionario{
		protected $funcionarios = [];		
		
		public function adicionarFuncionario($nome){		
			$this->funcionarios[] = $nome;			
		}
		
		public function removerFuncionario($nome){			
			foreach($this->funcionarios as $chave => $funcionario){
				if($funcionario == $nome){
					unset($this->funcionarios[$chave]);
				}
			}				
			
			$this->funcionarios = array_values($this->funcionarios);
		}
		
		public function totalFuncionario(){			
			return count($this->funcionarios);
		}
		
		public function listaDeFuncionario(){
			return new FuncionarioTiIterator($this->funcionarios);
		}
	}