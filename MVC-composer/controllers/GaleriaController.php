<?php

	namespace controllers;
	
	use core\Controller;

	class galeriaController extends Controller{
		public function index(){
			$dados = array(
				'quant' => 5,
				'titulo' => 'Galeria'
			);
			
			$this->loadTemplate('galeria', $dados);
		}
		
		public function teste(){
			$dados = array(
				'teste' => 100,
				'titulo' => 'Teste'
			);
			
			$this->loadTemplate('teste', $dados);
		}
		
	}