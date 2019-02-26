<?php
	require_once "connect.class.php";	
	
	class Login{
		private $email = null;
		private $senha = null;		
		private $id = null;
		
		public function __construct($email, $senha){
			if((isset($email) && !empty($email)) && (isset($senha) && !empty($senha))){
								
				$pdo = Connect::getPDO();
				$senha = md5($senha);
				
				$stm = $pdo->prepare("SELECT id, email, senha FROM usuario WHERE email=? AND senha=? ");
				$stm->bindValue(1, $email);
				$stm->bindValue(2, $senha);
				$stm->execute();
				
				if($stm->rowCount() > 0){
					$stm = $stm->fetch(PDO::FETCH_ASSOC);
					
					/*if(password_verify($senha, $stm["senha"])){
						$this->id = $stm["id"];
						$this->email = $stm["email"];
						$this->senha = $stm["senha"];
					}					
					*INFELISMENTE O SERVIDOR DE HOSPEDAGEM NAO POSSUI SUPORTE AO PASSWORD_ARGON2I	*/					
					
					$this->id = $stm["id"];
					$this->email = $stm["email"];
					$this->senha = $stm["senha"];
					
				}				
			}
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function getLogin(){
			return $this->id;
		}
		
	}
	
?>