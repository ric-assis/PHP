<?php 
	class ClienteModel{		
		private $id = null;
		private $nome;
		private $email;
		private $bairro;
		private $numero; 
		private $rua;
		
		public function setId($id){			
			$this->id = $id;			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setEmail($email){
			if(preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/", $email)){	
				$this->email = $email;
			}else{
				echo 'Email invalido';
				exit();
			}
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		
		public function getBairro(){
			return $this->bairro;
		}
		
		public function setRua($rua){
			$this->rua = $rua;
		}
		
		public function getRua(){
			return $this->rua;
		}
		
		public function setNumero($numero){
			$this->numero = $numero;
		}
		
		public function getNumero(){
			return $this->numero;
		}
				
	}
	
	