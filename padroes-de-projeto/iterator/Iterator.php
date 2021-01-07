<?php
	/*Fornecer um meio de acessar, sequencialmente, os elementos de um 
	*objeto agregado sem expor sua representação subjacente ou seja
	*o Iterator é um padrão de projeto comportamental que permite a você 
	*percorrer elementos de uma coleção sem expor as representações dele (
	*lista, pilha, árvore, etc.)
	*A idéia do iterador é de retirar da coleção a responsabilidade de acessar 
	*e caminhar na estrutura e colocar a responsabilidade num novo objeto separado chamado um iterador.
	*Utilize o padrão para reduzir a duplicação de código de travessia em sua aplicação.
	*Utilize o Iterator quando você quer que seu código seja capaz de percorrer diferentes
	*estruturas de dados ou quando os tipos dessas estruturas são desconhecidos de antemão.
	*Ou ainda quando quiser esconder estruturas de coleções complexas do usuário
	*/
	

	interface IteratorFuncionario{
		public function first();
		
		public function next();
		
		public function isDone();
		
		public function currentItem();			
	}