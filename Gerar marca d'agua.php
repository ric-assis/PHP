<?php
	//Vamos editar a imagem horiginal adicionando como marca d'agua a nossa mini imagem
	
	//Pegamos a imagem
	$image = "pc.jpg"; 
	$image_min = "min_imagem.jpg";
	//Pegamos as dimensoes da imagem
	list($width_original, $height_original) = getimagesize($image);//Podderia usar direto o nome do arquivo
	list($width_min, $height_min) = getimagesize($image_min);
	//Criamos a imagem vazia
	$image_end = imagecreatetruecolor($width_original, $height_original);
	
	//Criamos a imagem original e a miniatura a partir dde nossas imagens
	$image_original = imagecreatefromjpeg("pc.jpg");
	$image_min = imagecreatefromjpeg("min_imagem.jpg");
	
	//Vamos copiar a imagem original para a nossa image_end vazia
	imagecopy($image_end, $image_original, 0, 0, 0, 0, $width_original, $height_original);
	//Vamos copiar a imagem mini em cima da final no canto inferior ddireito para isso ddefinimos o local a colar como o tamanho meno o tamanho da min
	imagecopy($image_end, $image_min, ($width_original - $width_min), ($height_original - $height_min), 0, 0, $width_min, $height_min);
	
	header("Content-Type:image/jpeg");
	imagejpeg($image_end, "imagem-com-marca-dagua.jpg", 70);
	
	header("Content-Type:text/html; charset=UTF-8");
?>
	<!Doctype html>
	<html>
		<body>
			<image src="imagem-com-marca-dagua.jpg"/>
		</body>
		
	</html>