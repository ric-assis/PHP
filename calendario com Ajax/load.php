<?php

	include "calendario.class.php";
	header("Content-type:text/html;charset=utf-8");
	date_default_timezone_set("America/Sao_Paulo");
		
	if(isset($_GET["mes"]) && isset($_GET["ano"])){
		$mes =$_GET["mes"];
		$ano =$_GET["ano"];			
	}else{			
		$ano = date("Y");
		$mes = date("m");
	}
	
	$calendario = new Calendario($ano, $mes);

	echo $calendario->getCalendario();

?>

