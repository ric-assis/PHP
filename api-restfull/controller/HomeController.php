<?php
	namespace controller;
	use core\Controller;
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	class HomeController extends Controller{
		public function index(){
			//print_r($this->getDadosDaRequisicao());
		}			
		
	}