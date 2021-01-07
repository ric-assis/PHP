<?php

	namespace controllers;
	
	use core\Controller;

	class Erro404Controller extends Controller{
		public function index(){
					
		   $dadosErro404 = array(            
				"titulo" => "404 Página não encontrada",            
				"mensagem" => "404 Página não encontrada"
			);
			
			$this->loadTemplate("404", $dadosErro404);        
		}
		
	}
