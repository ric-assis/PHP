<?php 
	/*
		A nomeclatura da classe DAO é o nome da tabela seguido de DAO ex: pessoaDAO, no nosso caso temos a tabela cliente
	*/
	class clienteDAO{
		private $pdo;
		
		public function __construct(Database $pdo){				
			$this->pdo = $pdo;			
		}
		
		public function listarClientes(){
			$sql = $this->pdo->getPDO()->query("SELECT * FROM cliente");
			$sql = $sql->fetchAll();
			return $sql;			
		}	
	}	
