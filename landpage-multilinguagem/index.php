<?php
	session_start(); //Precisamos de uma sessão para salvar a linguagem escolhida pelo usuario
	require_once "lang.class.php";
	require_once "connect.class.php";
	header("Content-type:text/html;charset=utf-8");
	
	//Verifica se a sessão está vazia, ao carregar esse if nao será executado e sim a classe apos ao ja estar setado ele executa mudando para o idioma escolhido 
	if(isset($_GET["lang"]) && !empty($_GET["lang"])){
		$_SESSION["lang"] = $_GET["lang"];
	}
	
	//Se for a 1 execucao ao instancia a classe já pega o idioma padrão, se nao for a classe salva em sua variavel o valor escolhido e armazenado na sessao
	$lang = new LangPage();
	
	$pdo = Connect::getPDO();
	$carro;
	
	$sql = $pdo->query("SELECT categoria, produto, valor FROM tipo_categorias");
	if($sql->rowCount() > 0){
		$sql = $sql->fetchAll();				
	}

?>

<!Doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Land-Page Multi-Linguagem</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style type="text/css">
			body{
				margin:0;
				padding:0;				
			}
			
			.h1, .h2{
				background-color:#156ca5;
				color:#fff;
			}			
			
			.row-form{
				background-color:#452866;
				color:#FFF;
			}
			
			.categorias{
				display:flex;
				align-items:center;
				justify-content:center;
				width:250px;
				height:170px;				
				background-size: cover;
				background-position:center;
				color:#FFF;
				font-size:23px;
			}
			
			#veiculos{
				background:url(img/veiculos.jpg)no-repeat;
			}
			
			#roupas{
				background:url(img/roupas.jpg)no-repeat;
			}
			
			#calcados{
				background:url(img/calcados.jpg)no-repeat;
			}
			
			#acessorios{
				background:url(img/acessorios.jpg)no-repeat;
			}
			
			.footer{
				background-color:#3f2f2f;
				color: #FFF;					
			}			
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-10 mt-1">
					<h1 class="text-center"><?php $lang->getLang("products by category") ?></h1>
				</div>
				<div class="col-md-2 d-flex justify-content-around align-items-center">
					<?php $lang->getLang("language"); ?>
					<a href="index.php?lang=pt-br"><img src="img/icon.pt.png"/></a><!--Passa um get com o tipo da linguagem escolhida-->
					<a href="index.php?lang=en"><img src="img/icon.en.png"/></a><!--Passa um get com o tipo da linguagem escolhida-->
				</div>
				<div class="col-md-12 d-flex justify-content-end">
					<?php $lang->getLang("defined language"); echo $lang->getLangUsado() ?>
				</div>
			</div><hr/>	
			<div class="row">
				<div class="col-md-12 shadow mb-2">
					<div class="h1 text-center"><?php $lang->getLang("categories") ?> </div>	
				</div><hr/>
			</div>
			<div class="row">	
				<div class="col-md-6 d-flex justify-content-start">
					<div>
						<div id="veiculos" class="categorias shadow border rounded mb-2 mt-1"><?php $lang->getLang("vehicles") ?></div>
						<div class="prod-veiculos d-flex justify-content-center">
							<table class="table">
								<thead>
									<th><?php $lang->getLang("vehicles")?></th>
									<th><?php $lang->getLang("value") ?> R$</th>
								</thead>
								<tbody>
									<?php 
										foreach($sql as $carro){
											if($carro["categoria"]=="vehicles"){
												echo "<tr><td>"; $lang->getLang($carro["produto"]); echo "</td><td>R$ ".$carro["valor"]."</td></tr>";	
											}
										}			
									?>
								</tbody>
							</table>						
						</div>				
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-end">
					<div>
						<div id="roupas" class="categorias shadow border rounded mb-2 mt-1"><?php $lang->getLang("clothes") ?></div>
						<div class="prod-roupas d-flex justify-content-center">
							<table class="table">
								<thead>
									<th><?php $lang->getLang("clothes") ?></th>
									<th><?php $lang->getLang("value") ?> R$</th>
								</thead>
								<tbody>
									<?php 
										foreach($sql as $roupas){
											if($roupas["categoria"]=="clothes"){
												echo "<tr><td>";  $lang->getLang($roupas["produto"]); echo "</td><td>R$ ".$roupas["valor"]."</td></tr>";	
											}
										}			
									?>
								</tbody>
							</table>												
						</div>				
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-start">
					<div>
						<div id="calcados" class="categorias shadow border rounded mb-2 mt-1"><?php $lang->getLang("shoes") ?></div>
						<div class="prod-calcados d-flex justify-content-center">
							<table class="table">
								<thead>
									<th><?php $lang->getLang("shoes") ?></th>
									<th><?php $lang->getLang("value") ?> R$</th>
								</thead>
								<tbody>
									<?php 
										foreach($sql as $calcados){
											if($calcados["categoria"]=="shoes"){
												echo "<tr><td>";  $lang->getLang($calcados["produto"]); echo "</td><td>R$ ".$calcados["valor"]."</td></tr>";	
											}
										}			
									?>
								</tbody>
							</table>						
						</div>				
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-end">
					<div>
						<div id="acessorios" class="categorias shadow border rounded mb-2 mt-1"><?php $lang->getLang("accessories") ?></div>
						<div class="prod-acessorios d-flex justify-content-center">
							<table class="table">
								<thead>
									<th><?php $lang->getLang("accessories") ?></th>
									<th><?php $lang->getLang("value") ?> R$</th>
								</thead>
								<tbody>
									<?php 
										foreach($sql as $acessorios){
											if($acessorios["categoria"]=="accessories"){
												echo "<tr><td>";  $lang->getLang($acessorios["produto"]); echo "</td><td>R$ ".$acessorios["valor"]."</td></tr>";	
											}
										}			
									?>
								</tbody>
							</table>											
						
						</div>				
					</div>
				</div>
			</div><hr/>
			<div class="row row-form justify-content-center">
				<div class="col-md-12">
					<h2 class="text-center"><?php $lang->getLang("contact") ?></h2>
					<form method="POST">
						<div class="form-row justify-content-center p-2">
							<div class="col-md-5">
								<label for="nome"><?php $lang->getLang("name") ?></label>
								<input class="form-control" type="text" name="nome" placeholder="<?php $lang->getLang("enter your name") ?>"/>
							</div>
							<div class="col-md-5">
								<label for="email">Email :</label>
								<input class="form-control" type="text" name="email" placeholder="<?php $lang->getLang("enter your email") ?>"/>						
							</div>
							<div class="col-md-1 d-flex align-items-end">
								<input class="btn btn-primary" type="submit" value="<?php $lang->getLang("submit") ?>"/>						
							</div>
						</div>
					</form>
				</div>
			</div>
		
			<div class="row justify-content-center footer mt-4">
				<div class="col-md-6">		
					<div class="mt-2 mb-3 h4 text-center"><?php $lang->getLang("street") ?> D1, <?php $lang->getLang("number") ?>: 1448 - <?php $lang->getLang("center") ?></div>
					<div class="mt-2 mb-3 h4 text-center">Fortaleza - CE</div>
					<div class="mt-4 mb-4 h4 text-center">CEP:63700-000</div>				
				</div>
			</div>
		</div>		
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
	</body>
</html>