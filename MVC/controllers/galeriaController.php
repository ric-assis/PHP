<?php
	class galeriaController extends Controller{
		public function index(){
			$dados = array(
				'quant' => 5
			);
			
			$this->loadTemplate('galeria', $dados);
		}
		
	}