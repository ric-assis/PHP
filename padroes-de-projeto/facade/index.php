<?php
	require_once "facade-compra.php";
		
	$compra = new Facade_Compra();
	$compra->finalizarCompra('cartao', 'PAC');