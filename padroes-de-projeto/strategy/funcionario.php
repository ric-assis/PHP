<?php
	require_once "strategy-imposto.php";
	
	class funcionario{
	
		function salarioLiquido($tipoFuncionario, $salarioBruto){
			$tipoFuncionario = strtolower($tipoFuncionario);
			switch($tipoFuncionario){
			case('assistente'):
				$assistente = new Calcula_Imposto5($salarioBruto);
				return $assistente->salario($salarioBruto);				
				break;
			case('gerente'):
				$gerente = new Calcula_Imposto10($salarioBruto);			
				return $gerente->salario($salarioBruto);			
				break;
			case('diretor'):
				$diretor = new Calcula_Imposto15($salarioBruto);			
				return $diretor->salario($salarioBruto);				
				break;			
			default:
				echo 'Cargo não encontrado';
				break;
			}
		}	
	
	}