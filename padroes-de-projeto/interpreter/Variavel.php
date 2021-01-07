<?php
	/*Classe terminalExpression do livro GOF
	*A classe irá substituir o nome da variavel x, y, z, a pelo seu real valor
	*através do seu metodo interpret para que possa ser usado para outras ações
	*de outras classes, ou seja ela interpreta a letra e traduz essa letra da variavel para o seu valor
	*/
	class Variavel extends ExpAlgebrica{
		private $nome;
		
		public function __construct($nome){
			$this->nome = $nome;
		}
		
		public function interpret(Contexto $contexto){
			return $contexto->loockup($this->nome);
		}
		
		public function getNome(){
			return $this->nome;
		}
	}