<?php

	/*Prototype é um padrao de criacao semelhante ao abstract factory podendo ser utilizado em conjunto
	*O padrão Prototype delega o processo de clonagem para o próprio objeto que está sendo clonado. Ele
	*permite copiar objetos existentes sem fazer seu código ficar dependente de suas classes.
	*Mas a diferença básica deste padrão é a flexibilidade. Por exemplo: o cliente instancia vários 
	*protótipos, quando um deles não é mais necessário, basta removê-lo. Se é preciso adicionar novos 
	*protótipos, basta incluir a instanciação no cliente. Essa flexibilidade pode ocorrer inclusive em tempo de execução.
	*/
	
	
	abstract class CartaPrototype{
		protected $valor;
		protected $nipe;
		protected $cor;
		
		public function __construct($valor, $nipe, $cor){
			$this->valor = $valor;
			$this->nipe = $nipe;
			$this->cor = $cor;
		}
		
		abstract public function __clone();
	
		public function setValor($valor){
			$this->valor = $valor;
		}
		
		public function setNipe($nipe){
			$this->nipe = $nipe;
		}
		
		public function setCor($cor){
			$this->cor = $cor;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
		public function getNipe(){
			return $this->nipe;
		}
		
		public function getCor(){
			return $this->cor;
		}
	}