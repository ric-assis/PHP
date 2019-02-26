<?php
	session_start();
	require_once "connect.class.php";	
	
	$pdo = Connect::getPDO();
			
	$sql_filtro = array("1=1");	//Caso o filtro esteja em branco a condição assume como verdeira
	$sql_organizar = null;	
	$busca_valores = array(); //rray com todas as palavras procuradas
	$max_pagina = 4; // O numero maximo de paginacao que sera exibido de um lado e do doutro da pagina atual ex 2 links e pag atual sendo 3 ficaria: 12 3 45
	$prim_anuncio_pag = paginacao($max_pagina);//Primeira pagina	
	$pagina_anuncio_atual = (isset($_GET["ini_pag"]))? (int)$_GET["ini_pag"]: 1; //Pagina selecionada ou atual
	$limite = 15; //Limite de 15 produtos exibidos por pagina
	
	if(!empty($_GET["txtBuscar"])){
		$busca = addslashes($_GET["txtBuscar"]);
		//Quebra as palavras e converte em array
		$busca_valores = explode(" ", $busca);
		//Filtra as palavras excluindo as com menos de 3 caracteres
		foreach($busca_valores as $key => $valores){
			if(strlen($valores) < 3){
				unset($busca_valores[$key]);			
			}
		}
		
		if(count($busca_valores) == 0){
			echo '<script>alert("Procure por palavras chave com pelo menos 3 caracteres.")</script>';
		}			
	}
			
	//Get passada pelo formulario
	if(!empty($_GET["urlFiltro"])){
		parse_str($_GET["urlFiltro"], $url_filtro); //converte o get com varios paramentros para um array com todos os filtros		
	}
	
	//checka se o valor é passado individual pelo get ou se é passado pelo formulario para um array
	if(!empty($_GET["cat"])){		
		$categoria = addslashes($_GET["cat"]);	
		$sql_filtro[] = "anuncio.id_categoria = :categoria";			
	}else if(!empty($url_filtro["cat"])){
		$categoria = $url_filtro["cat"];	
		$sql_filtro[] = "anuncio.id_categoria = :categoria";			
	}		
	
	if(!empty($_GET["estado"])){
		$estado = addslashes($_GET["estado"]);	
	}else if(!empty($url_filtro["estado"])){	
		$estado = $url_filtro["estado"];
	}
	
	if(!empty($estado)){
		if($estado == "novo"){
			$estado = 1;
		}else if($estado == "usado"){
			$estado = 0;
		}else{
			echo '<script>alert("Tipo de estado inválido")</script>';
		}
				
		$sql_filtro[] = "anuncio.estado = :estado";	
	}
	
	if(!empty($_GET["menorValor"])){      
		$menorValor = addslashes($_GET["menorValor"]);			
	}
	
	if(!empty($_GET["maiorValor"])){
		$maiorValor = addslashes($_GET["maiorValor"]);	
	}
	
	//Sempre irá verificar os valores podendo ser verificado individualmente so o menor ou maior ou indicando ambos
	$sql_filtro[] = "anuncio.valor BETWEEN :preco1 and :preco2";	
		
	if(!empty($_GET["organizar"])){
		$organizar = addslashes($_GET["organizar"]);
		$sql_organizar = "ORDER BY anuncio.valor $organizar";		
	}else if(!empty($url_filtro["organizar"])){
		$organizar = $url_filtro["organizar"];
		$sql_organizar = "ORDER BY anuncio.valor $organizar";		
	}
	
	
	//Verifica se é uma busca ou filtro, se busca executa uma query se filtro outra
	if(count($busca_valores) > 0){
		
		foreach($busca_valores as $valor){			
			$sql = $pdo->query("SELECT id, titulo, valor  FROM anuncio WHERE titulo LIKE '%$valor%' OR descricao LIKE '%$valor%' LIMIT $prim_anuncio_pag, $limite");
			if($sql->rowCount() > 0){
				$anuncios = $sql->fetchAll();	
			}else{
				echo '<script>
						alert("Produto não encontrado. Procure por palavras chave.");
						window.location.href = "index.php";					
					</script>';
				
			}				
		}		
	}else{			
		//inplode imprime os elementos do array com um separador indicado 		
		$sql = "SELECT id, titulo, valor FROM anuncio WHERE ".implode(" AND ", $sql_filtro)." $sql_organizar LIMIT $prim_anuncio_pag, $limite";
		$stm = $pdo->prepare($sql);		
		
		//Novmente verificaa se o get nao esta vazio para adicionar o bind, aqui verifica os 2 casos se recebido via get ou formulario 
		if(!empty($_GET["cat"]) || !empty($url_filtro["cat"])){
			$stm->bindValue("categoria", $categoria);				
		}
		
		if(!empty($_GET["estado"])  || !empty($url_filtro["estado"])){
			$stm->bindValue("estado", $estado);
		}
		
		//Como sempre verifica os valores caso nao tenha um menor valor ele usa 0
		if(!empty($_GET["menorValor"])){
			$stm->bindValue("preco1", $menorValor);
		}else{
			$stm->bindValue("preco1", 0);
		}
		
		//Como sempre verifica os valores caso nao tenha um maior valor ele usa 100000000
		if(!empty($_GET["maiorValor"])){
			$stm->bindValue("preco2", $maiorValor);
		}else{
			$stm->bindValue("preco2", 100000000000);
		}
		
		$stm->execute();		
		
		if($stm->rowCount() > 0){		
			$anuncios = $stm->fetchAll(PDO::FETCH_ASSOC);			
		}else{
			$anuncios = array();
			//header("location:index.php");			
		}
	}
	
		
	/*Associa o id do resultado da pesquisa sql anterior:anuncios com o array de 
	*fotos incluido o id do anuncio junto com o array das fotos
	*Não é necessario, criado simplesmente como exemplo, todo o processo poderia ser feitos na query de consulta do DB	*/
	$fotos = array();//Define fotos como um array vazio evitando quebra no foreach 
	foreach($anuncios as $key=>$anuncio){
		$id_anuncio[$key] = $anuncios[$key]["id"];		
		$id_anuncio_individual = $id_anuncio[$key];
		$sql = $pdo->query("SELECT foto FROM fotos WHERE id_anuncio=$id_anuncio_individual LIMIT 1");		
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$foto_individual = $sql["foto"];	
			$fotos[$key] = array("id" => $id_anuncio_individual,
							 "foto" => $foto_individual
			);			
			
		}
	}
	
	//Executa a paginação na busca 
	if(count($busca_valores) > 0){
		$cont = 0;
		foreach($busca_valores as $valor){		
			$sql = $pdo->query("SELECT COUNT(*) AS quant FROM anuncio WHERE titulo LIKE '%$valor%' OR descricao LIKE '%$valor%'");
			if($sql->rowCount() > 0){
				$sql = $sql->fetchAll();
				$num_pag = ceil($sql[0]["quant"]/$limite);			
			}
		}					
	}else{	
		//Executa a paginacao no filtro	
		$sql = "SELECT COUNT(*) AS quant FROM anuncio WHERE ".implode(" AND ", $sql_filtro);
		$stm = $pdo->prepare($sql);		
		
		//Novmente verificaa se o get nao esta vazio para adicionar o bind, aqui verifica os 2 casos se recebido via get ou formulario 
		if(!empty($_GET["cat"]) || !empty($url_filtro["cat"])){
			$stm->bindValue("categoria", $categoria);				
		}
		
		if(!empty($_GET["estado"])  || !empty($url_filtro["estado"])){
			$stm->bindValue("estado", $estado);
		}
		
		//Como sempre verifica os valores caso nao tenha um menor valor ele usa 0
		if(!empty($_GET["menorValor"])){
			$stm->bindValue("preco1", $menorValor);
		}else{
			$stm->bindValue("preco1", 0);
		}
		
		//Como sempre verifica os valores caso nao tenha um maior valor ele usa 100000000
		if(!empty($_GET["maiorValor"])){
			$stm->bindValue("preco2", $maiorValor);
		}else{
			$stm->bindValue("preco2", 100000000000);
		}
		
		$stm->execute();		
		
		if($stm->rowCount() > 0){		
			$stm = $stm->fetch(PDO::FETCH_ASSOC);			
			$num_pag = ceil($stm["quant"]/$limite);	
		}
		
	}
	
	function paginacao($limite){		
		//Cria o primeiro anuncio de cada paginacao
		$ini = null;
		if(!empty($_GET["ini_pag"]) && isset($_GET["ini_pag"])){
			$ini = ($_GET["ini_pag"] - 1) * $limite; //-1 devido a iniciar a paginacao com 1 e nao 0, o primeiro valor deve ser 0
			return $ini;
		}else{		
			return 0;
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
		<header>
			<?php require_once "nav.php";	?>
		</header>
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
			<main>				
				<div class="row">									
					<div class="col-md-2 mt-1 pb-1 pt-1 ">							
						<div id="categorias" class="col-md-12 border rounded">							
							<h4 class="text-center textOrange">Categorias</h4>	
							<?php $home='index.php?'; $filtro = array(); ?>
							<ul>									
								<li>
									<a  href="<?php echo $home.'cat=1'?>"><img id="imgservico" src="imagens/servico.png"/> Serviços</a>
								</li><hr/>	
								<li>
									<a  href="<?php echo $home.'cat=2'?>"><img id="imgEletronico" src="imagens/eletronico.png"/> Eletrônicos e eletrodoméstico</a>
								</li><hr/>
								<li>
									<a  href="<?php echo $home.'cat=3'?>"><img id="imgVeiculo" src="imagens/veiculo.png"/> Veículos e equipamentos agrículas</a>
								</li><hr/>
								<li>
									<a  href="<?php echo $home.'cat=4'?>"><img id="imgBrinquedo" src="imagens/brinquedos.png"/> Brinquedos infantis e acessórios</a>
								</li><hr/>
								<li>
									<a  href="<?php echo $home.'cat=5'?>"><img id="imgMusica" src="imagens/musica.png"/> Músicas e equipamentos</a>
								</li><hr/>
								<li>							
									<a href="<?php echo $home.'cat=6'?>"><img id="imgroupa" src="imagens/roupa.png"/> Roupas infantis, masculinas e femeninas</a>
								</li><hr/>
								<li>
									<a  href="<?php echo $home.'cat=7'?>"><img id="imgEsporte" src="imagens/esporte.png"/> Equipamentos e acessórios esportivos</a>
								</li><hr/>
								<li>
									<a  href="<?php echo $home.'cat=8'?>"><img id="imgCasa" src="imagens/casa.png"/> Cama, mesa e banho</a>
								</li>									
							</ul>
							<?php $filtro = $_GET; //Filtro recebe o get cat caso exista ?>
						</div>							
						<div class="col-md-10 mt-2">
							<?php if(isset($filtro) && !empty($filtro)): ?>				
							<?php echo '<a href="index.php"><button class="btn btn-primary btn-sm" style="border-radius:20px">Limpar filtros &times;</button></a> '
							?>				
							<?php endif ?>
							
							<h6 class="text-secondary">Organizar por:</h6> 
							<!-- http_build_query recebe um array ou variavel e a converte em uma query URL concatenando os valores ex:
								Aqui foi passado o get cat e contatenado com o array organizar no array $filtro, e no link foi escrito com echo a url
								que foi montada com http_build_query. --> 
							<a class="btn" href="<?php $filtro['organizar']='asc'; echo $home.http_build_query($filtro) ?>">Menor preço</a>
							<a class="btn" href="<?php $filtro['organizar']='desc'; echo $home.http_build_query($filtro)?>">Maior preço</a> 	
							<?php $filtro['organizar']=''; //Caso nao tenha valor selecionado ele pega o ultimo valor do array e se tive ele passa o selecionado?>	
						</div>	
						<div class="col-md-10 mt-2">								
							<h6 class="text-secondary">Estado:</h6> 								
							<a class="btn" href="<?php $filtro['estado']='novo'; echo $home.http_build_query($filtro) ?>">Produto novo</a>
							<a class="btn" href="<?php $filtro['estado']='usado'; echo $home.http_build_query($filtro)?>">Produto usado</a> 								
							<?php $filtro['estado']=''; ?>
						</div>	
						<div class="col-md-10 mt-2">								
							<h6 class="text-secondary">Valor:</h6> 	
							<form method="GET">	
								<div class="row">										
									<div class="form-group filtroValor">
										<!-- O input com type = hidden é um input oculto que será usado para receber todo o filtro já
											existente no seu value e ao submeter o formulario os vaalores de todos os caampos é passado
											ao php inclusive o oculto-->
										<input type="hidden" name="urlFiltro" value="<?php echo http_build_query($filtro) ?>"/>
										<input class="form-control"  type="text" name="menorValor" placeholder="Mínimo" />
									</div>&#95; 
									<div class="form-group filtroValor">
										<input class="form-control"   type="text" name="maiorValor" placeholder="Máximo"/>
									</div>
									<div class="form-group">
										<button id="btnValor" class="btn" type="submit">&#187;</button>
									</div>
								</div>	
							</form>
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
									<div class="col-md-12 text-primary h4">
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
						<div class="row justify-content-center">
							<div class="col-md-12">
								<ul class="pagination justify-content-center">									
									
									<!-- Avança para o primeiro item da paginacao -->	
									<?php  if($num_pag > 3)://Só exibe os botoes se tive mais de 3 paginas ?>																					
											<li class="page-item"><a href="<?php $filtro["ini_pag"] = 1; echo $home.http_build_query($filtro) ?>" class="page-link">&#171;</a></li>			
									<?php endif ?> 	
									
									<!-- Paginacao para os itens menores que a pagina atual -->
									<?php 
										for($i = $pagina_anuncio_atual - $max_pagina; $i <= $pagina_anuncio_atual - 1; $i++): ?>										
											<?php if($i >= 1): ?>
													<?php $filtro = $_GET; ?>
													<li class="page-item"><a href="<?php $filtro["ini_pag"] = $i; echo $home.http_build_query($filtro) ?>" class="page-link"><?php echo $i ?></a></li>
											<?php endif ?>
									<?php endfor ?>	
									
									<!-- Paginacao da pagina atual -->
									<li class="page-item active"><button class="page-link"><?php echo $pagina_anuncio_atual ?></button></li>
									
									<!-- Paginacao para os itens maiores que a pagina atual -->
									<?php 
										for($i = $pagina_anuncio_atual + 1; $i <= $pagina_anuncio_atual + $max_pagina; $i++): ?>
											<?php if($i <= $num_pag): ?>
													<?php $filtro = $_GET; ?>
													<li class="page-item"><a href="<?php $filtro["ini_pag"] = $i; echo $home.http_build_query($filtro) ?>" class="page-link"><?php echo $i ?></a></li>
											<?php endif ?>
									<?php endfor ?>
									
									<!-- Avança para o ultimo item da paginacao -->	
									<?php if($num_pag > 3)://Só exibe os botoes se tive mais de 3 paginas ?>											
											<li class="page-item"><a href="<?php $filtro["ini_pag"] = $num_pag; echo $home.http_build_query($filtro) ?>" class="page-link">&#187;</a></li>	
									<?php endif?>		
								
								</ul>
							</div>
						</div>
					</div>		
				
					<div  id="lateral" class="col-md-2 border-left">							
						<aside>
							<div class="row d-flex flex-column align-items-center">
							<section>
								<img class="img-fluid" width="300px" src="imagens/imgl2.png"/>
							</section>
							<section>
								<img class="img-fluid" width="300px" src="imagens/imgl1.png"/>
								<h4 class="text-danger text-center">Peça agora o seu cartão</h4>
							</section>	
							<section>
								<img class="img-fluid" width="300px" src="imagens/imgl3.png"/>
								<h4  class="text-danger text-center">Confira todas as ofertas!</h4>
							</section>
							<section>
								<img class="img-fluid" width="300px" src="imagens/imgl5.png"/>
							</section>							
						</aside>	
						</div>
					</div>	
				</div>		
			</main>	
		</div>			
	
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>
	</body>
</html>