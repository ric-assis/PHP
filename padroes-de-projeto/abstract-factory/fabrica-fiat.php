<?php
	require_once "carro-popular.php";
	require_once "carro-sedan.php";
	
	class FabricaFiat implements Fabrica_Fabricante{
		private $carroPopular = array();
		private $carroSedan = array();
			
		public function criarCarro($tipo, $carro, $ano, $valor){
			if($tipo == "popular"){
				array_push($this->carroPopular,  new CarroPopular($carro, $ano, $valor));
				return $this->carroPopular;
			}else if($tipo == "sedan"){
				array_push($this->carroSedan, new CarroSedan($carro, $ano, $valor));
				return $this->carroSedan;
			}else{
				echo "Modelo não encontrado.";
			}
		}
	}