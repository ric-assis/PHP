<?php	

	class HomeController extends Controller{
		
		public function index(){						
			$clienteDAO = new ClienteDAO();	
			
			$cliente = $clienteDAO->getPrimeiroReg();
			
			/*$valor = array(
				"id" => $cliente->getId(),
				"nome" => $cliente->getNome(),
				"email" => $cliente->getEmail(),
				"bairro" => $cliente->getBairro(),
				"numero" => $cliente->getNumero(),
				"rua" => $cliente->getRua()			
			);*/
			$valor = array('cliente' => $cliente);
			
			$this->carregarView("home", $valor);		
		}
				
		public function primeiro(){		
			$clienteDAO = new ClienteDAO();	
			
			$cliente = $clienteDAO->getPrimeiroReg();
			
			$valor = array(
				"id" => $cliente->getId(),
				"nome" => $cliente->getNome(),
				"email" => $cliente->getEmail(),
				"bairro" => $cliente->getBairro(),
				"numero" => $cliente->getNumero(),
				"rua" => $cliente->getRua()			
			);
			
			echo json_encode($valor);	//Retorna pro Ajax					
		}		
		
		public function ultimo(){
			$clienteDAO = new ClienteDAO();	
			
			$cliente = $clienteDAO->getUltimoReg();
			
			$valor = array(
				"id" => $cliente->getId(),
				"nome" => $cliente->getNome(),
				"email" => $cliente->getEmail(),
				"bairro" => $cliente->getBairro(),
				"numero" => $cliente->getNumero(),
				"rua" => $cliente->getRua()			
			);
			
			echo json_encode($valor);		
		}
		
		public function proximo($id){					
			$clienteDAO = new ClienteDAO();	
											
			$cliente = $clienteDAO->getProximoReg($id);
		
			$valor = array(
				"id" => $cliente->getId(),
				"nome" => $cliente->getNome(),
				"email" => $cliente->getEmail(),
				"bairro" => $cliente->getBairro(),
				"numero" => $cliente->getNumero(),
				"rua" => $cliente->getRua()			
			);	
			
			echo json_encode($valor);			
		}
		
		public function anterior($id){				
			$clienteDAO = new ClienteDAO();	
							
			$cliente = $clienteDAO->getAnteriorReg($id);
		
			$valor = array(
				"id" => $cliente->getId(),
				"nome" => $cliente->getNome(),
				"email" => $cliente->getEmail(),
				"bairro" => $cliente->getBairro(),
				"numero" => $cliente->getNumero(),
				"rua" => $cliente->getRua()			
			);
		
			echo json_encode($valor);				
		}
		
		public function salvar($nome, $email, $rua, $bairro, $numero){
			if(isset($nome) && !empty($nome)){
				$clienteModel = new ClienteModel();
				
				$clienteDAO = new ClienteDAO();
				
				if($clienteDAO->isVerificaEmail($email)){
					echo 'Email j? cadastrado';
					exit();
				}			
				
				
				$clienteModel->setNome($nome);
				$clienteModel->setEmail($email);
				$clienteModel->setRua($rua);
				$clienteModel->setBairro($bairro);
				$clienteModel->setNumero($numero);					
				
				$cliente = $clienteDAO->salvar($clienteModel);				
			
				echo json_encode($id = $cliente->getId());				
			}
		}
	}
	
