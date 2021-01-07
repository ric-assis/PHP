<?php
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	interface Subject{
		//Ativa o observer
		public function attach(Observer $observer);
		//Desativa o observer
		public function detach(Observer $observer);
		//Notifica alteracoes no estado da classe aos observers para que ocorra o update
		public function notify();
	}