<?php
	session_start();
	date_default_timezone_set("America/Sao_Paulo");
	
	require_once "connect.php";
	require_once "enviar.php";
	
	$email = addslashes($_POST["email"]);
	
	if(isset($email) && !empty($email)){
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare("SELECT id FROM usuario WHERE email=?");
		$stm->bindValue(1, $email);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$id_usuario = $stm["id"];
			
			$dateTime = date("Y-m-d H:i:s"); 
			$hash = md5(time().rand(0,999).rand(0,999));
			/*Ao inves de pegar a hora e data que ocorreu o pedido e posteriormente pegar a data e hora atual e subtrair, o
			*$dateTime poderia receber date("Y-m-d H:i:s, strtotime("+1 hour")), assim a mesma já é armazenada com 1 hora amais 
			bastanto checar na propria query se o campo do DB tempo_limite > now()*/
						
			$sql = $pdo->query("UPDATE token SET token_usado=1, tempo_limite='$dateTime', token_hash='$hash' WHERE id_usuario=$id_usuario");
			
			$sql = $pdo->query("SELECT token_hash FROM token WHERE id_usuario=$id_usuario");
			$sql = $sql->fetch();
			$hash = $sql["token_hash"];
			enviar_email($hash, $email);	
			
		}else{
			echo "Esse email não existe.";
		}
		
	}else{
		echo "Email não informado";
	}
	
	/*
	*Apesar de criado o campo token_usado pode ser omitido já que o hash é criado na hora e nao salvo no DB, e 
	*caso seja criado um novo hash o anterior é automaticamente invalidade devido a ser susbstituido pelo
	*novo no banco e ao permitir gravar nova senha o tokem do banco é verificado antes. Também ao final do 
	*processo um novo hash é gerado e armazenado eliminando o utilizado não necessitando do campo, além
	*do que para utilizar o campo token_usado a troca de senha somente seria permitida uma vez ou então 
	*caso o tempo se esgotasse nao poderiamos gerar um novo hash pois o campo sempre seia 1
	*/
	
?>