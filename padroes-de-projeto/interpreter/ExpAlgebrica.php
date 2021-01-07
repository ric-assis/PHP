<?php
	/*AbstractExpression do livro GOF
	*O metodo principal interpret estará em todas as classes noTerminalExpression e TerminalExpression;
	*/
	abstract class ExpAlgebrica{
		public abstract function interpret(Contexto $contexto);
	}