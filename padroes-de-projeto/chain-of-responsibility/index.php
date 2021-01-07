<?php
	require_once "Carga.php";
	require_once "VeiculoChain.php";
	require_once "Moto.php";
	require_once "Carro.php";
	require_once "Caminhao.php";
		
	/*O padrão Chain of Responsibility como o nome já diz é uma corrente de responsabilidade,
	*se um determinado objeto não consegue entregar uma resposta satisfatória ele passa o problema
	*ao proximo objeto informado. No exemplo a transportadora irá transportar diferentes cargas e peso
	*para cada peso temos um veiculo diferente e a medida que mudamos o peso ele ira mudar o veiculo, 
	*primeiro ira testar a moto como determinanos se for muito peso passa pro carro e depois pro caminhao 
	*onde se nao conseguir avisa pra contratar um frete o final sendo negativo deve ser tratado de acordo
	*com o problema.
	*/
	
	$carga1 = new Carga(500);
	
	$moto = new Moto();
	$carro = new Carro();
	$caminhao = new Caminhao();
	
	$moto->proximoVeiculo($carro);	
	$carro->proximoVeiculo($caminhao);	
	
	$moto->transporte($carga1);
	
	

	