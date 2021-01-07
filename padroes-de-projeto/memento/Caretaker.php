<?php
	class Caretaker{
		//Caretaker(Zeladora) armazena os varios mementos(Lembranças) e sabe quando restaura-las
		private $mementos = array();
		
		public function adicionarMemento(Memento $memento){
			array_push($this->mementos,$memento);						
		}
		
		public function getUltimoMementoSalvo(){
			try{
				if(count($this->mementos) <= 0){
					throw new Exception("Não existe alterações para desfazer<br/>");						
				}
				
				$ultimoEstadoSalvo = $this->mementos[count($this->mementos) -1];	
			 
				array_pop($this->mementos);
				
				return $ultimoEstadoSalvo;
					
			}catch(Throwable $e){
				echo $e->getMessage();
				return new ConcreteMemento("");
			}
		}
	}