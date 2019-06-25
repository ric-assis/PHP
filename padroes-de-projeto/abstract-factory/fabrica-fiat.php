<?php
	require_once "carro-popular.php";
	require_once "carro-sedan.php";
	
	class FabricaFiat{
		
		public function criarCarroPopular($carro, $ano, $valor){
			return new CarroPopular($carro, $ano, $valor);
		}
		
		public function criarCarroSedan($carro, $ano, $valor){
			return new CarroSedan($carro, $ano, $valor);
		}
	}