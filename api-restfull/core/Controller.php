<?php
	namespace core;
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
	class Controller{
		//Pega o tipo do envio dos dados para a API
		public function getMetodo(){
			return $_SERVER['REQUEST_METHOD'];
		}
		
		public function getDadosDaRequisicao(){
			//Todos os metodos escolhidos pelo usuario retornaram igualmente um array com os dados para a API
			switch($this->getMetodo()){
				case "GET":
					return $_GET; 
					break;
				case "PUT":
				case "DELETE":
					//PUT e DELETE os dados vem como QUERY STRING, e convertemos para array
					
					parse_str(file_get_contents("php://input"), $dados);
					return (array) $dados;
					break;
				case "POST":				
					/*No POST os dados vem como JSON, e convertemos também apesar 
					de serem QUERY STRING como o put e delete*/
					$dados = json_decode(file_get_contents("php://input"));
					
					/*php?//input recebe dados brutos e completos mesmo que errados através do cabeçalho
					já os dados via	formularios que também podem ser enviados dessa forma pelo cliente vem por
					POST e não podem ser pegos pelo cabeçalho.*/
					if(is_null($dados)) $dados = $_POST;
					
					return (array) $dados;
					break;
					
			}
		}
		
		public function retornoJson($retorno){
			header("Content-type: application/JSON, charset=UTF-8");
			echo json_encode($retorno);
			exit();//Para a execução para nao ter risco de quebrar o JSON
		}
		
	}