<?php
	require_once "facade-compra.php";
	require_once "compra.php"; 
	
	$compra = new Facade_Compra(new Aprovar_Pagamento, new Reservar_Produto, new Enviar_Produto);
	$compra->finalizarCompra('cartao', 'PAC');