<?php	
	header("Content-type:text/html; charset=UTF-8",true);
	require_once "connect.class.php";
		
	class Cliente{
		private $id = null;
		private $nome;
		private $email;
		private $bairro;
		private $rua;
		private $numero;
		
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
			$pdo = Connect::getPDO();
			$stm = $pdo->prepare("SELECT id, email FROM cliente WHERE email=?");
			$stm->bindValue(1, $email);
			$stm->execute();
			
			if($stm->rowCount() > 0){				
				$stm = $stm->fetch(PDO::FETCH_ASSOC);
				if($stm["id"] != $this->id){				
					echo "O email já exite";
					exit();
				}else{
					$this->email = $email;					
				}
			}else{
				$this->email = $email;
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

?>