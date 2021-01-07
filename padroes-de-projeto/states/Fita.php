<?php
	require_once "TocadorState.php";
	
	class FitaK7 implements State{
		
		public function play(){
			echo "Som ligado tocando fita k7";
			return $this;
		}
		
		public function pause(){
			echo "Som pausado - fita k7";
			return $this;
		}
		
		public function stop(){
			echo "Tocador de fita k7 desligado trocando para Pen Drive";
			return new PenDrive();
		}
	}