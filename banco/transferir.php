<?php
	require "historico.php";
	//session_start();
	
	date_default_timezone_set("America/Sao_Paulo");
	
	$agencia = addslashes($_POST["agencia"]);
	$conta = addslashes($_POST["conta"]);
	$senha = md5(addslashes($_POST["senha"]));
	$valor = addslashes($_POST["valor"]);
	$ag_beneficiado = addslashes($_POST["ag_beneficiado"]);
	$ct_beneficiado = addslashes($_POST["ct_beneficiado"]);
	
	$id = $_SESSION["id"];
	
	if((isset($agencia) && isset($conta) && isset($senha)) && (!empty($agencia) && !empty($conta) && !empty($senha))){
		//require "connect.php";
				
		$valor_trans = substr($valor, 3);
		$valor_trans = str_replace(",", ".", $valor_trans);
		
		$cont = 0;
		$valor_trans = preg_replace('/[^\d\.]/', '', $valor_trans, -1, $cont);		
		if($cont > 0){
			echo "Valor da transferência inválido.";
			header("refresh:0;transferencia.php");
			exit;
		}
		
		$stm = $pdo->prepare("SELECT id, titular, agencia, conta, saldo FROM contas WHERE agencia=? and conta=? and senha=?");
		$stm->bindValue(1, $agencia);
		$stm->bindValue(2, $conta);
		$stm->bindValue(3, $senha);
		$stm->execute();
		
		if(($stm->rowCount()) > 0){
			$conta_depositario = $stm->fetch(PDO::FETCH_ASSOC);
			
			if($id == $conta_depositario["id"]){			
					$stm = null;
					$stm = $pdo->prepare("SELECT id, titular, agencia, conta, saldo FROM contas WHERE agencia=? and conta=?");
					$stm->bindValue(1, $ag_beneficiado);
					$stm->bindValue(2, $ct_beneficiado);
					$stm->execute();
					
					if($stm->rowCount() > 0){
						$conta_beneficiario = $stm->fetch(PDO::FETCH_ASSOC);
						
						$id_dep = $conta_depositario["id"];			
					
						if(floatval($conta_depositario["saldo"]) >=  floatval($valor_trans)){
							$saldo_transferido = floatval($conta_depositario["saldo"]) - floatval($valor_trans); 				
							$sql = $pdo->query("UPDATE contas SET saldo='$saldo_transferido' WHERE id='$id_dep'");			
						}else{
							echo "Saldo insuficiente.";
						}
						
						$sql = null;
						$id_ben = $conta_beneficiario["id"];
						$saldo_beneficiario = floatval($conta_beneficiario["saldo"]) + floatval($valor_trans); 
						$sql = $pdo->query("UPDATE contas SET saldo='$saldo_beneficiario' WHERE id='$id_ben'");
						
						//procura a o saldo do beneficiario pela chave e o exclui
						if(array_key_exists("saldo", $conta_beneficiario)){				
							unset($conta_beneficiario["saldo"]);
						}
						
						
						$sql = null;
						
						$saldo_atualizado_dep = $pdo->query("SELECT saldo FROM contas WHERE id='$id_dep'"); 
						$saldo_atualizado_dep = $saldo_atualizado_dep->fetch();
														
						
						$extrato = array("depositario" => $conta_depositario, "beneficiario" => $conta_beneficiario);				
						$extrato["data_atual"] = Date("d/m/Y");
						$extrato["hora_atual"] = Date("H:i:s");
						$extrato["valor_transferido"] = $valor;
						//Reescreve no vetor o saldo atualizado				
						$extrato["depositario"]["saldo"] = $saldo_atualizado_dep["saldo"];		
						
						//Chama a funcao do arquivo historico e passa a retirada da conta do depositario.php
						movimentacao($id_dep, 2, $valor_trans, $pdo);
						
						//Chama a funcao do arquivo historico e passa o valor depositado no beneficiario.php
						movimentacao($id_ben, 1, $valor_trans, $pdo);
						
						echo json_encode($extrato);
					
					}else{
						echo "Conta para transferência inválida.";				
					}	
			}else{
				echo "Você não é o titular da conta indicada, insira a agência e a sua conta.";
			}
						
		}else{
			echo "Conta, Agência ou senha inválidas.";
		}
	}
?>