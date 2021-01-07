<?php 
	/*Classe intrissica onde ficam as propriedades semelhantes a todos os objetos
	Todas teram folhas verdes e caule amarrom porém irao ser plantadas em varios locais diferentes*/
	
	class Arvore{
		private $especie;
		
		
		public function __construct($especie){
			$this->especie = $especie;
		}	
				
		public function plantarArvore(){
			echo "Arvore da especie ".$this->especie; 
		}
	}
	