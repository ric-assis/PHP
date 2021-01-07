<?php
	/*
	*A melhor forma de verificar se precisa ou não do uso de uma interface é perguntando
	*se essa classe posteriormente irá se expandir ou sofrer alterações se sim a
	*interface irá diminuir o acomplamento permitindo que a classe varie livremente
	*/
	
	interface Aprovar{
		public function metodoPagamento($metodo);
	}
	
	Interface Reservar{
		public function ListaReserva();
	}
	
	Interface Enviar{
		public function tipoEnvio($envio);		
	}