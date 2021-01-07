<?php
	/*O proxy functiona como um intermediario, pode ser implementado de diferentes forma dependendo
	*da situação. Aqui usamos o protection proxy para resolver o problema. No caso recebemos através de
	*uma classe a url do arquivo porem precisamos criar um log e um login de acesso pra download mas 
	*como não podemos modificar a classe concreta usamos um proxy para intermediar as funcionalidades
	*necessarias ao cliente mas que nao podem ser implementadas diretamente na classe concreta. O proxy
	*cria uma copia da classe concreta reutilizando seus metodos de acesso.
	*Caso tivessemos uma interface de ConcreteDownload poderiamos simplesmente implementar o proxy na mesma 
	*interface e receber a classe ConcreteDownload no construtor por agregação.
	*/

	require_once "ConcreteDownload.php";
	require_once "ProxyProtection.php";
		
	$protectionDownload = new ProxyProtection("admin", "1234");
	$url = $protectionDownload->getDownload();
?>

<!Doctipe html>
<html>
	<head>
		<title>Proxy</title>
		<style>
			html, body{
				width:100%;
				positin:relative;
			}
		
			a{
				background-color:#0da2d8;
				border: 1px 1px 2px 2px solid #868e96;
				color:#FFF;				
				margin-top: 250px;
				font-size: 20px;
				padding:15px;
				border-radius: 5%;
				position: absolute;
				left:50%;
				text-decoration:none;
			}
		</style>
	</head>		
	<body>
		<a href="<?php echo $url ?>">Baixar arquivo do servidor</a>
	</body>
</html>
	