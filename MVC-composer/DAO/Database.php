<?php
	namespace DAO;
	
	use PDO;
	
	class Database{
		private $pdo = null;
		
		public function __construct(){
			try{
				$this->pdo = new PDO("mysql:dbname=mvc;host=localhost", "root", "1234");
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				
			}catch(PDOException $e){
				echo "Erro na conexão".$e->getMessage();
			}
		}
		
		public function getPDO(){
			return $this->pdo;	
		}		
	}