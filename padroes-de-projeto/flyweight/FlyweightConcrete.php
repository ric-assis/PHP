<?php 
	require_once "Arvore.php";
	require_once "ArvorePlantada.php";
	require_once "Flyweight.php";
	
	class FlyweightConcrete implements Flyweight{
		/*
		Estado intrinssico são atributos da classe e extrissico são variaveis de classe ou argumentos externos.
		Estado intrinssico cria as especies de arvores onde varias arvores da mesma especie sao iguais
		Aqui vou ter a minha variavel da classe intrissica*/
		private $arvore;
		public static $cont = 0;
		
		public function __construct($especie){
			$this->arvore = new Arvore($especie);
			self::$cont++;
		}			
		
		//impemento o metodo do objeto extrinsico juntando os 2 objetos nessa classe
		public function plantarArvores(ArvorePlantada $local){
			echo $this->arvore->plantarArvore()." plantada na posição X = ".$local->getX()." e Y = ".$local->getY();			
		}
	}