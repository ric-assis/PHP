<?php
	require_once "interface-compra.php";
	
	class Aprovar_Pagamento implements Aprovar{		
		public function metodoPagamento($metodo){
			if($metodo == 'cartao' || $metodo == 'boleto'){
				return 'Pagamento aprovado';
			}
		}
	}
	
	
	class Reservar_Produto implements Reservar{
		public function listaReserva(){
			//List vem do banco
			$list = array('HD 1TB', 'MB ASus', 'Memoria DDR4 16GB');
			return $list;
		}
	}
	
	class Enviar_Produto implements Enviar{
		public function tipoEnvio($envio){
			if($envio == 'PAC')
				return 'Envio por PAC R$30.00';
			else if($envio == 'SEDEX')
				return 'Envio por SEDEX R$80.00';
			else
				echo 'Envio Invalido';
			
		}
	}		