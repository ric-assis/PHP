<?php
	//Para não gerar worning sobre o tempo de envio define um timer padrao
	date_default_timezone_set("America/Sao_paulo");
	
	//Adiciona o arquivo com a classe
	require_once "phpmailer/class.phpmailer.php";
	
	//Instancia a classe PHPMailer
	$mail = new PHPMailer;
	
	//Acentuação
	$mail->CharSet = "utf-8";
		
	//Permite o envio de email atraves de SMPT
	$mail->isSMTP();
	
	//Servidor SMTP utilizado
	$mail->Host = "smtp.gmail.com";
	
	//Ativa autenticação no SMTP
	$mail->SMTPAuth = true;
	
	//Usuario da conta SMTP
	$mail->Username = "seuemail@gmail.com";
	
	//Senha
	$mail->Password = "******";
	
	//Tipo de criptografia na conexão com o SMTP
	$mail->SMTPSecure = "ssl";
	
	//Porta do servidor SMTP
	$mail->Port = 465;
	
	//Envia imagens inseridas ao texto, o cid funciona como um id na localzacao da imagem e é necessario
	$mail->AddEmbeddedImage("cadeado.jpg", "logo", "cadeado.jpg");
		
	//Permite código html no texto enviado
	$mail->isHTML(true);
	
	//Email do remetente
	$mail->From = "seuemail@gmail.com";
	
	//Nome do remetente
	$mail->FromName = "Alonso Ricardo";
	
	//Destinatário
	$mail->AddAddress("emaildodestinatario@outlook.com");
	
	//Titulo
	$mail->Subject = "Teste com phpMailer";
	
	//Corpo do email, observe as aspas de fechamento do texto em cid apos a barra  
	$mail->Body = "<img src=\"cid:logo\" width='200px'/><h2>Teste com phpMailer</h2><hr/><br/>Testando o PHPMailer com o servidor local.<br/>ariccassis";
	
	//Confirmação do envio ou o tipo de erro ocorrido
	if($mail->Send()){
		echo "<h2>enviado com sucesso</h2>";
	}else{
		echo "<h2>Erro ao enviar</h2>".$mail->ErrorInfo();
	}
	
	/*
	*OBS: Para o envio do anexo de imagem caso a versão do php seja inferior a 6 ocorrera mensagens worning de retorno 
	*para resolver edite o arquivo class.phpmiler.php e altere nas linhas 1469 e 1475 a versão do php de 6
	*para 5 caso esteja usando a versao 5 ou anterior.
	*
    *if (PHP_VERSION < 6) { troque por 5
	*/
?>
