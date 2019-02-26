<?php
	session_start();
	require_once "connect.class.php";
	
	
	
	if(isset($_GET["ordem"]) && !empty($_GET["ordem"])){
		$ordem = addslashes($_GET["ordem"]);
	}
	
	if(isset($_GET["categoria"]) && !empty($_GET["categoria"])){
		$categoria = addslashes($_GET["categoria"]);
	}
			
	$pdo = Connect::getPDO();
	
	if((isset($ordem) && isset($categoria)) && !empty($ordem) && !empty($categoria)){			
		$sql = 	"SELECT anuncio.id, anuncio.titulo, anuncio.valor, fotos.foto FROM(anuncio left join fotos on fotos.id_anuncio=anuncio.id)
				WHERE id_categoria=? group by(anuncio.id) ORDER BY valor ? LIMIT 15";
		$anuncios = filtrar_produtos($sql);
	}else if(isset($categoria) && !empty($categoria)){
		$sql = "SELECT anuncio.id, anuncio.titulo, anuncio.valor, fotos.foto FROM(anuncio left join fotos on fotos.id_anuncio=anuncio.id)
				WHERE id_categoria=? group by(anuncio.id) LIMIT 15";
		$anuncios = filtrar_categoria($sql);
	}else if(isset($ordem) && !empty($ordem)){		
		$sql = 	"SELECT anuncio.id, anuncio.titulo, anuncio.valor, fotos.foto FROM(anuncio left join fotos on fotos.id_anuncio=anuncio.id)
				group by(anuncio.id) ORDER BY valor ? LIMIT 15";
		$anuncios = selecionar_ordem($sql);
	}else{
		$sql = "SELECT id, titulo, valor FROM anuncio LIMIT 15";
		$anuncios = selecionar_produtos($sql);
	}


	function filtrar_produtos($sql){
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $categoria);
		$stm->bindValue(2, $ordem);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$anuncios = $stm->fetchAll(PDO::FETCH_ASSOC);
			json_encode($anuncios);
		}else{			
			header("location:index.php");			
		}
	}
	
	function filtrar_categoria($sql){
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $categoria);		
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$anuncios = $stm->fetchAll(PDO::FETCH_ASSOC);
			json_encode($anuncios);
		}else{			
			header("location:index.php");			
		}
	}
	
	function filtrar_ordem($sql){
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare($sql);		
		$stm->bindValue(1, $ordem);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$anuncios = $stm->fetchAll(PDO::FETCH_ASSOC);
			json_encode($anuncios);
		}else{			
			header("location:index.php");			
		}
	}
	
	function selecionar_produtos($sql){			
		$pdo = Connect::getPDO();
		$sql = $pdo->query($sql);
		if($sql->rowCount() > 0){
			$anuncios = $sql->fetchAll();
			json_encode($anuncios);
			
		}else{
			echo "Não existem produtos";
		}			
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
			<?php require_once "nav.php"; ?>			
			
		<div class="container-fluid mr-0 pr-0 ml-0 pl-0">
			<article>
				<div class="col-md-12 carousel-1 justify-content-center">								
					<div class="owl-carousel owl-theme owl-height">
						<img class="img-responsive" src="imagens/banner.png"/>
						<img class="img-responsive" src="imagens/banner2.png"/>
						<img class="img-responsive" src="imagens/banner3.png"/>
					</div>					
				</div>					
			</article>
			<section>				
				<div class="row">									
					<div class="col-md-2 mt-1 pb-1 pt-1 ">						
						<div id="categorias" class="col-md-12 border rounded">
							<h4 class="text-center textOrange">Categorias</h4>	
							<ul>
								<li>
									<div class="categorias p-1" data-categoria="9"><img id="imgservico" src="imagens/servico.png"/> Serviços</div>
								</li><hr/>	
								<li>
									<div class="categorias p-1" data-categoria="10"><img id="imgEletronico" src="imagens/eletronico.png"/> Eletrônicos e eletrodoméstico</div>
								</li><hr/>
								<li>
									<div class="categorias p-1" data-categoria="11"><img id="imgVeiculo" src="imagens/veiculo.png"/> Veículos e equipamentos agrículas</div>
								</li><hr/>
								<li>
									<div class="categorias p-1" data-categoria="12"><img id="imgBrinquedo" src="imagens/brinquedos.png"/> Brinquedos infantis e acessórios</div>
								</li><hr/>
								<li>
									<div class="categorias p-1" data-categoria="13"><img id="imgMusica" src="imagens/musica.png"/> Músicas e equipamentos</div>
								</li><hr/>
								<li>							
									<div class="categorias p-1" data-categoria="14"><img id="imgroupa" src="imagens/roupa.png"/> Roupas infantis, masculinas e femeninas</div>
								</li><hr/>
								<li>
									<div class="categorias p-1" data-categoria="15"><img id="imgEsporte" src="imagens/esporte.png"/> Equipamentos e acessórios esportivos</div>
								</li><hr/>
								<li>
									<div class="categorias p-1" data-categoria="16"><img id="imgCasa" src="imagens/casa.png"/> Cama, mesa e banho</div>
								</li>
							</ul>
						</div>
						<div class="col-md-10 mt-2">						
							<h6 class="text-secondary">Organizar por:</h6> 
							<select id="organizar" class="form-control form-control-sm custom-select text-secondary">
								<option disabled selected style="display: none">Organizar</option>
								<option value="asc">Menor preço</option>
								<option value="desc">Maior preço</option>
							</select>
						</div>
					</div>
					
					<div class="col-md-8 mt-2">
						<div class="row align-items-end">
							<?php foreach($fotos as $key => $foto): ?>
							<div class="col-md-4 produtos border-right"  data-id=" <?php echo $anuncios[$key]["id"] ?> ">					
								<div class="col-md-12 d-flex justify-content-center align-items-center produto_fotos">
									<img class="img-fluid" src=" <?php echo $foto["foto"]?>"/>
								</div><hr/>
								<div class="row">
									<div class="col-md-12 text-primary h4 titulo">
										<?php if($foto["id"] == $anuncios[$key]["id"])
											echo $anuncios[$key]["titulo"];
										?>							
									</div>
									<div class="col-md-12 h4">
										<?php if($foto["id"] == $anuncios[$key]["id"])
											$anuncios[$key]["valor"] = str_replace(".", ",", $anuncios[$key]["valor"]);
											echo "R$ ".$anuncios[$key]["valor"];
										?>							
									</div>
								</div>
								
							</div>								
							<?php endforeach ?>								
						</div>
					</div>		
				
					<div  id="lateral" class="col-md-2 border-left">							
						<div class="row d-flex flex-column align-items-center">
						<img class="img-fluid" width="300px" src="imagens/imgl2.png"/>
						<img class="img-fluid" width="300px" src="imagens/imgl1.png"/>
						<h4 class="text-danger text-center">Peça agora o seu cartão</h4>
						<img class="img-fluid" width="300px" src="imagens/imgl3.png"/>
						<h4  class="text-danger text-center">Confira todas as ofertas!</h4>
						<img class="img-fluid" width="300px" src="imagens/imgl5.png"/>
						</div>
					</div>	
				</div>		
			</section>	
		</div>			
	
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>
	</body>
</html>