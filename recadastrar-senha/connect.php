<?php
	class Connect{
	
		private static $pdo;
		
		private function __construct(){}
		
		private function __clone(){}
		
		private function __wakeup(){}
		
		public static function getPDO(){	
			if(!isset(self::$pdo)){
				$conn = "mysql:dbname=recadastrar_senha;host=localhost";
				$user = "root";
				$pass = "1234";
				
				try{
					self::$pdo = new PDO($conn, $user, $pass);
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}catch(PDOException $e){
					echo "Erro com o banco: ".$e->getMessage();
					exit();
				}				
			}
			return self::$pdo;
		}
	}
?>