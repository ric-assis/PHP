<?php
	class FuncionarioContabilidade implements Funcionario{
		protected $funcionarios = [];
		
		public function adicionarFuncionario($id, $nome){		
			$this->funcionarios[] = [$id, $nome];			
		}
		
		public function removerFuncionario($nome){			
			foreach($this->funcionarios as $chave => $funcionario){				
				if($funcionario[1] == $nome){
					unset($this->funcionarios[$chave]);
				}
			}				
			
			$this->funcionarios = array_values($this->funcionarios);
		}
		
		public function totalFuncionario(){			
			return count($this->funcionarios);
		}
		
		public function listaDeFuncionario(){
			return new FuncionarioContabilidadeIterator($this->funcionarios);
		}
	}