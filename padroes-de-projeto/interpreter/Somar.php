<?php
	/*Classe NoTerminalExpression do livro GOF
	*Cada nova operação realizada em cima dos valores interpretados serão feitas através de objetos
	*relativos a ação. Aqui somando os valores interpretados
	*/
	class Somar extends ExpAlgebrica{
		protected $operando1;
		protected $operando2;
		
		public function __construct(ExpAlgebrica $exp1, ExpAlgebrica $exp2){
			$this->operando1 = $exp1;
			$this->operando2 = $exp2;
		}
		
		public function interpret(Contexto $contexto){
			return $this->operando1->interpret($contexto) + $this->operando2->interpret($contexto);
		}
	}