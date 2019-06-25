<?php
	class UsuarioDAO{
		private $pdo;
		
		public function __construct(Database $pdo){
			$this->pdo = $pdo;
		}	
			
		public function getQuantUsuarios(){
			$sql = $this->pdo->getPDO()->query("SELECT COUNT(*) FROM usuario");
			if($sql->rowCount() > 0){				
				return $sql = $sql->fetch(); 				
			}else{
				return 0;
			}
		}			
		
	}
