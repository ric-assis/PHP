<?php
	class Editor{
		protected $texto;
		
		public function __construct($texto){
			$this->texto = $texto;
		}
		
		public function abrir(){
			try{
				$texto = file_get_contents("texto.txt");
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function salvar(){
			try{
				file_put_contents("texto.txt", $this->texto);
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}		
		
		public function getTexto(){
			return $this->texto;
		}
		
		//Aceita o visitante
		public function accept(Visitor $visitor){
			$visitor->visitar($this);
		}
	}