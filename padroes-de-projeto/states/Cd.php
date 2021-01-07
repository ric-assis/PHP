<?php
	require_once "TocadorState.php";
	
	class CD implements State{
		
		public function play(){
			echo "Som ligado tocando CD";
			return $this;
		}
		
		public function pause(){
			echo "Som pausado - CD";
			return $this;
		}
		
		public function stop(){
			echo "Tocador de CD desligado trocando para fita k7";
			return new FitaK7();
		}
	}