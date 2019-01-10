<?php
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$titulo = $_POST["titulo"];
	$msg = $_POST["mensagem"];
	$destino = $_POST["email-destino"];
	
	if((isset($email) && isset($destino) && isset($msg)) && (!empty($email) && !empty($destino) && !empty($msg))){
	
		$to = $destino;
		$from = $email;
		$title = $titulo;	
		$body = $titulo."\r\n".$msg;
		
		$header = "From:".$email."\r\n"."Reply-To:".$email."\r\n"."MIME-Version:1.1"."\r\n"."X-Mailer:PHP/".phpversion();
		
		if(filter_var($destino, FILTER_VALIDATE_EMAIL)){
			$resposta = mail($to, $title, $body ,$header); 
			if($resposta == true){
				echo "Email enviado com sucesso.";
			}else{
				echo "Email não enviado, tente mais tarde.";
			}
		}else{
			echo "Email de destino inválido";
		}
	
	}else{
		echo "Email, destino ou mensagem vazios.";
	}
?>