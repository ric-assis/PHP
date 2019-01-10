<?php
	require "historico.php";
	
	date_default_timezone_set("America/Sao_Paulo");
	
	$agencia = addslashes($_POST["agencia"]);
	$conta = addslashes($_POST["conta"]);
	$valor = addslashes($_POST["valor"]);
	$senha = md5(addslashes($_POST["senha"]));
	
	if((isset($agencia) && isset($conta) && isset($senha)) && (!empty($agencia) && !empty($conta) && !empty($senha))){
		//require "connect.php";
		
		$valor_sac = substr($valor, 2);
		$valor_sac = str_replace(",",".", $valor_sac);
		
		$cont = 0;
		$valor_sac = preg_replace('/[^\d\.]/', '', $valor_sac, -1, $cont);
		if($cont < 0){					
			echo "Valor do saque inválido.";
			header("refresh:0;url:saque.php");
			exit;
		}
				
		$stm = $pdo->prepare("SELECT id, titular, agencia, conta, saldo FROM contas WHERE agencia=? and conta=? and senha=?");
		$stm->bindValue(1, $agencia);
		$stm->bindValue(2, $conta);
		$stm->bindValue(3, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			
			if(floatval($stm["saldo"]) >= floatval($valor_sac)){
				$id = $stm["id"];				
				$valor_saldo = floatval($stm["saldo"]) - floatval($valor_sac);
				$sql = $pdo->query("UPDATE contas SET saldo='$valor_saldo' WHERE id='$id'");
				
				$sql = $pdo->query("SELECT saldo FROM contas WHERE id='$id'");
				$sql = $sql->fetch();
								
				$stm["saque"] = $valor;
				$stm["saldo"] = $sql["saldo"];
				$stm["data_atual"] = Date("d/m/Y");
				$stm["hora_atual"] = Date("H:i:s");
				
				
				//Chama a funcao do arquivo historico.php
				movimentacao($id, 0, $valor_sac, $pdo);
				
				echo json_encode($stm);
				
			}else{
				echo "Saldo insuficiente.";
			}
			
		}else{
			echo "Conta, agência ou senha inválidos.";
		}		
	}else{
		echo "Agência, conta ou senha inválidos.";
	}
?>