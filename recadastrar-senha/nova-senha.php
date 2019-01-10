<?php
	session_start();
	date_default_timezone_set("America/Sao_Paulo");//Usar o mesmo timezone
	header("Content-type:text/html; charset=utf-8",true);
	
	require_once "connect.php";
		
	$token = addslashes($_GET["token-user"]);
	
	if(isset($token) && !empty($token)){
		$pdo = Connect::getPDO();
		
		$stm = $pdo->prepare("SELECT id_usuario, tempo_limite FROM token WHERE token_hash=?");
		$stm->bindValue(1, $token);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$id_usuario = $stm["id_usuario"];
			$dateTime = $stm["tempo_limite"];
			
			$_dateTime =  explode(" ", $dateTime);
			
			$data = $_dateTime[0];
			$hora = $_dateTime[1];
			
			$hora_atual = date("H:i:s");
			$data_atual = date("Y-m-d");
			
			if(strtotime($data_atual) == strtotime($data)){//Converte as datas de string para timestamp e compara os valores				
				$intervalo = strtotime($hora_atual) - strtotime($hora);
				$intervalo = $intervalo / 3600;//1h => 60 min, 1min => 60s sendo 1h em seg = > 60 * 60 = 3600 seg, dividindo o invervalo das horas por 3600 convertemos os seg do intervalo em h 
				
				if($intervalo <= 1){
					header("location:atualizar-senha.php?id=".$id_usuario);
				}else{
					echo "token vencido.";
				}
			}else{
				echo "Token vencido.";
			}

		}else{
			echo "Token inválido.";
		}			
		
	}
	

?>