<?php
	
	$filename = "pc.jpg";
	
	//Esses nao sao o tamanho da imagem e sim o maximo
	$width = "200";
	$height = "200";
	
	//Vamos pegar o tamanho da imagem e armazenar em um  vetor
	list($width_original, $height_original) = getimagesize($filename);
	
	//Calcular a proporcao da magem
	$ratio = $width_original / $height_original;
	
	if($width/$height > $ratio){
		$width = $height * $ratio;
	}else{
		$height = $width / $ratio;
	}
	
	//Vamos criar uma imagem vazia
	$image = imagecreatetruecolor($width, $height);
	//Vamos pegar a imagem original
	$image_original = imagecreatefromjpeg($filename);
	
	imagecopyresampled($image, $image_original, 0, 0, 0, 0, $width, $height, $width_original, $height_original);
	/*1 parametro imagem final, 2 imagem original, os 2 proximos a posicao da imagem x e y, 2 proximos posicao a ser pega na imagem original, 
	agora o novo tamanho e o tamanho original $width, $height, $width_original, height_original, */
	
	//imagecopyresized poderia ser usada ao inves de imagecopysampled A resize somente diminui e a imagem fica mais pixalizada o sempled vai organizando os pixels
	
	//Para que o php entenda que isso será uma imagem precisamos mudar o tipo do nosso arquivo php para imagem isso é feito no cabeçalho 
	header("Content-Type: image/jpeg");
	
	/*Vamos exibir na tela, se fossemos salvar ao inves de null colocariamos o diretório pra salvar a imagem, os 70 é a qualidade q pode ir ate 100 mas geralmente
	se usa 70, essa propriedade so se usa no jpeg se fosse png por exemplo nao precisaria*/
	//imagejpeg($image, null, 70);
	
	//Para salvar
	imagejpeg($image, "min_imagem.jpg", 70);
	
	//Volta o arquivo para php ou texto
	header("content-Type:text-html; charset=UTF-8", true);	
	
?>
	<!Doctype html>
	<html>
		<body>
			<image src="min_imagem.jpg"/>
		</body>
		
	</html>