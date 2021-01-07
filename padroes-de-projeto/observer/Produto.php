<?php
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Subject.php";
	
	class Produto implements Subject{
		private $produto;
		public $saidaProduto;
		
		private $observers = array();						
		
		public function __construct($produtoNovo){
			$this->produto = $produtoNovo;
		}
				
		public function attach(Observer $obs){
			$this->observers[] = $obs; 
		}
		
		public function detach(Observer $obs){
			foreach($this->observers as $key => $observer){
				if($observer === $obs){
					unset($this->observers[$key]);
				}
			}
		}
		
		public function notify(){
			foreach($this->observers as $observer){
				$observer->update($this);
			}
		}
		
		public function setProduto($produto){
			$this->produto = $produto;
			
			$this->notify();
		}
		
		public function getProduto(){
			return $this->produto;			
			
		}		
	}