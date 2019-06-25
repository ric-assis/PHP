<?php
	/*Nesse caso podemos ter somente uma instanci administrador. Para isso o padrão SINGLETON é a solução.
	* Ele não permite que novas instancias sejam criadas.	
	*/
	
	class Administrador{
		private static $adm;
		private $nomeAdm;
		
		private function __construct(){}
		
		private function __clone(){}
		
		private function __wakeup(){}
		
		public static function getAdm(){
			if(!isset(self::$adm)){
				self::$adm = new Administrador();
			}
			
			return self::$adm;
		}		
		
		public function setNomeAdm($nome){
			$this->nomeAdm = $nome;
		}
		
		public function getNomeAdm(){
			return $this->nomeAdm;
		}
	}		