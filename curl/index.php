<?php
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://ariccassis.000webhostapp.com/sessao/logar.php");
		//Indica que queremos o retorno como uma string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		//Converte os valores em um array que será enviado 
		curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=admin&senha=1234");
		//Salva os cookies para seja necessario para acesso a outra pagina
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		
		//curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		//curl_setopt($ch, CURLOPT_HEADER, 1);
		
		//Caso esteja acessando um servidor com ssl desativa a verificacao
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		/*Para seguir qualquer cabeçalho "Location:" que o servidor envia como parte do cabeçalho 
		HTTP (note que isso é recursivo, o PHP irá seguir quantos cabeçalhos "Location:" forem 
		enviados, a menos que CURLOPT_MAXREDIRSesteja configurado). Com ele é possivel mudar de pagina mantendo a sessao*/
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		//curl_setopt($ch, CURLOPT_VERBOSE, 1);
		//curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
				
		$resposta_senha = curl_exec($ch); //Nao interessa o interesse é na pagina logado
		
		// Define uma nova URL para ser chamada (após o login)
		curl_setopt($ch, CURLOPT_URL, "http://ariccassis.000webhostapp.com/sessao/logado.php");
				
		// Executa a segunda requisição armazenando a pagina de logado na variavel
		$resposta_logado = curl_exec ($ch);			
			
		curl_close($ch);	
		
		//Explode a variavel gerando um vetor que no caso o 24 é o que interessa
		$link = explode('"', $resposta_logado);		
		
		//Verifica a posicao numerica de uma palavra que ficou a mais com o link, no caso ficou > na posicao 0 e <hr na 164
		//$pos = stripos($link[24], '<hr');
		
		//Pega a substring de 1 a 163 e recoloca no vetor 
		$link[24] = substr($link[24],1, 163);	
		
		/*Assim é possivel fazer login, ir para a pagina principal pegar uma informaçao da pagina e repassar nessa pagina que 
		nao tem ligação com a outra*/
		//OBS: $info = curl_getinfo($ch); pega o retorno e converte em array
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>CURL</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>	
	</head>		
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">CURL</h1><hr/>					
					<?php print_r($link[24]); ?>
				</div>
			</div>
		</div>	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>	
	</body>	
</html>