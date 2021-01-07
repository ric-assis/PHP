<?php 
	
	//Classe extrissca onde tem as informacoes que variam em arvores aqui a posicao da planta
	
	class ArvorePlantada{
		private $x;
		private $y;
		
		public function __construct($x, $y){
			$this->x = $x;
			$this->y = $y;
		}
		
		public function getX(){
			return $this->x;
		}
		
		public function getY(){
			return $this->y;
		}
		
		
	}