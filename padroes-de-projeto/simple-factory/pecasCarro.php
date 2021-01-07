<?php
	class PecasCarro implements Peca{
		private $nomePeca;
		private $codigo;
		private $valor;
		
		public function setNome($nomePeca){
			$this->nomePeca = $nomePeca;
		}
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function setValor($valor){
			$this->valor = $valor;			
		}
		
		public function getNome(){
			return $this->nomePeca;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function getValor(){
			return $this->valor;
		}
	}