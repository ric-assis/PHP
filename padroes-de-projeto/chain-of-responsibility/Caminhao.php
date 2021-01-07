<?php
	class Caminhao implements VeiculoChain{
		private $proximoVeiculo;
		
		public function proximoVeiculo(VeiculoChain $proximoVeiculo){
			$this->proximoVeiculo = $proximoVeiculo;
		}
		
		public function transporte(Carga $carga){
			if($carga->getPeso() > 28000){
				echo "Contrarar frete";
			}else{
				echo "Caminhão";
			}
		}
	}