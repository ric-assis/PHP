<?php
	require_once "Fita.php";
	require_once "Pendrive.php";
	require_once "Cd.php";
	
	class Tocador{
		protected $state;
			
		public function __construct(State $aparelhoTocando){			
			$this->state = $aparelhoTocando;					
		}
		
		public function play(){
			$this->state = $this->state->play();			
		}
		
		public function pause(){			
			$this->state = $this->state->pause();
		}
		
		public function stop(){
			$this->state = $this->state->stop();
		}
	}