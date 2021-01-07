<?php
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	/*Define um objeto que encapsula como um conjunto de objetos interage. 
	*Prove o acoplamento fraco ao evitar que os objetos se refiram 
	*explicitamente uns aos outros, permitindo que você varie suas inteirações
	*independentemente.
	*/
	
	interface Mediator{
		public function notificar(Colleague $colega, $mensagem);
	}