<?php
	class Director{
		public function build(Builder $builder, $texto){
			$builder->criar($texto);
			
			$builder->getTexto();
			
			return $builder->getConversor();
		}
	}