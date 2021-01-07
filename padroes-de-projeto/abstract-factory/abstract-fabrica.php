<?php
	/*O padrão Fabrica Abstrata permite organizar e agrupra familias de classes ou 
	*Fornecer uma interface para criação de famílias de objetos relacionados ou 
	*dependentes sem especificar suas classes concretas.	
	*/
	
	abstract class Fabrica_Carros{
		abstract public function mostrarCarro();		
	}
	
	