<?php
	class Quarto Extends Terreno implements IQuarto{
		public function __construct(int $frente, int $fundo){
			parent::__construct($frente, $fundo);	
		}
		
		public function cama():string{
			return 'Cama adicionada';
		}
		
		public function escrivaninha():string{
			return 'Escrivaninha adicionada';
		}	
		
		public function construir():string{
			if(($this->frente * $this->fundo)/4 < 40){
				return 'Sem margem para construir um quarto';
			}
			
			return $this->cama().'<br/>'.$this->escrivaninha();
		}

		
	}