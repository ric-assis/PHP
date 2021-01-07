<?php
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	/*
	*Define uma dependencia de um-para-muitos entre objetos de modo que quando um objeto muda
	*de estado todos os seus dependentes sao automaticamente notificados e atualizados
	*/
	
	interface Observer{
		public function update(Subject $Produto);
	}