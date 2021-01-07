<?php 
	class Controller{		
		
		public function carregarView($viewNome, $viewDados = array()){
			require 'views/template.php';
		}
		
		public function carregarViewNoTemplate($viewNome, $viewDados = array()){			
			extract($viewDados);
					
			require 'views/'.$viewNome.'.php';
		}
	}