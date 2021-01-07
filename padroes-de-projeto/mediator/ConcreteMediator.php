<?php 
    error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Mediator.php";
	
	class ConcreteMediator implements Mediator{
		protected $aviao1;
		protected $aviao2;
		
		public function __construct(Aviao1 $aviao1, Aviao2 $aviao2){
			$this->aviao1 = $aviao1;			
			$this->aviao1->setMediator($this);
								
			$this->aviao2 = $aviao2;
			$this->aviao2->setMediator($this);
		}
		
		/*Os atributos da notificação sao somente para identificacao 
		da ação ou do objeto passado poderia ser um ou outro ou ambos como no exemplo*/
		public function notificar(Colleague $colega, $mensagem){		
			if(get_class($colega) == "Aviao1" && $mensagem == "Avião 1 decolou"){
				$this->aviao1->pousar();
			}
			
			if(get_class($colega) == "Aviao2" && $mensagem == "Avião 2 decolou"){
				$this->aviao2->pousar();
			}
		}
	}