<?php 
	session_start();
	require_once "connect.class.php";		

	if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
		header("loction:logar.php?pag-acessada=editar-anuncio.php"); 
	}
	
	require_once "produto.class.php";	
	
	//Passa a busca relizada para a pagina principal
	if(!empty($_GET["txtBuscar"])){
		header("location:index.php?txtBuscar=".$_GET["txtBuscar"]);
	}
	
	$pdo = Connect::getPDO();
	
	//ID do produto editado
	if(isset($_GET["id"]) && !empty($_GET["id"])){
		$id_anuncio = addslashes($_GET["id"]);
						
		//Seleciona o anuncio apartir do id recebido
		$stm = $pdo->prepare("SELECT * FROM anuncio WHERE id=?");
		$stm->bindValue(1, $id_anuncio);
		$stm->execute();
		if($stm->rowCount() > 0){
			$anuncio = $stm->fetch(PDO::FETCH_ASSOC);		
		}
		
		if($_SESSION["id"] != $anuncio["id_usuario"]){
			header("location:logar.php?pag-acessada=editar-anuncio.php");
		}
		
		//Seleciona as categoria atraves do id do anuncio
		$id_categoria = $anuncio["id_categoria"];
		$sql = $pdo->query("SELECT categoria FROM categoria WHERE id=$id_categoria");
		if($sql->rowCount() > 0){
			$categoria = $sql->fetch();		
		}
		
		/*Seleciona as fotos vinculadas no anuncio*/
		$id_anuncio = $anuncio["id"];
		$sql = $pdo->query("SELECT id, foto FROM fotos WHERE id_anuncio=$id_anuncio");
		if($sql->rowCount() > 0){
			//$quant_fotos = $sql->rowCount();
			$fotos = $sql->fetchAll();							
		}		
	
		/*Seleciona as fotos vinculadas no anuncio*/
		$id_anuncio = $anuncio["id"];
		$sql = $pdo->query("SELECT id, foto FROM fotos WHERE id_anuncio=$id_anuncio");
		if($sql->rowCount() > 0){			
			$fotos = $sql->fetchAll();		
		}
	
		/*Verifica se o estado do produto e troca seu indice pelo valor*/
		if($anuncio["estado"] == 1){
			$anuncio["estado"] = "Novo";
		}else{
			$anuncio["estado"] = "Usado";
		}			
				
	}	
	
	//Exclui a foto selecionada
	$cont_fotos_excluidas = 0;
	if(!empty($_GET["id_foto"])){
		$id_foto = addslashes($_GET["id_foto"]);		
		$stm = $pdo->prepare("DELETE FROM fotos WHERE id=?");
		$stm->bindValue(1, $id_foto);
		$stm->execute();
		//Apaga as fotos da pasta
		if($stm->rowCount() > 0){
			if(!empty($_GET["foto"]))
				unlink($_GET["foto"]);
			$cont_fotos_excluidas++;
			header("refresh:0");				
		}
	}	


	
	if((isset($_POST["categoria"]) && isset($_POST["titulo"])) && (!empty($_POST["categoria"]) && !empty($_POST["titulo"]))){
		$titulo = addslashes($_POST["titulo"]);
		$categoria = addslashes($_POST["categoria"]);
		$estado = addslashes($_POST["estado"]);
		$valor = addslashes($_POST["valor"]);
		$descricao = addslashes($_POST["descricao"]);		
		
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);				
		
		//Passa os POST para um objeto array que é enviado ao objeto produto
		$dados_literais = array("titulo" => $titulo,
								"categoria" => $categoria,
								"estado" => $estado,
								"valor" => $valor,
								"descricao" => $descricao
								);	
		
		
		$produto = new Produto($dados_literais);		

		//atualiza os dados do anuncio	
		$stm = $pdo->prepare("UPDATE anuncio SET id_categoria=?, titulo=?, descricao=?, valor=?, estado=? WHERE id=?");
		$stm->bindValue(1, $produto->getCategoria());
		$stm->bindValue(2, $produto->getTitulo());
		$stm->bindValue(3, $produto->getDescricao());
		$stm->bindValue(4, $produto->getValor());
		$stm->bindValue(5, $produto->getEstado());		
		$stm->bindValue(6, $id_anuncio);
		$stm->execute();
		
		//As fotos nao sao atualizadas e sim apagadas e novas fotos reinceridas	
		foreach($produto->getFotos() as $fotos){
			$stm = $pdo->prepare("INSERT INTO fotos(id_anuncio, foto) VALUES(?, ?)");
			$stm->bindValue(1, $id_anuncio);		
			$stm->bindValue(2, $fotos);
			$stm->execute();
		}	
		header("refresh:0");
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
		<main>	
			<?php require_once "nav.php"; ?>
			<div class="container">				
				<h5 class="textGreenDark mt-3"><a class="textGreenDark titleLink" href="index.php">Home</a>> Editar Produto</h5>
				<div class="row mt-3 justify-content-center">				
					<div class="col-md-7">
						<form method="POST" id="frmCadastro_produto" enctype="multipart/form-data" class="p-1">
							<div class="form-row">
								<div class="col-md-12">
									<label for="lblCaategoria">Categoria:</label>
									<select class="form-control custom-select" name="categoria">
										<option value="<?php echo $categoria["categoria"] ?>" selected><?php echo $categoria["categoria"]?></option>
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
									<input class="form-control" type="text" name="titulo" value="<?php echo $anuncio["titulo"] ?>"/>
								</div>
							</div>							
							<div class="form-row justify-content-between">
								<div class="col-md-5 form-group">								
									<label for="lblestado">Estado do produto:</label>
									<select class="form-control custom-select"  name="estado" ?>>
										<option value="<?php echo $anuncio["estado"]?>"><?php echo $anuncio["estado"]?></option>
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
										<input class="form-control" type="text" name="valor" value="<?php echo $anuncio["valor"]?>"/>									
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group">
									<label for="fotos">Descrição:</label>
									<textarea class="form-control"  name="descricao" rows="5"><?php echo $anuncio["descricao"]?></textarea>
								</div>
								<div class="col-md-12 form-group">
									<input id="fotos_update" data-quant="<?php echo $max_fotos = 6 - count($fotos) + $cont_fotos_excluidas; ?>" class="form-control-file" name="fotos[]" multiple type="file" accept="image/jpeg, image/jpeg, image/png" />
									<label for="fotos">Máximo <?php echo $max_fotos ?> fotos</label><!-- Informa a quantidade de fotos ainda disponivel -->
								</div>
							</div>	
							<div class="form-group">
								<button class="btn btn-success" type="submit">Efetuar alteração</button>
							</div>	
							<div class="card">
								<div class="card-header">Imagens do anuncio</div>
								<div class="card-body d-flex flex-wrap">
									<?php if(empty($fotos)): ?>
										<?php echo "Não há mais imagens!" ?>
									<?php else: ?>									
										<?php foreach($fotos as $foto): ?>										
											<div class="d-flex flex-column mr-3 mb-2">
												<div class="d-flex align-items-center border rounded" style="width:172px; height:172px">
													<img class="img-thumbnail border-0" style="width:170px; max-width:170px; max-height:170px" src="<?php echo $foto["foto"]?>"/>
												</div>
												<?php 
												$url = $_GET; //Captura o get e adiciona 2 novos parametros no array
												$url["id_foto"] = $foto["id"];
												$url["foto"] = $foto["foto"];
												?>
												<!-- Converte o array em uma url -->
												<a class="btn btn-danger mt-2 excluir_foto" href="?<?php echo http_build_query($url); ?>">Excluir</a>											
											</div>										
										<?php endforeach ?>							
									<?php endif ?>	
								</div>
							</div>		
						</form>						
					</div>
				</div>	
			</div>
		</main>
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>
	</body>
</html>