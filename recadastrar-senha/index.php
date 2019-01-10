<?php 
	session_start();
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){ 
		header("location:logado.php");
	}
?>


<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Esqueci minha senha</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style>
			body, 
			html{
				height:100%;
			}
			
			.container{
				height:100%;
			}			
		</style>
	</head>
	<body>
		<div class="container d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-md-12">
					<form id="frmLogar" method="POST" class="border rounded shadow">
						<div class="form-row p-2">
							<div class="col-md-12">
								<label for="nome">Nome</label>
								<input class="form-control" name="nome" type="text"/>
								<label for="senha">Senha</label>
								<input class="form-control" name="senha" type="password"/>
							</div>
							<div class="col-md-12 d-flex justify-content-end mt-2">
								<button id="btnLogar" class="btn btn-primary" >Logar</button>
							</div>
							<div class="col-md-12 recadastrar">
								<!-- Por padrão botões dentro do form são submit porém definindo seu type como button deixará de ser  -->
								<button id="btnRecadastrarSenha" class="btn btn-link" type="button" data-toggle="modal" data-target="#modalSenha">Esqueci minha senha</button>
							</div>
						</div>
					</form>					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="modal fade" id="modalSenha">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5>Alteração de senha</h5>
								</div>
								<div class="modal-body">
									<form method="POST" id="frmSenha">
										<div class="form-row">
											<div class="col-md-12">
												<input class="form-control mb-1" type="text" name="email" placeholder="Digite seu email" />
											</div>
											<div class="col-md-12 d-flex justify-content-end">
												<button class="btn btn-primary"  type="submit">Enviar</button>
											</div>	
										</div>
									</form>
								</div>
							</div>
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