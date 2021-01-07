<?php
	class ClienteDAO extends AbstractDAO{
								
		public function getPrimeiroReg(){
			$database = Database::obterInstancia();
			$pdo = $database->getPDO(); 
			
			$cliente = new ClienteModel();
			
			$sql = $pdo->query("SELECT * FROM cliente LIMIT 1");
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				
				$cliente->setId($sql["id"]);
				$cliente->setNome($sql["nome"]);
				$cliente->setEmail($sql["email"]);
				$cliente->setRua($sql["rua"]);
				$cliente->setBairro($sql["bairro"]);
				$cliente->setNumero($sql["numero"]);
				
				return $cliente;
			}
		}
		
		public function getUltimoReg(){
			$database = Database::obterInstancia();
			$pdo = $database->getPDO(); 
			
			$cliente = new ClienteModel();
			
			$sql = $pdo->query("SELECT * FROM cliente ORDER BY id DESC LIMIT 1");
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				
				$cliente->setId($sql["id"]);
				$cliente->setNome($sql["nome"]);
				$cliente->setEmail($sql["email"]);
				$cliente->setRua($sql["rua"]);
				$cliente->setBairro($sql["bairro"]);
				$cliente->setNumero($sql["numero"]);
				
				return $cliente;
			}			
		}
		
		public function getAnteriorReg($idAtual){
			$database = Database::obterInstancia();
			$pdo = $database->getPDO(); 
			
			$cliente = new ClienteModel();
			
			$stm = $pdo->prepare("SELECT * FROM cliente WHERE id < ? ORDER BY id DESC LIMIT 1");
			$stm->bindValue(1, $idAtual);
			$stm->execute();			
			
			if($stm->rowCount() > 0){
				$stm = $stm->Fetch(PDO::FETCH_ASSOC);
				
				$cliente->setId($stm["id"]);
				$cliente->setNome($stm["nome"]);
				$cliente->setEmail($stm["email"]);
				$cliente->setRua($stm["rua"]);
				$cliente->setBairro($stm["bairro"]);
				$cliente->setNumero($stm["numero"]);

				return $cliente;
			}
		}
		
		public function getProximoReg($idAtual){
			$database = Database::obterInstancia();
			$pdo = $database->getPDO();

			$cliente = new ClienteModel();
					
			$stm = $pdo->prepare("SELECT * FROM cliente WHERE id > ? LIMIT 1");
			$stm->bindValue(1, $idAtual);
			$stm->execute();			
			
			if($stm->rowCount() > 0){
				$stm = $stm->Fetch(PDO::FETCH_ASSOC);
				
				$cliente->setId($stm["id"]);
				$cliente->setNome($stm["nome"]);
				$cliente->setEmail($stm["email"]);
				$cliente->setRua($stm["rua"]);
				$cliente->setBairro($stm["bairro"]);
				$cliente->setNumero($stm["numero"]);			
				
				return $cliente;
			}
		}
		
		public function Salvar(Object $cliente){			
			$database = Database::obterInstancia();
			$pdo = $database->getPDO(); 
						
			if($cliente->getId() == ''){
				$stm = $pdo->prepare("INSERT INTO cliente(nome, email, rua, bairro, numero) VALUES(?, ?, ?, ?, ?)");
				$stm->bindValue(1, $cliente->getNome());
				$stm->bindValue(2, $cliente->getEmail());
				$stm->bindValue(3, $cliente->getRua());
				$stm->bindValue(4, $cliente->getBairro());
				$stm->bindValue(5, $cliente->getNumero());				
				$stm->execute();		
				
				$id = $pdo->lastInsertId();
			
				$cliente->setId($id);	
				return $cliente;
				
			}else{
				$stm = $pdo->prepare("UPDATE cliente SET nome=?, email=?, rua=?, bairro=?, numero=? WHERE id=?");
				$stm->bindValue(1, $cliente->getNome());
				$stm->bindValue(2, $cliente->getEmail());
				$stm->bindValue(3, $cliente->getRua());
				$stm->bindValue(4, $cliente->getBairro());
				$stm->bindValue(5, $cliente->getNumero());
				$stm->bindValue(6, $cliente->getId());
				$stm->execute();				
				return $cliente;
			}						
		}
			
		public function isVerificaEmail($email){
			$database = Database::obterInstancia();
			$pdo = $database->getPDO(); 
								
			$sql = $pdo->query("SELECT id FROM cliente WHERE email = '$email'");
			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}		
		
		
	}