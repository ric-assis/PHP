<?php
	namespace controller;
	use core\Controller;
	use model\ClienteModel;
	use DAO\ClienteDAO;	
	use DAO\DatabasePDO;
	
	header("Content-type: application/json, charset=UTF-8");
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	class ClienteController extends Controller{
		public function adicionar(){
			$dados = $this->getDadosDaRequisicao();
		
			$cliente = new ClienteModel();
			$cliente->setNome($dados["nome"]);
			$cliente->setNascimento($dados["nascimento"]);
			
			$clienteDAO = new ClienteDAO(DatabasePDO::conexao());			
			
			$this->retornoJson($clienteDAO->adicionarCliente($cliente));
		}
		
		public function mostrar(){
			$clienteDAO = new ClienteDAO(DatabasePDO::conexao());
			
			$listaDeClientes = array();	
			foreach($clienteDAO->listarCliente() as $chave => $cliente){
				$cliente["nascimento"] = $this->converterDataBR($cliente["nascimento"]); 
				$listaDeClientes[$chave] = $cliente;
			}				
			$this->retornoJson($listaDeClientes);	
			
		}	
		
		private function converterDataBR($data){
			return implode("/", array_reverse(explode("-", $data)));
		}
		
		public function excluir(){
			$dados = $this->getDadosDaRequisicao();
			
			$clienteDAO = new ClienteDAO(DatabasePDO::conexao());
			$this->retornoJson($clienteDAO->excluirCliente($dados["id"]));
		}
		
		public function atualizar(){			
			$dados = $this->getDadosDaRequisicao();				
			
			$clienteDAO = new ClienteDAO(DatabasePDO::conexao());
		
			$this->retornoJson($clienteDAO->atualizarCliente($dados));			
		}
		
		public function buscarCliente(){
			$id = $_GET["id"];
			$clienteDAO = new ClienteDAO(DatabasePDO::conexao());
			$this->retornoJson($clienteDAO->buscarCliente($id));
		}

	}