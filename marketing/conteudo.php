<?php
	session_start();
	$nome = ucfirst($_GET["nome"]);	
	$nivel = ucfirst($_GET["nivel"]);
	
	$id = $_SESSION["id"];	
	
?>
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Marketing Multi-Nivel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>		
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<style type="text/css">
			@media only screen and (max-width: 576px){
				#cadastros{font-size: 17px !important;}		
			}
		</style>
	</head>
	<body>
		<div class="container">
			<?php require_once "nav.php"  ?>
			<div class="row  flex-column justify-content-center align-items-center border rounded bg-info pb-2 shadow ">
				<div class="col-md-6  d-flex justify-content-center align-items-center">
					<h2><?php echo $nome ?>, deseja realizar o cadastro de novos revedendores no seu grupo?</h2>										
				</div>
				<div class="col-6"><hr/></div>
				<div class="col-md-6 bordrder arounded dg-indigo d-flex justify-content-center align-items-center">						
					<a href="cadastrar.php?nome= <?php echo $nome ?> &nivel= <?php echo $nivel ?>" class="btn btn-primary mt-3">Realizar novos cadastros</a>
				</div>			
			</div>	
			<div id="senha">
			<?php require "primeiro-acesso.php" ?>										
			</div>
			<div class="row border justify-content-center align-items-center rounded bg-light shadow mb-3 mt-3 ">
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<a id="cadastros" class="btn btn-link pb-3 pt-3" data-toggle="modal" href="#filhos" style="font-size:20px;">Exibir meus revendedores cadastrados</a>
				</div>
			</div>
			
			<div class="modal fade" id="filhos">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header"><h4>Cadastros realizados</h4>
							<button class="close" data-dismiss="modal"><span>&times;</span></button>							
						</div>
						<div class="modal-body table-responsive" id="resultados">
							<table id="tabela" class="table table-striped table-hover">
								<thead class="thead-light">
									<tr>
										<th>Nome</th>
										<th>Inicio</th>
										<th>Email</th>
										<th>Nivel</th>
										<th>Qt. cad. diretos</th>
									</tr>
								</thead>							
								<tbody>
									
								</tbody>
							</table>							
						</div>
					</div>					
				</div>
			</div>
			
		</div>
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
		
	</body>
</html>