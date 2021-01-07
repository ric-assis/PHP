<?php
	class FuncionarioTiIterator implements IteratorFuncionario{
		private $funcionarios;
		private $posicao;
		
		public function __construct($funcionarios = array()){
			$this->funcionarios = $funcionarios;			
		}
		
		public function first(){
			$this->posicao = 0;
		}		
		
		public function next(){
			$this->posicao++;
		}
		
		public function isDone(){
			return $this->posicao == count($this->funcionarios);
		}
		
		public function currentItem(){
			if($this->isDone()){
				$this->posicao =  count($this->funcionarios) - 1;				
			}else if($this->posicao < 0 || $this->posicao == null){
				$this->posicao = 0;
			}		
			return $this->funcionarios[$this->posicao];
		}
	}