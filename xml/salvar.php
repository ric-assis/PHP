<?php
	//XML trabalha com GET
	$cd = $_GET["cd"];
	$album = $_GET["album"];
	
	//Tem que tomar cuidado ao criar o XML para nao dar erro no ajax
	$dados = "<?xml version='1.0' encoding='UTF-8'?>
	<album>
		<cd>$cd</cd>
		<autor>$album</autor>
	</album>";

	//$xml = new SimpleXMLElement($dados);//cria um objeto apartir do arquivo xml
	//$xml = simplexml_load_string($string); converte um xml em objeto array

	echo $dados;
?>