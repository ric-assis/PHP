<?php
	/*A classe Invoker é responsavel por executar os metodos nas classes evitando acoplamento
	*/
	class Invoker{
		
		public function __construct(EditorCommand $ec){
			$ec->execute();
		}	
		
	}