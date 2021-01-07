<?php
	require_once "PizzaComponente.php";
	require_once "Frango.php";
	require_once "Calabresa.php";
	require_once "IngredienteDecorator.php";
	require_once "Queijo.php";
	require_once "Tomate.php";
	require_once "Catupiri.php";
	
	/*Decorator é semelhante a Composite porem o mesmo trabalha somente com uma composição que
	*no nosso caso será pizza que poderá ser decorada com outros ingredientes. 
	*O Decorator é um wrapper(um envolcro) no caso pelo decorador que irá realizar alterações
	*e devolve o componente. Também funciona como uma pilha de forma recursiva assim cada decorador
	*irá receber o componente ja decorado ou não por outra classe decoradora e também adicionar sua
	*decoração. Diferente do Composite que compoe o componente com novos objetos individuais o decorador
	*altera o componente e o devolve.
	*/
		
	$pizza = new Frango();
	$pizza = new Queijo($pizza);	
		
	$pizza = new Catupiri($pizza);
	//$pizza = new Tomate($pizza);
	
	echo $pizza->getProduto()."<br/>";
	echo $pizza->getValor()."+<br/>";
	
	echo "<hr/>Total: ".$pizza->getValorTotal();
	
	
	
	
	