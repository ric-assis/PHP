<?php
	session_start();
	
	header("Content-type:text/html; Charset=utf-8");
	//Gerar valores alfa numericos aleatórios
		$text = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$tam = strlen($text) - 1; //Strlen inicia a contagem com 1 sendo 63 letras e rand conta de 0 sendo 62	
		$write = "";
		
	/*Verifica se a sessão está setada antes de iniciar para não trocar a sessão e 
	o valor antes de verificar ao atualizar a página com o submit*/	
	if(!isset($_SESSION["captcha"])){
		$value = "";
		
		for($i = 0; $i < 4; $i++){
			$value .= $text[rand(0, $tam)];
		}
		
		$_SESSION["captcha"] = $value;	
	}	
	
	//Verifica os valores
	if(!empty($_POST["codigo"])){ 		
		if($_POST["codigo"] == $_SESSION["captcha"]){
			$write = "Captcha OK!";	
		}else{
			$write = "Captcha inválido!";
		}		
	}
	
	//Ao final acertando ou errando é gerado outro valor
	$value = "";		
	for($i=0; $i<4; $i++){
		$value .= $text[rand(0, $tam)];
	}		
	
	$_SESSION["captcha"] = $value;			
?>

<!Doctype html>
<html>
	<header>
		<meta charset="UTF-8"/>
		<title>Captcha</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>		
	</header>
	<body>
		<div class="container">
			<h1 class="text-center">Captcha</h1><hr/>
			<div class="row justify-content-center">
				<div class="col-md-5">
					<img src="captcha.php" width="200px" height="100px"/><!-- Imagem que armazenará  captcha -->
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-md-5">
					<form method="POST">
						<div class="form-row">
							<div class="col-md-6">
								<label for="codigo">Captcha:</label>
								<input class="form-control" type="text" name="codigo"/>
							</div>							
							<div class="col-md-12 mt-3 mb-3">								
								<button class="btn btn-primary" type="submit">Verificar</button>	
							</div>
						</div>
					</form>
					<h2 class="text-center"> <?php echo $write; ?> </h2>
				</div>
			</div>
		</div>
	</body>
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
</html>