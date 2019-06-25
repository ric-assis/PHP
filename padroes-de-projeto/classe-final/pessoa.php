<?php
	class Pessoa{
		private $nome;
		private $idade;
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function setIdade($idade){
			$this->idade = $idade;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getIdade(){
			return $this->idade;
		}
	}
	
	class Funcionario extends Pessoa{
		private $registro;
		
		public function setRegistro($registro){
			$this->registro = $registro;
		}
		
		public function getRegistro(){
			return $this->registro;
		}
	}