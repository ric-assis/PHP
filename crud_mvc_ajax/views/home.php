<?php
	
 ?>

<div class="container h-100">
	<h1 class="text-center">CRUD MVC</h1>	
	<hr/>
	<div class="row justify-content-center align-items-center h-100">
		<div class="col-md-8">
			<form method="POST" class="border rounded shadow p-2">
				<div class="form-row">
					<div class="col-md-3">
						<label name="id">ID</label>
						<input class="form-control" type="number" name="id" value="<?php echo $cliente->getId() ?>" readonly="true">		
					</div>
					<div class="col-md-9">					
						<label name="nome">Nome</label>
						<input class="form-control" type="text" name="nome" value="<?php echo $cliente->getNome() ?>">
					</div>
				</div>
				<div class="form-row">					
					<div class="col-md-12">					
						<label name="email">E-mail</label>
						<input class="form-control" type="text" name="email" value="<?php echo $cliente->getEmail() ?>">
					</div>
				</div>
				<div class="form-row">					
					<div class="col-md-12">					
						<label name="rua">Rua</label>
						<input class="form-control" type="text" name="rua" value="<?php echo $cliente->getRua() ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label name="bairro">Bairro</label>
						<input class="form-control" type="text" name="bairro" value="<?php echo $cliente->getBairro() ?>">		
					</div>
					<div class="col-md-6">					
						<label name="numero">Número</label>
						<input class="form-control" type="text" name="numero" value="<?php echo $cliente->getNumero() ?>">
					</div>
				</div><hr/>
				<div class="row">
					<div class="col-md-12 d-flex justify-content-center">
						<div class="btn-group mr-1">
							<button class="btn btn-lg btn-primary" title="Primeiro registro">&#8676;</button>
							<button class="btn btn-lg btn-primary" title="Anterior registro">&#8592;</button>
							<button class="btn btn-lg btn-primary" title="Proxímo registro">&#8594;</button>
							<button class="btn btn-lg btn-primary" title="Ültimo registro">&#8677;</button>					
						</div>
					
						<button class="btn btn-lg btn-success mr-1" type="submit" title="Salvar registro">&#10004;</button>
						<button class="btn btn-lg btn-primary mr-1" title="Novo registro">Novo</button>
						<button class="btn btn-lg btn-danger mr-1" title="Excluir registro">&#10008;</button>
						<button class="btn btn-lg btn-primary" title="Atualizar registro">&#9998;</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
