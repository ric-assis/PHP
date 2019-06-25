<?php
	/*O padrão Fabrica Abstrata permite organizar e agrupra familias de classes ou 
	*Fornecer uma interface para criação de famílias de objetos relacionados ou 
	*dependentes sem especificar suas classes concretas.
	*Vamos criar como exemplo 2 fabricas de carros uma da Fiat e outra da Ford e as 2 produzem carros populares e sedan.
	*Porém com o padrão Abstract Factory vamos agrupar os carros sedans e populares
	*/
	
	abstract class Fabrica_Carros{
		abstract public function mostrarCarro();		
	}
	
	