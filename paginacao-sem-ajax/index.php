<?php
	require_once "connect.php";
	
	$ini = 0;
		
	$sql = $pdo->query("SELECT COUNT(*) AS quant FROM frases");
	if($sql->rowCount() > 0){
		$sql = $sql->fetch();
		
		$num_de_pag = $sql["quant"] / 5; 
	}

	if(isset($_GET["pagina"]) && !empty($_GET["pagina"])){
		$pagina = addslashes($_GET["pagina"]);
		$ini = ($pagina - 1)*5;//Comou o num da pagina mais 1 agora retire esse 1
	}
	
	$sql = $pdo->query("SELECT * FROM frases LIMIT $ini, 5");
	if($sql->rowCount() > 0){
		$frases = $sql->fetchAll();		
		
	}
?>	
	
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Paginação sem Ajax</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<style>
			.divFrases{
				font-size:21px;				
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Frases</h1><hr/>
			<div class="row justify-content-center">
				<div class="col-md-12 divFrases">
					<?php 
						foreach($frases as $frase){
							echo $frase["id"]." - ".$frase["frase"]."<br/>";
						}
					?>
				</div>
				<div class="col-md-12">
					<ul class="pagination justify-content-center">
						<?php
							for($i = 0; $i < $num_de_pag; $i++){
								echo '<li class="page-item"><a href="?pagina='.($i + 1).'" class="page-link">'.($i + 1).'</a></li>';
						}
						?>
					</ul> 
				</div>
			</div>		
		</div>
	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
	</body>	
</html>