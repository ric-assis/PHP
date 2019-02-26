<?php 

	function gd_img($nome_img){
		//Como é aceito tanto arquivos jpeg como png pegaremos a extensão do arquivo que será redimensionado para nao dar erro
		$name_f = explode(".", $nome_img);
		$ext = end($name_f);
		
		//Vamos marcar nossa fotos com uma marca d'agua.
		$marcaDagua = "imagens/marcadagua.png";
		
		
		//Esses nao sao o tamanho da imagem e sim o maximo
		$altura = "400";
		$largura = "400";
		
		//Vamos pegar o tamanho da imagem e armazenar em um  vetor
		list($largura_orig, $altura_orig) = getimagesize($nome_img);
		list($largura_md_orig, $altura_md_orig) = getimagesize($marcaDagua);
		
		//Calcular a proporcao da magem
		$ratio = $largura_orig/$altura_orig;
		
		if(($largura/$altura) > $ratio){
			$largura = $altura * $ratio;				
		}else{
			$altura = $largura / $ratio;	
		}
		
		//Vamos criar uma imagem vazia
		$imagem = imagecreatetruecolor($largura, $altura);
		
		
		if($ext == "png"){		
			try{
				//Vamos criar uma nova imagem apartir da original, com a mesma extensão para nao causar erro
				$imagem_orig = imagecreatefrompng($nome_img);
			}catch(Exception $e){
				echo '<script>alert("Erro no tipo da imagem. Salve-a novamente em um software de imagens ou utilize outra.");
					window.location.href="cadastrar_produto.php"</script>';				
			}
		}else{
			try{			
				$imagem_orig = imagecreatefromjpeg($nome_img);
			}catch(Exception $e){
				echo '<script>alert("Erro no tipo da imagem. Salve-a novamente em um software de imagens ou utilize outra.");
					window.location.href="cadastrar_produto.php"</script>';	
			}
		}
		
		$imagem_md_orig = imagecreatefrompng($marcaDagua);
		
			
		/*Copia a imagem ou parte dela redimensionando. O 1 parametro imagem final, 2 imagem original, os 2 proximos a posicao da imagem x e y, 2 proximos posicao a ser pega na imagem original, 
		agora o novo tamanho e o tamanho original $width, $height, $width_original, height_original, */
		imagecopyresampled($imagem, $imagem_orig, 0, 0, 0, 0, $largura, $altura, $largura_orig, $altura_orig);
		
		//Vamos copiar a marca d'agua em cima da imagem final no canto inferior direito para isso definimos a posicao os pontos 0 e 0 escolhidos e o tamanho da marca
		imagecopy($imagem, $imagem_md_orig, ($largura - ($largura_md_orig + 15)), ($altura - ($altura_md_orig + 15)), 0, 0, $largura_md_orig, $altura_md_orig);
		
		//Para salvar				
		imagepng($imagem, $nome_img);			
	}	

?>