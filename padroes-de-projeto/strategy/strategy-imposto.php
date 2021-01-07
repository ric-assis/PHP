<?php
	require_once 'interface-strategy.php';
	/*O padrão de projetos Strategi permite variar strategias independente do usuário.
	Define uma família de algoritmos, encapsular cada uma delas e torná-las intercambiáveis. 
	trategy permite que o algoritmo varie independentemente dos clientes que o utilizam.
	No nosso exemplo temos varias taxas de impostos sendo que cada uma varia de acordo com o tipo de cliente. Uma
	maneira facíl seria através de um switch ou if porém imagina se um novo imposto é preciso ou pior uma mudança 
	nos impostos. Com o uso do strategy com um novo imposto você pode criar somente uma nova strategia ou caso necessite
	alterar essa será somente na strategi necessaria.	
	*/
	
	class Calcula_Imposto5 implements Calcula_Imposto{
		private $salario;
		
		public function __construct($salario){
			$this->salario = $salario;
		}
		
		public function salario(){
			$desconto = (5 * 100)/100;
			$this->salario = intval($this->salario - $desconto);			
			return $this->salario;
		}	
	}
	
	
	
	class Calcula_Imposto10 implements Calcula_Imposto{
		private $salario;
		
		public function __construct($salario){
			$this->salario = $salario;
		}
		
		public function salario(){
			$desconto = (10 * 100)/100;
			$this->salario = intval($this->salario - $desconto);			
			return $this->salario;
		}		
	}
	
	
	
	class Calcula_Imposto15 implements Calcula_Imposto{
		private $salario;
		
		public function __construct($salario){
			$this->salario = $salario;
		}
		
		public function salario(){
			$desconto = (15 * 100)/100;
			$this->salario = intval($this->salario - $desconto);			
			return $this->salario;
		}
	}