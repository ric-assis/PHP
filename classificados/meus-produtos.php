<?php
	session_start();
	require_once "connect.class.php";
			
	//Passa a busca relizada para a pagina principal
	if(!empty($_GET["txtBuscar"])){
		header("location:index.php?txtBuscar=".$_GET["txtBuscar"]);
	}
	
	require_once "excluir-anuncio.php";
	
	$pdo = Connect::getPDO();
	//Verifica a sessao se nao existe redireciona pra area de login porem passa a url da pagina atual pra voltar nela apos login
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
		$id_usuario = $_SESSION["id"];
	}else{
		header("location:logar.php?pag-acessada=meus-produtos.php");
		exit;
	}
	
	//Seleciona foto e produto
	$sql = $pdo->query("SELECT anuncio.id, anuncio.id_usuario, anuncio.titulo, anuncio.descricao, anuncio.valor, anuncio.estado, fotos.foto FROM(anuncio LEFT JOIN fotos ON anuncio.id=fotos.id_anuncio) WHERE anuncio.id_usuario=$id_usuario GROUP BY(anuncio.id)");
	if($sql->rowCount() > 0){
		$produtos = $sql->fetchAll();
	}else{
		$produtos = array();//Se nao existe produtos cria um array vazio para evitar quebra no foreach
	}		
	
	//Chama a funcao excluir anuncio e atualia a pagina apos exclusao retirando o anuncio da lista
	if(isset($_GET["id"]) && !empty($_GET["id"])){
		excluir_anuncio($_GET["id"]);
		header("location:meus-produtos.php");
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
			<div class="container-fluid">
				<div class="row">
					<div id="dashboard" class="col-md-2 pt-5">
						<div class="d-flex">
							<div>
								<div style="width:23px; height:2px; margin:4px; background-color:#918e8e"></div>
								<div style="width:23px; height:2px; margin:4px; background-color:#918e8e"></div>
								<div style="width:23px; height:2px; margin:4px; background-color:#918e8e"></div>
							</div>						
							<div class="d-flex align-items-center">
								<h5 class="text-secondary"> Minha Conta</h5>								
							</div>							
						</div>
						<span class="text-secondary"><?php echo "Olá, ".strtoupper($nome_usuario["nome"])."!" ?></span><hr/>						
						<p><a href="meus-produtos.php">Meus anuncios</a></p>
						<p><a href="meus-produtos.php">Minhas compras</a></p>
					</div>
					<div class="col-md-9 table-responsive">
						<h5 class="textGreenDark mb-3"><a class="textGreenDark titleLink" href="index.php">Home</a>> Meus anuncios</h5>
						<table class="table table-striped">								
							<tbody>
								<?php foreach($produtos as $produto): ?>
									<tr>
										<td><img class="img-thumbnail rounded" width="100px" style="min-width:100px" src="<?php echo $produto["foto"]?>"></td>
										<td class="text-primary"><?php echo $produto["titulo"] ?></td>
										<td class="text-secondary" width="600px"><?php echo $produto["descricao"] ?></td>
										<td class="text-secondary">
											<?php 
												$preco = str_replace(".", ",", $produto["valor"]);
												echo "R$ ".$preco; 
											
											?>
										</td>
										<td class="text-secondary">
											<?php 
												if($produto["estado"] == 0){
													echo "Produto usado";		
												}else{
													echo "Produto novo";
												}													
											?>
										</td>
										<td  style="background-color:#d1d1d1">
											<div class="d-flex flex-column aligm-items-center">
												<a class="btn btn-primary mb-2" href="editar-anuncio.php?id=<?php echo $produto["id"] ?>">Edidar</a>
												<a class="btn btn-danger" href="?id=<?php echo $produto["id"] ?>">Excluir</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>								
							</tbody>							
						</table>
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