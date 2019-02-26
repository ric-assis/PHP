<?php
	session_start();
	require_once "connect.class.php";
	
	//Passa a busca relizada para a pagina principal
	if(!empty($_GET["txtBuscar"])){
		header("location:index.php?txtBuscar=".$_GET["txtBuscar"]);
	}
	
	$pdo = Connect::getPDO();
	
	//ID do produto clicado no index
	$id_anuncio = addslashes($_GET["id_produto_selecionado"]);
	
	//Seleciona o anuncio apartir do id recebido
	$sql = $pdo->query("SELECT * FROM anuncio WHERE id=$id_anuncio");
	if($sql->rowCount() > 0){
		$anuncio = $sql->fetch();		
	}
	
	//Seleciona as categoria atraves do id do anuncio
	$id_categoria = $anuncio["id_categoria"];
	$sql = $pdo->query("SELECT categoria FROM categoria WHERE id=$id_categoria");
	if($sql->rowCount() > 0){
		$categoria = $sql->fetch();		
	}
	
	/*Seleciona o usuario apartir do id do usuario registrado no anuncio*/
	$id_usuario = $anuncio["id_usuario"];
	$sql = $pdo->query("SELECT nome, email, telefone FROM usuario WHERE id=$id_usuario");
	if($sql->rowCount() > 0){
		$usuario = $sql->fetch();		
	}
	
	/*Seleciona as fotos vinculadas no anuncio*/
	$id_anuncio = $anuncio["id"];
	$sql = $pdo->query("SELECT foto FROM fotos WHERE id_anuncio=$id_anuncio");
	if($sql->rowCount() > 0){
		//$quant_fotos = $sql->rowCount();
		$fotos = $sql->fetchAll();		
	}
	
	/*Verifica se o estado do produto e troca seu indice pelo valor*/
	if($anuncio["estado"] == 1){
		$anuncio["estado"] = "Novo";
	}else{
		$anuncio["estado"] = "Usado";
	}
		
	
?>

<!Doctype html>
<html>
	<head>
		<meta charset="uft-8"/>
		<title>Classificados</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="assets/bootstrap.css" type="text/css" rel="stylesheet"/>
		<link href="assets/conf.css" type="text/css" rel="stylesheet"/>	
		<link href="assets/owl.carousel.css" type="text/css" rel="stylesheet"></link>	
		<link href="assets/animate.css" type="text/css" rel="stylesheet"></link>
		<link href="assets/owl.theme.default.css" type="text/css" rel="stylesheet"></link>	
	</head>
	<body>		
	<?php  require_once "nav.php"; ?>
	<section>
		<div class="container">
			<h5 class="textGreenDark mt-3"><a class="textGreenDark titleLink" href="index.php">Home</a>> <?php echo $categoria["categoria"] ?></h5>
			<div class="row mt-3">				
				<div class="col-md-6">
					<div class="row d-flex flex-column align-items-start">
						<div class="col-md-12 carousel-2 border rounded">					
							<div class="owl-carousel owl-theme">
								<?php								
								foreach($fotos as $key => $foto): 								
								?>
								<a id="<?php echo $key ?>"><img class="rounded img-fluid" src="<?php echo $foto[0] ?>" data-toggle="modal" data-target="#modal_produto"/></a>
								<?php 
								endforeach;
								?>
							</div>
						</div>
						<div class="col-md-12">
							<div id="controle" class="d-flex ">
								<?php
								foreach($fotos as $key => $foto): 								
								?>
								<a href="#<?php echo $key ?>"><img class="img-thumbnail rounded img-fluid mini" src="<?php echo $foto[0] ?>"/></a>
								<?php 
								endforeach;
								?>
							</div>				
						</div>				
					</div>
				</div>
				<div class="col-md-6 mt-2">
					<h3>Produto: <?php echo $anuncio["titulo"] ?></h3><hr/>
					<h6>Vendedor: <?php echo strtoupper($usuario["nome"]) ?></h6>
					<h6>E-Mail: <a href="mailto:<?php echo $usuario["email"] ?>"><?php echo $usuario["email"] ?></a></h6>
					<h6>Telefone: <?php echo $usuario["telefone"] ?></h6>
					<h4>Estado do produto: <?php echo $anuncio["estado"] ?></h4>
					
					<?php if($anuncio["estado"] == "Novo"): ?>
						<h4 class="text-secondary"><s> 
							<?php 
								$desconto = floatval($anuncio["valor"]) + ((5/100) * floatval($anuncio["valor"]));  
								$desconto = str_replace(".", ",", $desconto);
								echo "DE R$ ".$desconto 
							?> </s>
						</h4>
					<?php endif ?>	
					<h3><?php 
						$anuncio["valor"] = str_replace(".", ",", $anuncio["valor"]);
						echo "POR R$ ".$anuncio["valor"] 
					?></h3>
					<div id="quantidade" class="d-flex">
						<button class="btn btn-success">-</button>
						<div id="valor" class="border rounded text-center">0</div>
						<button class="btn btn-success">+</button>
					</div>					
					<div class="mt-2">
						<a id="btnComprar" class="btn btn-success btn-lg border text-light">COMPRAR</a> 
					</div>	
				</div><hr/>						
			</div>
			<div class="col-md-12 mt-5 mb-3">
				<h5 class="textGreenDark">Descrição:</h5>
				
				<?php $descricao = trim($anuncio["descricao"]) ?>
				<pre><?php
					echo $descricao; 
				?></pre>
			</div>					
		</div>
	</section>			
		
	<div class="modal fade" id="modal_produto">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h3><?php echo $anuncio["titulo"] ?></h3>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-12 carousel-3">					
						<div class="owl-carousel owl-theme">
							<?php
								foreach($fotos as $key => $foto): 								
								?>
								<a id="<?php echo $key ?>"><img class="img-fluid"  src="<?php echo $foto[0] ?>" data-toggle="modal" data-target="#modal_produto"/></a>
								<?php 
								endforeach;
							?>							
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
		
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>
	</body>
</html>