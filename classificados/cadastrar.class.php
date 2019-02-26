<?php
	require_once "connect.class.php";
	
	class Cadastrar{
		private $email;
		private $senha;
		private $nome;
		private $telefone;
		//private $id = null;
		
		public function __construct($email, $senha, $nome, $telefone){
			if((isset($email) && isset($senha)) && (!empty($email) && !empty($senha))){
				$this->email = $email;				
				$this->nome = $nome;
				$this->telefone = $telefone;
				
				$pdo = Connect::getPDO();
				
				$stm = $pdo->prepare("SELECT email FROM usuario WHERE email=?");
				$stm->bindValue(1, $this->email);
				if($stm->rowCount() > 0){
					echo "<script> alert('Email já cadastrado.')</script>";
					header("refresh:1");
					exit();
				}else{										
					
					/* Gera uma senha com o algoritmo ARGON2, o campo senha porém é indicado que seja varchar(255), 
					* coast é opcional, e indica o custo ou tempo de processamento quanto mais demorado pior pra quem tenta descobrir a senha
					* , dependendo do hardware pode aumentar ou diminuir, o salt(recomendado deixar padrão) é uma string que complementa a senha
					* passada de forma a criar hash diferentes mesmo que a senha seja a mesma.
					* Tanto o salt como o cost devem ser passado por um array.
					
					$options = ["cost" => 10];
					$this->senha = password_hash($senha, PASSWORD_ARGON2I, $options);								
					
					*INFELISMENTE O SERVIDOR DE HOSPEDAGEM NAO POSSUI SUPORTE AO PASSWORD_ARGON2I
					*/
					
					$this->senha = md5($senha);
					
				}
			}
		}
		
		
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getTelefone(){
			return $this->telefone;
		}
	}
?>