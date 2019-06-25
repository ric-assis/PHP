<?php
	require_once "dao/database.php";
	require_once "dao/usuarioDAO.php";
	
	class Usuario{
		private $usuarioDAO; 
		
		public function __construct(){
			$this->usuarioDAO = new UsuarioDAO(new Database);
		}
		
		function getQuantUsuario(){			
			return $quantUsuario = $this->usuarioDAO->getQuantUsuarios();
		}
	}