<?php
	/*Vamos forçar que todos que usem nossas estrategias implementem o metodo salario da strategia */
	
	interface Calcula_Imposto{
		public function salario();
	}