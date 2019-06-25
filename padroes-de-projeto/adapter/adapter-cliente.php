<?php
	/*O padrão Adapter permite adaptar informações a classes que não temos acessos ou que não seja viavel sual alteração
	*como por exemplo em um framework.
	Nesse caso precisamos pegar a idade do cliente mas não podemos mexer na classe cliente além do reaproveitamento de código
	*/
	
	class Adapter_Cliente{
		private $cliente;
		private $idade;
		
		public function __construct(Cliente $cliente, $idade){
			$this->cliente = $cliente;
			$this->idade = $idade;
		}
		
		public function getNome(){
			return $this->cliente->getNome();
		}
		
		public function getEmail(){
			return $this->cliente->getEmail();
		}
		
		public function getIdade(){
			return $this->idade;
		}
	}
	
	
	