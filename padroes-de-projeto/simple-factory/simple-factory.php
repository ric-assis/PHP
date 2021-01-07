<?php 

	/*O padrão SimpleFactory permite que você crie uma fabrica de classes onde não 
	* instancia a classe diretamente mas a fabrica quantas vezes necessitar.
	* No exemplo vamos criar uma fabrica da classe peças, que ira gerar objetos 
	* do tipo peças de veículos e de trator porém não sabemos qual o tipo de veiculo
	*o cliente que irá a loja tem ou qual vai querer assim deixamos a fabrica escolher
	*esse padrão postergar a criacao dos objetos.
	*/
	
	class PecasFactory{
		public function criarPecas($veiculo){
			if($veiculo == "carro"){
				return new PecasCarro();
			}else if($veiculo == "trator"){
				return new PecasTrator();
			}else{
				echo "Veiculo não encontrado";
			}
		}
	}
	
	