
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Novelas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="assets/bootstrap.css" type="text/css" rel="stylesheet"/>	
		<link href="assets/style.css" type="text/css" rel="stylesheet"/>		
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Novelas</h1>
				</div>
				<div class="col-md-12 mb-2 d-flex justify-content-end">
					<form id="frmBusca" method="GET" class="d-flex no-wrap border rounded" style="position:relative; width:200px;" >						
						<input class="form-control border-0" style="width:100%;" type="search" name="txtBusca" placeholder="Buscar novela..."/> 
						<button class="btn btn-secondary" type="submit" style="background-image:url(search.png);width:35px;height:100%; position:absolute; right:0;"></button>			
					</form>					
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-end align-items-center">					
					<h5>Organizar por:</h5>					
					<input class="ml-2" type="radio" name="rdOrg" value="nome" data-toggle="tooltip" data-placement="bottom" title="Para ter efeito clique no botão da página desejada">Nome
					<input class="ml-2" type="radio" name="rdOrg" value="ano" data-toggle="tooltip" data-placement="bottom" title="Para ter efeito clique no botão da página desejada">Ano
					<input class="ml-2" type="radio" name="rdOrg" value="default" checked data-toggle="tooltip" data-placement="bottom" title="Para ter efeito clique no botão da página desejada">Cancelar
				</div>
			</div><hr/>
			<div class="row">
				<div id="conteudo" class="col-md-12">
					
				</div>
				<div class="col-md-2 border rounded shadow bg-light poup-up">
					<div id="mnuEditar" class="text-center">Editar</div><hr/> 
					<div id="mnuCancelar" class="text-center">Cancelar</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<ul class="pagination justify-content-center">
						
					</ul>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<form id="frmSalvar" method="POST" class="p-2 mt-2 shadow border-rounded" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-12 mb-2">
								<input name="capa" class="form-control-file" type="file" accept="image/*" data-toggle="tooltip" data-placement="bottom" title="Escolha uma imagem da novela"/>
							</div>
							<div class="col-md-8">
								<input class="form-control" name="novela" type="text" placeholder="Novela"/>	
							</div>
							<div class="col-md-4">
								<input class="form-control" name="ano" type="numeric" placeholder="Ano"/>
							</div>
							<div class="col-md-12">
								<textarea class="form-control mt-2" rows="5" placeholder="Resumo da novela" name="resumo"></textarea>
							</div>
							<div class="col-md-12 d-flex justify-content-end mt-3">
								<button id="btnSalvar" class="btn btn-primary mr-1" type="submit">Cadastrar novela</button>
								<button id="btnAtualizar" class="btn btn-primary">Atualizar novela</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
		<script src="conf.js" type="text/javascript"></script>
	</body>
</html>