<?php 
	namespace DAO;
	use model\ClienteModel;	
	use DAO\DAO;
	use PDO;
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');

	
	class ClienteDAO extends DAO{
				
		public function __construct(Database $database){
			parent::__construct($database);
		}
		
		public function adicionarCliente(ClienteModel $cliente){			
			try{
				$stmt = $this->database->getConexao()->prepare("INSERT INTO cliente(nome, nascimento) VALUES(?, ?)");
				
				$stmt->bindValue(1, $cliente->getNome());
				$stmt->bindValue(2, $cliente->getNascimento());			
				$stmt->execute();
				
				return array("id" => $this->verificaCadastro($cliente->getNome()));
			}catch(PDOException $e){
				return array("error" => $e->getMessage());
			}
		}
						
		public function listarCliente(){
			try{
				$stmt = $this->database->getConexao()->prepare("SELECT * FROM cliente");
				$stmt->execute();
				
				if($stmt->rowCount()>0){
					return $stmt->fetchAll(PDO::FETCH_ASSOC);			
				}
				return array();
			}catch(PDOException $e){
				return array("error" => $e->getMessage());
			}
		}
		
		public function excluirCliente($id){
			try{
				$stmt = $this->database->getConexao()->prepare("DELETE FROM cliente WHERE id = ?");
				$stmt->bindValue(1, $id);
				$stmt->execute();
								
				return array("id" => $this->verificaCadastro(null, $id));
				
			}catch(PDOException $e){
				return array("error" => $e->getMessage());
			}
		}
		
		public function atualizarCliente($dados){				
			try{
				extract($dados);				
				$stmt = $this->database->getConexao()->prepare("UPDATE cliente SET nome = ?, nascimento = ? WHERE id = ?");
				$stmt->bindValue(1, $nome);
				$stmt->bindValue(2, $nascimento);
				$stmt->bindValue(3, $id);
				$stmt->execute();
				
				return array("id" => $this->verificaCadastro(null, $id));
			}catch(PDOException $e){
				return array("error" => $e->getMessage());			
			}
		}
		
		public function buscarCliente($id){
			try{
				$stmt = $this->database->getConexao()->prepare("SELECT * FROM cliente WHERE id = ?");
				$stmt->bindValue(1, $id);
				$stmt->execute();
				
				if($stmt->rowCount()>0){
					return $stmt->fetch(PDO::FETCH_ASSOC);			
				}
				return array();
			}catch(PDOException $e){
				return array("error" => $e->getMessage());
			}
		}
		
		private function verificaCadastro($nome = null, $id = null){
			if($nome != null){
				$q = $this->database->getConexao()->query("SELECT id, nome FROM cliente ORDER BY id DESC LIMIT 1");			
			}else if($id != null){
				$q = $this->database->getConexao()->query("SELECT id, nome FROM cliente WHERE id = $id LIMIT 1");			
			}
						
			if($q->rowCount() > 0){	
				$q  = $q->fetch();				
			}else{
				return 0;
			}
			
			if($nome == $q["nome"] || $id == $q["id"]){
				return $q["id"];
			}else{
				return 0;
			}
		}
	}