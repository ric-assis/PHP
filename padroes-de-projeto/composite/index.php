<?php
	require_once "Pedido.php";
	require_once "LancheComposite.php";
	require_once "PizzaComposite.php";
	require_once "Frango.php";
	require_once "Calabresa.php";
	require_once "Ingrediente.php";
	require_once "Queijo.php";
	require_once "Tomate.php";
	require_once "Catupiri.php";
	require_once "Refrigerante.php";
	require_once "Cola.php";
	require_once "Pepsi.php";
	
	/*O padrão composite permite criarmos novos produtos a partir de combinações de 
	*outros produtos compostos ou simples. Se olharmos o exemplo temos 3 produtos compostos  
	*Pizza, Refrigerante e Ingrediente e em cada um temos outros objetos simples coca, pepsi, calabreza
	, frango, queijo etc podemos combinar esses produto
	*ou utilizalos individualmente já que o padrão coloca todos no mesmo nivél.
	*/
	
	
	$ingredientesAdicionais1 = new Tomate("Tomate");
	$ingredientesAdicionais2 = new Queijo("Queijo");
	
	$pizzaFrango = new Frango();		
	$pizzaFrango->addIngrediente($ingredientesAdicionais1);
	$pizzaFrango->addIngrediente($ingredientesAdicionais2);
		
	$refri = new Cola("Cola-Cola");
	
	$comboLanche = new LancheComposite();	
	$comboLanche->addProdutos($pizzaFrango);	
	$comboLanche->addProdutos($refri);
	
	echo "Pedido Combo(Pizza com adicionais + refrigerante)<br/>";
	$total = 0;	
	foreach($comboLanche->getProduto() as $chave => $produto){
		echo $produto." ---------- ".$comboLanche->getValor()[$chave]."<br/>";		
		
		$total += $comboLanche->getValor()[$chave];
	}
	
	foreach($pizzaFrango->getIngredientes() as $chave => $ingrediente){
		echo $ingrediente." ---------- ".$pizzaFrango->getIngredientesValor()[$chave]."<br/>";		
		
		$total += $pizzaFrango->getIngredientesValor()[$chave];
	}
	
	echo "------------------------<br/> Total  a pagar: R$".$total."<hr/>";
	
	echo "Pedido simples(Pizza)<br/>";
	echo $pizzaFrango->getproduto()." -------- ".$pizzaFrango->getValor();
	
	
	
	echo "<hr/>Pedido combo(Pizza calabresa com 4 queijo)<br/>";
	$ingredientesAdicionais5 = new Queijo("Queijo");
	$ingredientesAdicionais6 = new Queijo("Queijo");
	$ingredientesAdicionais7 = new Queijo("Queijo");
	$ingredientesAdicionais8 = new Queijo("Queijo");
	
	$pizzaCalabresa = new Calabresa();	
	$pizzaCalabresa->addIngrediente($ingredientesAdicionais5);
	$pizzaCalabresa->addIngrediente($ingredientesAdicionais6);
	$pizzaCalabresa->addIngrediente($ingredientesAdicionais7);
	$pizzaCalabresa->addIngrediente($ingredientesAdicionais8);
			
	$comboLanche = new LancheComposite();	
	$comboLanche->addProdutos($pizzaCalabresa);
			
	$refri = new Pepsi("Pepsi");
	$comboLanche->addProdutos($refri);
	
	$total = 0;	
	foreach($comboLanche->getProduto() as $chave => $produto){
		echo $produto." ---------- ".$comboLanche->getValor()[$chave]."<br/>";	
		$total += $comboLanche->getValor()[$chave];
	}
	
	foreach($pizzaCalabresa->getIngredientes() as $chave => $ingrediente){
		echo $ingrediente." ---------- ".$pizzaCalabresa->getIngredientesValor()[$chave]."<br/>";		
		
		$total += $pizzaCalabresa->getIngredientesValor()[$chave];
	}
	
	echo "------------------------<br/> Total  a pagar: R$".$total."<hr/>";
	
	
	
	echo "Não tem refrigerante, Remover";
	$comboLanche->removeProdutos($refri);	
	echo "<hr/>";
	
	$total = 0;	
	foreach($comboLanche->getProduto() as $chave => $produto){
		echo $produto." ---------- ".$comboLanche->getValor()[$chave]."<br/>";	
		$total += $comboLanche->getValor()[$chave];
	}
	
	foreach($pizzaCalabresa->getIngredientes() as $chave => $ingrediente){
		echo $ingrediente." ---------- ".$pizzaCalabresa->getIngredientesValor()[$chave]."<br/>";		
		
		$total += $pizzaCalabresa->getIngredientesValor()[$chave];
	}
	
	echo "------------------------<br/> Total  a pagar: R$".$total."<hr/>";
	
	

	

	

	
	