<?php 
	class Database{
		private $pdo = null;
		
		private function __clone(){}
		
		private function __wakeup(){}
			
		public function __construct(){		
			try{
				$this->pdo = new PDO("mysql:dbname=cadastro;host=localhost", "root", "1234");
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			}catch(PDOException $e){
				echo "Erro de conexão".$e->getMessage();
				exit();
			}
		}
		
		public function getPDO(){
			return $this->pdo;	
		}
		
	}
