<?php
	/*O padrão DAO permite abstrair as querys feitas no banco do restante da implementação*/
	
	class Database{
		private $pdo;
		
		private function __clone(){}	
		
		private function __wakeup(){}
		
		public function __construct(){
			try{
				$conn = "mysql:dbname=cadastro;host=localhost";
				$user = "root";
				$pass = "1234";
				$this->pdo = new PDO($conn, $user, $pass);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo "Erro no DB".$e->getMessage();
				exit();
			}			
		}
		
		public function getPDO(){
			return $this->pdo;
		}
	}