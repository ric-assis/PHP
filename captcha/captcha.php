<?php
	session_start();
	
	header("Content-type:image/jpeg");//O arquivo php muda o tipo pra jpeg pratrabalhar com a biblioteca GD
	
	$value = $_SESSION["captcha"]; //Recebe o valor da sessão
	
	$img = imagecreate(200, 100); //Tamanho do jpg que será gerado
	
	imagecolorallocate($img, 200, 200,  200); //Define o fundo da imagem criada acima
	
	$fontColor = imagecolorallocate($img, 119, 117, 117); //Cor da font da imagem gerada acima
	
	imagettftext($img, 35, 18, 15, 90, $fontColor, "destroy/DESTROY_.TTF", $value); //Aplica os valores e define o tipo da fonte da imagem além da posição e angulo

	imagejpeg($img, null, 100); //cria a imagem do tipo jpg com o dados acima, além da qualidade ou nome caso necessário
	
	
	
?>