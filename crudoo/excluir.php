<?php
	require_once "crud.cliente.class.php";
	
	$id = addslashes($_POST["id"]);
	
	if(isset($id) && !empty($id)){
		$cliente = new CrudCliente();
		echo $cliente->excluir($id);
	}else{
		echo "Cadastro não encontrado";
	}
?>