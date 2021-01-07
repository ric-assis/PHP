<?php
	require_once "strategy-imposto.php";
	
	class funcionario{
	
		function salarioLiquido($tipoFuncionario, Calcula_Imposto $calculaImposto){
			$tipoFuncionario = strtolower($tipoFuncionario);
			
			return array($tipoFuncionario, $calculaImposto->salario());
		
		/*Factory
			switch($tipoFuncionario){
			case('assistente'):
				return new Calcula_Imposto5($salarioBruto);							
				break;
			case('gerente'):
				return new Calcula_Imposto10($salarioBruto);
				break;
			case('diretor'):
				return new Calcula_Imposto15($salarioBruto);
				break;			
			default:
				echo 'Cargo não encontrado';
				break;
			}*/
		}	
	
	}