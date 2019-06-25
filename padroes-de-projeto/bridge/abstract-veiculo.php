<?php
	require_once "pneu.php";
	
	/*
	*Desacoplar uma abstração da sua implementação, de modo que as duas possam variar independentemente.
	*O padrão Bridge permite que objetos sejam usados por outros sem criar um alto acoplamento, permitindo
	*que possam variar independentemente.
	Nesse exemplo vamos ter 2 modelos de veiculos que possuem modelos de pneus difrentes porém ao passar do
	tempo poderemos aumentar tanto o numero de veiculos quanto os modelos diferentes de pneus e os mesmo devem 
	poder usar os mesmos modelos de pneus(em alguns) modelos difetentes ou até mesmo ter que criar novos modelos
	para novos veiculos.
	*/ 
	
	abstract class Veiculo{
		protected $pneu;
		
		public function __construct(Pneu $pneu){
			$this->pneu = $pneu;
		}
		
		/*public function aro(){
			$pneu->aroPneu();
		}*/
		
		abstract public function getAro();	
		
	}