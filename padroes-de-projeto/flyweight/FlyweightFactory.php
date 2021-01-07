<?php 
	require_once "Flyweight.php";
	require_once "FlyweightConcrete.php";

	class FlyweightFactory{
		private $tiposDeArvore = array();
		
		/*
		*O ponto principal aqui a fabrica decide se cria ou se usa um objeto que está pronto,
		*antes de criar é verificado em um array se a referencia pro objeto ja existe(no caso
		*essa referencia que usamos foi a especie, poderia ser o nome etc, se a referencia(especie) 
		*não existe ele instancia o novo objeto(especie) e salva no array no final retorna o objeto 
		*para que possa ser salvo por quem chamou. E se o objeto ja existe no array ele simplesmente
		retorna esse objeto para que possa ser usado.
		*/
		public function getFlyweight($especie){					
			if(!array_key_exists($especie, $this->tiposDeArvore)){
				$arvore = new FlyweightConcrete($especie);
				
				$this->tiposDeArvore[$especie] = $arvore;
			}	
			return $this->tiposDeArvore[$especie];						
		}
		
	}