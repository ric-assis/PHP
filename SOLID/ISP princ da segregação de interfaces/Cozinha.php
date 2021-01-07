<?php
	class Cozinha extends Terreno implements ICozinha{
		public function __construct(int $frente, int $fundo){
			parent::__construct($frente, $fundo);	
		}
		
		public function geladeira():string{
			return 'Geladeira adicionada';
		}
		
		public function mesaDeJantar():string{
			return 'Mesa de Jantar adicionada';
		}
		
		public function construir():string{
			if(($this->frente * $this->fundo)/3 <  60){
				return 'Sem margem para construir uma cozinha';
			}
			return $this->geladeira().'<br/>'.$this->mesaDeJantar();
		}
	}