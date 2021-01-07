<?php 
	class Casa extends Terreno implements IQuarto, ICozinha{
		
		public function __construct(int $frente, int $fundo){
			parent::__construct($frente, $fundo);	
		}
		
		public function geladeira(){
			return 'Geladeira adicionada';
		}
		
		public function mesaDeJantar(){
			return 'Mesa de Jantar adicionada';
		}
		
		public function cama(){
			return 'Cama adicionada';
		}
		
		public function escrivaninha(){
			return 'Escrivaninha adicionada';
		}	
		
		public function construirCozinha():string{
			if(($this->frente * $this->fundo)/3 <  60){				
				return 'Sem margem para construir uma cozinha';
			}
			return $this->geladeira().'<br/>'.$this->mesaDeJantar();
		}
		
		public function construirQuarto():string{
			if(($this->frente * $this->fundo)/4 < 40){
				return 'Sem margem para construir um quarto';
			}
			
			return $this->cama().'<br/>'.$this->escrivaninha();
		}
		
		public function construirCasa():array{
			$medidas = array(
				'quarto' => $this->construirQuarto(),
				'cozinha' => $this->construirCozinha()
			);
			
			return $medidas;			
		}	
		
	}