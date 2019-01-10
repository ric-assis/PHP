<?php
	require "historico.php";
	
	date_default_timezone_set("America/Sao_Paulo");

	$agencia = addslashes($_POST["agencia"]); 
	$conta = addslashes($_POST["conta"]);
	$valor = addslashes($_POST["valor"]);
		
	
	if((isset($agencia) && isset($conta) && isset($valor)) && (!empty($agencia) && !empty($conta) && !empty($valor))){
		$novo_valor = substr($valor, 2);		
		$novo_valor = str_replace(",", ".", $novo_valor);
		
		//require "connect.php";
				
		$stm = $pdo->prepare("SELECT id, titular, agencia, conta, saldo FROM contas WHERE agencia=? and conta=?");
		$stm->bindValue(1, $agencia);
		$stm->bindValue(2, $conta);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$id = $stm["id"];
			$novo_saldo = floatval($stm["saldo"]) + floatval($novo_valor);
						
			$sql = $pdo->query("UPDATE contas SET saldo='$novo_saldo' WHERE id='$id'"); 			
						
			//Procura o valor saldo e o exclui para nao passar por ajax
			if(array_key_exists("saldo", $stm)){
				unset($stm["saldo"]);
			}
						
			//Adiciona novos campos no vetor
			$stm["deposito"] = $valor;			
			$stm["data_atual"] = Date("d/m/Y");
			$stm["hora_atual"] = Date("H:i:s");
			
			//Chama a funcao do arquivo historico.php
			movimentacao($id, 1, $novo_valor, $pdo);
			
			echo json_encode($stm);
			
		}else{
			echo "Conta ou agência não encontrada.";
		}
	}else{
		echo "Agência, conta ou valor em branco.";		
	}
	
	

?>