<?php
	namespace DAO;
	use DAO\Database;
	use DAO\DatabasePDO;
	use model\ClienteModel;

	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	abstract class DAO{
		protected $database;
		
		public function __construct(Database $database){
			$this->database = $database;						
		}
		
		public abstract function adicionarCliente(ClienteModel $cliente);

		public abstract function listarCliente();

		public abstract function excluirCliente($id);

		public abstract function atualizarCliente($dados);	
		
		public abstract function buscarCliente($id);
	}