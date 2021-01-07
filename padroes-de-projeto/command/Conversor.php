<?php
	abstract class Conversor implements EditorCommand{
		protected $texto;
		
		public function __construct($texto){
			$this->texto = $texto;
		}
		
	}