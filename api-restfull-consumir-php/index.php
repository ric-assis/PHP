<?php
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_consumir_erro.log');	
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, "http://localhost/api-restfull/api/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$list = curl_exec($ch);	
	$list = json_decode($list);
	
	if(isset($_GET["nome"]) && !empty($_GET["nome"]) && isset($_GET["nascimento"]) && !empty($_GET["nascimento"])){
		$nome = addslashes($_GET["nome"]);
		$nascimento = addslashes($_GET["nascimento"]);
		
		curl_setopt($ch, CURLOPT_URL, "http://localhost/api-restfull/api/gravar");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=".$nome."&nascimento=".$nascimento);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$gravar = curl_exec($ch);
		$gravar = json_decode($gravar);		
	}
	
	if(isset($_GET["id"]) && !empty($_GET["id"])){
		$id = addslashes($_GET["id"]);
				
		curl_setopt($ch, CURLOPT_URL, "http://localhost/api-restfull/api/excluir");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "id=".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$excluido = curl_exec($ch);
		$excluido = json_decode($excluido);		
	}
	
	
	
	curl_close($ch);
?>

<!Doctype html>
<html>
	<head>
		<title>Consumir API RestFull com PHP</title>
		<style>			
			html,
			body{
				background-color: #000;
				color: #51ce35;				
				width: 100%;
				height: 100%;
				font-family: "Courier New";				
			}
			
			.container{
				width: 100%;					
			}
			
			.area{
				margin-left: 35%;
				max-width: 500px;				
			}
			
			hr{ 
				background-color: #FFF;
			}
			
			ul{
				padding: 0;
				border:1px solid #FFF;
			}
			
			li{
				list-style: none;
				padding:4px;
			}
			
			.msg{
				color: red;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="msg">
				<?php if(isset($gravar) && !empty($gravar)){
					echo $gravar->id != 0 ? "Gravado no ID:".$gravar->id : "Ocorreu um erro ao gravar"; 
				}?>
				
				<?php if(isset($excluido) && !empty($excluido)){					
					echo $excluido->id == 0 ? "Excluido com sucesso" : "Ocorreu um erro ao escluir"; 
				}?>
				
			</div>
			
			<div class="area">
				<ul>
					<?php foreach($list as $l): ?>
						<li>ID: <?php echo $l->id ?></li>	
						<li>Nome: <?php echo $l->nome ?></li>
						<li>Nascimento: <?php echo $l->nascimento ?></li>
						<hr/>	
					<?php endforeach; ?>		
				</ul>
				
				<div>
					<h4>Salvar<h4>
					<form method="GET">
						<input type="text" name="nome" placeholder="Nome">
						<input type="date" name="nascimento">
						<button type="submit">Gravar</button>
					</form	
				</div>
				<div>
					<h4>Excluir<h4>
					<form method="GET">
						<input type="number" name="id" placeholder="ID">						
						<button type="submit">Excluir</button>
					</form>						
				</div>
			</div>
			
		</div>
	</body>
</html>			