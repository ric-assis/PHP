<?php
	require_once "TocadorState.php";
	
	class PenDrive implements State{
		
		public function play(){
			echo "Som ligado tocando Pen Drive";
			return $this;
		}
		
		public function pause(){
			echo "Som pausado - Pen Drive";
			return $this;
		}
		
		public function stop(){
			echo "Tocador de Pen Drive desligado trocando para CD";
			return new CD();
		}
	}