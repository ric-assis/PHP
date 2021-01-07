<?php 
	class homeController extends controller{		
		//As classes iram extender controller para receber os views
		//A primeira action a ser criada é a index.
		public function index(){
			//Recebe os dados do banco
			$usuario = new usuarioModel();
			//Para enviar dados dinamicos para o view passamos um array como parametro
			$dados = array(
				'quant' => $usuario->getQuantUsuario()[0],
				'nome' => 'Alonso', 
				'titulo' => 'Home'
			);
			
			//Para adicionar um template puxamos ele antes do view 
			
			//Vamos chamar o view. Como é o homeController eu chamo o view da home. Passo o nome do arquivo como parametro
			$this->loadTemplate('home', $dados);		
		}

	}