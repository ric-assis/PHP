<?php
	class Connect{
		/*Padrão sington*/
		private static $pdo;
		
		//contrutor private impede a instanciacao
		private function __construct(){}
		
		//inpede clone da classe
		private function  __clone(){}
		
		//inpede utilizacao de unserialize
		private function __wakeup(){}
		
		public static function getPDO(){
			if(!isset(self::$pdo)){//isset retorna true se existe e false se nao sendo, se nego fica se variavel nao existe ou  se false
				$conn = "mysql:dbname=cadastrooo;host=localhost";
				$user = "root";
				$pass = "1234";
				
				try{
					self::$pdo = new PDO($conn, $user, $pass);//O self é igual o this mas para variaveis e metodo staticos
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
				}catch(PDOException $e){
					echo "Erro na conexão". $e->getMessage();
					exit();
				}					
			}
			return self::$pdo;						
		}
	}
?>
