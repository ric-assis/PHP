<?php 
	
	require "compra.php";
	
	/*
	*Fornecer uma interface unificada para um conjunto de interfaces em um subsistema. 
	*Facade define uma interface de nível mais alto que torna o subsistema mais fácil de ser usado.
	*Olhe o arqauivo compra. nele temos 3 classes que executam uma sequencia ainda maior. No exemplo 
	*o processo de compra que ira passar pror 3 classes. 
	*Sem o padrão Facade Aprovar_Pagamento teria que ter um acoplamento com a classe Reservar_Produto 
	*pois com a aprovacao do pagamento teremos que reservar os produtos e o mesmo ocorre com Enviar_Produto,
	*pois com a aprovacao teriamos que conhecer a forma de envio escolhida pelo cliente.
	*Agora observe a classe Facade_Compra não temos nenhum acoplamento entre as classes. A classe facade é um 
	*wraper uma embalagem.	
	*/
	
	class Facade_Compra{
		private $aprovar;
		private $enviar;
		private $reservar;
		
		public function __construct(){
			$aprovar = new Aprovar_Pagamento();
			$this->aprovar = $aprovar;
			$reservar = new Reservar_Produto();
			$this->reservar = $reservar;
			$enviar = new Enviar_Produto();
			$this->enviar = $enviar;
		}			
		
		public function finalizarCompra($metodo, $envio){
			if($this->aprovar->metodoPagamento($metodo) == 'Pagamento aprovado'){				
				echo 'PRODUTOS<br/>';
				foreach($this->reservar->listaReserva() as $produtos){
					echo $produtos.'<br/>';
				}				
				echo '<br/>'.$this->enviar->tipoEnvio($envio);
			}else{
				echo 'Pagamento não aprovado';
			}			
		}
	}