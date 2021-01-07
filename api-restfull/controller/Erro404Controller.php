<?php
	namespace controller;

	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	class Erro404Controller{
		public function index(){			
			return json_encode(array());			
		}
	}