<?php 

	namespace controllers;
	
	use core\Controller;
	use models\UsuarioModel;
	use DAO\Database;
	use DAO\UsuarioDao;
	

	class homeController extends Controller{		
		//As classes iram extender controller para receber os views
		//A primeira action a ser criada é a index.
		public function index(){
			$usuarioDAO = new UsuarioDAO(new Database());
			
			//Para enviar dados dinamicos para o view passamos um array como parametro
			$dados = array(
				'quant' => $usuarioDAO->getQuantUsuarios(),
				'nome' => 'Alonso', 
				'titulo' => 'Home'
			);
			
			//Para adicionar um template puxamos ele antes do view 
			
			//Vamos chamar o view. Como é o homeController eu chamo o view da home. Passo o nome do arquivo como parametro
			$this->loadTemplate('home', $dados);		
		}

	}