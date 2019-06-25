<?php
	class clienteDAO{
		private $pdo;
		
		public function __construct(Database $database){
			$this->pdo = $database;
		}
		
		public function getCliente(){
			$sql = $this->pdo->getPDO()->query("SELECT * FROM cliente");
			if($sql->rowCount() > 0){
				$sql = $sql->fetchAll();
				return $sql;
			}else{
				return 0;
			}
		}
	}