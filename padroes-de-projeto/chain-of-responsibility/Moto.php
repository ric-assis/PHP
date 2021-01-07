<?php
	class Moto implements VeiculoChain{
		private $proximoVeiculo;
		
		public function proximoVeiculo(VeiculoChain $proximoVeiculo){
			$this->proximoVeiculo = $proximoVeiculo;
		}
		
		public function transporte(Carga $carga){
			if($carga->getPeso() > 300){
				$this->proximoVeiculo->transporte($carga);
			}else{
				echo "Moto";
			}
		}
	}