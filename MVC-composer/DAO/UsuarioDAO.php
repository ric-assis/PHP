<?php
	namespace DAO;
	
	use DAO\Database;
	
	class UsuarioDAO{
		private $pdo;
		
		public function __construct(database $pdo){
			$this->pdo = $pdo;
		}	
		
		public function getQuantUsuarios(){
			$sql = $this->pdo->getPDO()->query("SELECT COUNT(*) AS quant FROM usuario");
			if($sql->rowCount() > 0){				
				$sql = $sql->fetch(); 				
				return $sql['quant'];
			}else{
				return 0;
			}
		}			
		
	}
