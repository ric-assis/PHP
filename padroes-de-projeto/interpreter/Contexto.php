<?php
	/*Context do livro GOF
	*O contexto é quem recebe e mapeia os valores em array ou outro 
	* para que possam ser interpretados individualmente
	*/
	class Contexto{
		private $terminalExpressions = array();
		
		public function loockup($nome){
			if(array_key_exists($nome, $this->terminalExpressions)){
				return $this->terminalExpressions[$nome];
			}
		}
		
		public function assign(Variavel $exp, $val){
			$this->terminalExpressions[$exp->getNome()] = $val;
		}
	}