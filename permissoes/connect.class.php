<?php
	class Connect{
		
		private static $pdo;
		
		private function __construct(){}
		
		//Clona um objeto
		private function __clone(){}
		
		//Recria reconexoes com o banco de dados 
		private function __wakeup(){}
		
		public static function getPDO(){
			if(!isset(self::$pdo)){
				$conn = "mysql:dbname=permissoes;host=localhost";
				$user = "root";
				$pass = "1234";
				
				try{
					self::$pdo = new PDO($conn, $user, $pass);
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Relatorio de erro, lança excessoes q podem ser capturadas no catch
				}catch(PDOException $e){
					echo "Erro na conexão: ".$e->getMessage();
					exit();
				}					
			}
			return self::$pdo;
		}
	}
?>