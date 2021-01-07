<?php
	namespace DAO;

	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	Interface Database{
		public static function conexao();
		
		public function getConexao();
	}