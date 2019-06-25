<?php 

	/*O padrão SimpleFactory permite que você crie uma fabrica de classes onde não 
	* instancia a classe diretamente mas a fabrica quantas vezes necessitar.
	* No exemplo vamos criar uma fabrica da classe peças, que ira gerar objetos 
	* do tipo peças de veículos.
	*/
	
	class PecasFactory{
		public function criarPecas(){
			return new Pecas();
		}
	}
	
	