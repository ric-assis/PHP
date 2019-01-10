<?php
	require_once "connect.class.php";	
	
	class CrudCliente{
		
		function salvar($obj){		
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("INSERT INTO cliente(nome, email, rua, bairro, numero) VALUES(?, ?, ?, ?, ?)");
			$stm->bindValue(1, $obj->getNome());
			$stm->bindValue(2, $obj->getEmail());
			$stm->bindValue(3, $obj->getRua());
			$stm->bindValue(4, $obj->getBairro());
			$stm->bindValue(5, $obj->getNumero());
			$stm->execute();
			
			return  $pdo->lastInsertId();		
		}
		
		function excluir($id){
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("DELETE FROM cliente WHERE id=?");
			$stm->bindValue(1, $id);
			$stm->execute();
			
			if($stm->rowCount() > 0){
				return $id;
			}else{
				echo "Erro ao pegar registro no banco";
			}			
		}
		
		function atualizar($obj){
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("UPDATE cliente SET nome=?, email=?, rua=?, bairro=?, numero=? WHERE id=?");
			$stm->bindValue(1, $obj->getNome());
			$stm->bindValue(2, $obj->getEmail());
			$stm->bindValue(3, $obj->getRua());
			$stm->bindValue(4, $obj->getBairro());
			$stm->bindValue(5, $obj->getNumero());
			$stm->bindValue(6, $obj->getId());
			$stm->execute();
			
			return  $obj->getId();			
		}
		
		function primeiro(){
			$pdo = Connect::getPDO();
			
			$sql = $pdo->query("SELECT * FROM cliente LIMIT 1");
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				return json_encode($sql);
			}else{
				echo "Erro ao pegar registro no banco";
			}
			
		}
		
		function anterior($id){
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("SELECT * FROM cliente  WHERE id < ? ORDER BY id DESC LIMIT 1"); 
			$stm->bindValue(1, $id);
			$stm->execute();
			if($stm->rowCount() > 0){
				$stm = $stm->fetch(PDO::FETCH_ASSOC);
				return json_encode($stm);				
			}else{
				echo "Erro ao pegar registro no banco";
			}
		}		
		
		function proximo($id){
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("SELECT * FROM cliente WHERE id > ? LIMIT 1");
			$stm->bindValue(1, $id);
			$stm->execute();
			if($stm->rowCount() > 0){
				$stm = $stm->fetch(PDO::FETCH_ASSOC);
				return json_encode($stm);
			}else{
				echo "Erro ao pegar registro no banco";
			}
		}
		
		
		function ultimo(){
			$pdo = Connect::getPDO();

			$sql = $pdo->query("SELECT * FROM cliente ORDER BY id DESC LIMIT 1");
			if($sql->rowCount() > 0){
				$sql = $sql->fetch();
				return json_encode($sql);
			}else{
				echo "Erro ao pegar registro no banco";
			}			
		}	
	
	}
	
?>