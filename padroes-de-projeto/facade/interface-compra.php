<?php
	
	interface Aprovar{
		public function metodoPagamento($metodo);
	}
	
	Interface Reservar{
		public function ListaReserva($list);
	}
	
	Interface Enviar{
		public function tipoEnvio($envio);		
	}