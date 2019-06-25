<?php
	require_once "abstract-fabrica.php";
	
	class CarroPopular extends Fabrica_Carros{
		private $carro;
		private $ano;
		private $valor;
		
		public function __construct($carro, $ano, $valor){
			$this->carro = $carro;
			$this->ano = $ano;
			$this->valor = $valor;
		}
		
		public function mostrarCarro(){
			echo 'Carro: '.$this->carro.'<br/>';
			echo 'Ano: '.$this->ano.'<br/>';
			echo 'Valor: '.$this->valor.'<br/>';
		}
	}