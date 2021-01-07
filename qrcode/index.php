<!Doctype html>
<html lang='pt-br'>
	<head>
		<meta charset="UTF-8"/>
		<title>QR Code</title>		
		<style type="text/css">			
		</style>
	</head>
	<body>	
		<?php			
			/*Gerar QR Code:			
			d: dados que você deseja codificar para o QRcode.
				Um caractere especial como '%', espaço ou 8 bits deve ser codificado em URL.
				Você não pode omitir este parâmetro.

			e: nível correto de erro
				Você pode definir 'L', 'M', 'Q' ou 'H'.

				Se você não definir isso, o programa será padronizado como 'M'.

			s: tamanho do módulo
				Este parâmetro não tem efeito no modo HTML.
				Você pode definir um número maior que 1.
				O tamanho da imagem depende deste parâmetro.

				Se você não definir isso, o programa seleciona '4' no modo PNG ou '8' no modo JPEG.

			v: versão
				Você pode definir isso para 1-40.
				Se você não o definir, o programa escolherá automaticamente.

			t: tipo de imagem
				Você pode definir 'J', 'H' ou outro.
				'J': modo jpeg.
				'H': modo html. (Somente para perl)
				Outro: modo png.

				Se você não definir isso, o programa seleciona o modo PNG.
			*/
			$var = '/qrcode/qr_code/qrimg.php?'; 
			$var .= 'd=Nome:Alonso Ricardo C Assis.RG:394024.Produto:Espetinho.Desconto:20%.Chave:babc0b31413d8c8d2bad6fedf7a415ba&'; 
			$var .= 'e=H&'; 
			$var .= 's=4&';
			$var .= 't=P';			
		?>	
		<!-- Exibir QR Code -->
		<img src="<?php echo $var ?>"/>		
		<br/>
		<a href="ler.php">Lêr QR Code</a>
	</body>	
</html>