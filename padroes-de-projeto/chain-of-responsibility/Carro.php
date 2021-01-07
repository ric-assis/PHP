<?php
	class Carro implements VeiculoChain{
		private $proximoVeiculo;
		
		public function proximoVeiculo(VeiculoChain $proximoVeiculo){
			$this->proximoVeiculo = $proximoVeiculo;
		}
		
		public function transporte(Carga $carga){
			if($carga->getPeso() > 700){
				$this->proximoVeiculo->transporte($carga);
			}else{
				echo "Carro";
			}
		}
	}