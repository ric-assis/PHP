<?php
	namespace model;
	
	//error_reporting(E_ALL);
    //ini_set('display_errors',"on");
	
	class ClienteModel{
		private $nome;
		private $nascimento;
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function setNascimento($nascimento){
			$nascimento = implode("-", array_reverse(explode("/", $nascimento)));
			$this->nascimento = $nascimento;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getNascimento(){
			return $this->nascimento;
		}
		
	}