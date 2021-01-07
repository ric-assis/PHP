<?php
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Mediator.php";
	
	
	abstract class Colleague{
		protected $mediator;
		
		public function __construct(Mediator $mediator = null){
			$this->mediator = $mediator;
		}
		
		public function setMediator(Mediator $mediator){			
			$this->mediator = $mediator;			
		}
	}