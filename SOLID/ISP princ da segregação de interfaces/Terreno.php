<?php
	class Terreno{
		protected $frente;
		protected $fundo;
		
		public function __construct(float $frente, float $fundo){
			$this->frente = $frente;
			$this->fundo = $fundo;
		}
		
		public function getFrente():float{
			return $this->frente;
		}
		
		public function getFundo():float{
			return $this->fundo;
		}
	}