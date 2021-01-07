<?php	

	class Database{		
		private static $database;	
				
		private function __construct(){}	
		
		public static function obterInstancia(){
			if(!isset(self::$database)){
				self::$database = new Database(); 
			}
				return self::$database;			
		}
		
		public function getPDO(){			
			try{
				$pdo = new PDO("mysql:dbname=cadastrooo;host=localhost", "root", "1234");
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo "Ocorreu um erro na conexão: ".$e->getMessage();
				exit();
			}
									
			return $pdo;			
		}
	}
	