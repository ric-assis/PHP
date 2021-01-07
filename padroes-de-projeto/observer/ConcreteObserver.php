<?php
    error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Observer.php";
	
	class ConcreteObserver implements Observer{
		
		public function update(Subject $produto){
			//Realiza uma ação ao ser avisado das atualizações
			echo date("H:i:s")." - Chegaram novas/novos ".$produto->getProduto()."<hr/>";  
		}
	}