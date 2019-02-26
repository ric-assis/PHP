<?php
	session_start();
	
	require_once "connect.class.php";
	
	/*Passa a busca relizada para a pagina principal redirecionamentos no header dever ser veitos antes de echo, 
	html ou fechamentos php com linhas em branco logo abaixo*/
	if(!empty($_GET["txtBuscar"])){
		header("location:index.php?txtBuscar=".$_GET["txtBuscar"]);
	}
	
	require_once "produto.class.php";	
		
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){	
		if((isset($_POST["categoria"]) && isset($_POST["titulo"])) && (!empty($_POST["categoria"]) && !empty($_POST["titulo"]))){
			$titulo = addslashes($_POST["titulo"]);
			$categoria = addslashes($_POST["categoria"]);
			$estado = addslashes($_POST["estado"]);
			$valor = addslashes($_POST["valor"]);
			$descricao = addslashes($_POST["descricao"]);		
			
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", ".", $valor);				
				
			$dados_literais = array("titulo" => $titulo,
									"categoria" => $categoria,
									"estado" => $estado,
									"valor" => $valor,
									"descricao" => $descricao
									);
				
			
			$produto = new Produto($dados_literais);
			
			$pdo = Connect::getPDO();
			
			$stm = $pdo->prepare("INSERT INTO anuncio(id_usuario, id_categoria, titulo, descricao, valor, estado) VALUES(?, ?, ?, ?, ?, ?)");
			$stm->bindValue(1, $_SESSION["id"]);
			$stm->bindValue(2, $produto->getCategoria());
			$stm->bindValue(3, $produto->getTitulo());
			$stm->bindValue(4, $produto->getDescricao());
			$stm->bindValue(5, $produto->getValor());
			$stm->bindValue(6, $produto->getEstado());			
			$stm->execute();
			
			$id_anuncio = $pdo->lastInsertId();
			
			
			foreach($produto->getFotos() as $fotos){
				$stm = $pdo->prepare("INSERT INTO fotos(id_anuncio, foto) VALUES(?, ?)");
				$stm->bindValue(1, $id_anuncio);		
				$stm->bindValue(2, $fotos);
				$stm->execute();
			}		
		}
	}else{
		header("location:logar.php?pag-acessada=cadastrar_produto.php");
		exit;
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
				<h5 class="textGreenDark mt-3"><a class="textGreenDark titleLink" href="index.php">Home</a>>Cadastro de Produto</h5>
				<div class="row mt-3 justify-content-center">				
					<div class="col-md-7">
						<form method="POST" id="frmCadastro_produto" enctype="multipart/form-data" class="p-1">
							<div class="form-row">
								<div class="col-md-12">
									<label for="lblCaategoria">Categoria:</label>
									<select class="form-control custom-select" name="categoria">
										<option value="Serviços">Serviços</option>
										<option value="Eletrônicos e eletrodoméstico">Eletrônicos e eletrodoméstico</option>
										<option value="Veículos e equipamentos agrículas">Veículos e equipamentos agrículas</option>
										<option value="Brinquedos infantis e acessórios" >Brinquedos infantis e acessórios</option>
										<option value="Músicas e equipamentos">Músicas e equipamentos</option>
										<option value="Roupas infantis, masculinas e femeninas">Roupas infantis, masculinas e femeninas</option>
										<option value="Equipamentos e acessórios esportivos">Equipamentos e acessórios esportivos</option>
										<option value="Cama, mesa e banho">Cama, mesa e banho</option>
									</select>
									<label for="lblTitulo">Titulo:</label>
									<input class="form-control" type="text" name="titulo"/>
								</div>
							</div>							
							<div class="form-row justify-content-between">
								<div class="col-md-5 form-group">								
									<label for="lblestado">Estado do produto:</label>
									<select class="form-control custom-select"  name="estado">
										<option>Usado</option>
										<option>Novo</option>
									</select>	
								</div>
								<div class="col-md-5 form-group">								
									<label for="lblvalor">Valor(R$):</label>									
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">R$</span>
										</div>								
										<input class="form-control" type="text" name="valor"/>									
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group">
									<label for="fotos">Descrição:</label>
									<textarea class="form-control"  name="descricao" rows="5"></textarea>
								</div>
								<div class="col-md-12 form-group">
									<input class="form-control-file" name="fotos[]" multiple type="file" accept="image/jpeg, image/jpeg, image/png" />
									<label for="fotos">Máximo 6 fotos</label>
								</div>
							</div>	
							<div class="form-group">
								<button class="btn btn-success" type="submit">Efetuar cadastro</button>
							</div>	
						</form>
						<div id="teste"></div>
					</div>
				</div>	
			</div>
		</section>
		
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>
	</body>
</html>