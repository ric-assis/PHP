<?php
	global $router;
	$router = array();
	
	$router["/api/gravar/"] = "/cliente/adicionar";
	$router["/api/gravar"] = "/cliente/adicionar";
	$router["/api/excluir"] = "/cliente/excluir";
	$router["/api/excluir/"] = "/cliente/excluir";
	$router["/api/atualizar"] = "/cliente/atualizar";
	$router["/api/atualizar/"] = "/cliente/atualizar";
	$router["/api/"] = "/cliente/mostrar";
	$router["/api"] = "/cliente/mostrar";
	$router["/api/buscar"] = "/cliente/buscarCliente";
	$router["/api/buscar/"] = "/cliente/buscarCliente";
	
	