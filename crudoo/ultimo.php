<?php
	require_once "crud.cliente.class.php";
	
	$crudCliente = new CrudCliente();
	
	echo $crudCliente->ultimo();
	
?>