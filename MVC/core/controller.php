<?php
	/*Essa classe irá carregar os dados no view, e viewName seja um ajudador que ira ajudar a transmitir esses dados*/
	class Controller{		
		
		//Ele ira dar o require no arquvo indicado pelo homecontroller que é uma classe filha de controller herdando loadView
		public function loadTemplate($viewName, $viewData = array()){
			require 'views/template.php'; 
		}	
			
		public function loadViewInTenplate(	$viewName, $viewData = array()){
			extract($viewData);
			require 'views/'.$viewName.'.php';
		}
	}