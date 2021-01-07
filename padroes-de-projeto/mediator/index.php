<?php
    error_reporting(E_ALL);
    ini_set('display_errors',"on");  
	
	require_once "Aviao1.php";
	require_once "Aviao2.php";
	require_once "ConcreteMediator.php";
	
	/*
	* Precisamos variar os objetos de aocordo com a necessidade, nesse caso
	*um avião so pode decolar na mesma pista apos o aviao que decolou anteriormente voltar
	*O mediator faz essa mediação notificando o proximo aviao de que a pista esta liberada
	*pelo avião anterior.
	Utilize o padrão quando você não pode reutilizar um componente em um 
	*programa diferente porque ele é muito dependente de outros componentes. Nesse
	*caso poderia ocorrer o relacionamento entre N classes de diferentes aviões causando
	*um forte acoplamento que com o mediator é resolvido pois para uma classe não se comunica
	*com outra diretamente e sim através do mediator. No caso os aviões.
	*/
				
	$aviao1 = new Aviao1();	
	
	$aviao2 = new Aviao2();
	
	$mediator = new ConcreteMediator($aviao1, $aviao2);
	
	echo $aviao1->decolar();
	echo $aviao2->decolar();
	
	
	

