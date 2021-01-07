<?php
	/*Evitar o acoplamento do remetente de uma solicitação ao seu receptor, ao dar 
	*a mais de um objeto a oportunidade de tratar a solicitação. Encadear os objetos 
	*receptores, passando a solicitação ao longo da cadeia até que um objeto a trate.
	*O padrão pode ser exibido como uma arvore onde que através de recursão o mesmo
	*cria uma corrente verificando uma solução e repassando o problema até que alguém
	*possa resolver.
	*/

	interface VeiculoChain{		
		public function proximoVeiculo(VeiculoChain $proximoVeiculo);
		
		public function transporte(Carga $carga);
	}