<?php
	namespace DAO;
	use DAO\Database;
	use PDO;
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	class DatabasePDO implements Database{
		private static $pdo;		
		
		public function __construct(){}
		
		public function __clone(){}
		
		public static function conexao(){
			if(!isset(self::$pdo)){
				self::$pdo = new DatabasePDO();
			}
			return self::$pdo;			
		}
		
		public function getConexao(){
			try{
				$pdo = new PDO('mysql:dbname=crud_api;host=localhost', 'root', '1234');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;				
			}catch(PDOException $e){
				echo "Ocorreu um erro na conexão: ".$e->getMessage();
				exit();
			}
		}
	}