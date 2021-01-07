<?php
	/*Essa classe pertence a uma API ou outra empresa e não pode ser alterada 
	*seus atributos sao privados e o unico acesso é pelo metodo getDonload porém
	*precisamos verificar uma senha do DB antes de baixar além de um log.*/
	
	class ConcreteDownload{		
		private $url = "arquivo.rar";
		
		public function getDownload(){				
			return $this->url;
		}
	}