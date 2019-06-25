<?php 
include('header.php');
 ?>

<section id="area-principal">
	<div class="banner">
		<h1><img src="../images/logo.png" alt="Banner" id="banner-img"></h1>
	</div>
	<div class="container register" style="margin-bottom: 30px;">
        <div class="row">
            <h3 class="register-heading">Alterar minha conta</h3>
            <hr>
            <div id="cadastro-codigo" style="padding: 20px;">
                <form action="alterar.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nome" style="color: #fff; font-size: 1.1em;">Nome</label>
                                <input type="text" class="form-control" id="input-cod" placeholder="Seu nome" required name="nome">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nome" style="color: #fff; font-size: 1.1em;">E-mail</label>
                                <input type="email" class="form-control" id="input-cod" placeholder="Seu melhor e-mail" required name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" style="color: #fff; font-size: 1.1em;">Senha</label>
                                <input type="password" class="form-control" id="input-cod" placeholder="Sua senha antiga" name="senha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" style="color: #fff; font-size: 1.1em;">Nova Senha</label>
                                <input type="password" class="form-control" id="input-cod" placeholder="Sua senha antiga" name="nova-senha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" style="color: #fff; font-size: 1.1em;">Confirme a Nova Senha</label>
                                <input type="password" class="form-control" id="input-cod" placeholder="Sua senha antiga" name="confirma">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-cod btn-md" id="input-cod">Alterar Cadastro</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="botao-minha-conta" style="margin-top: 30px; margin-bottom: 30px;">
            <a href="index.php" id="minha-conta-btn" class="btn btn-block btn-outline-success">Voltar para a área de ADM</a>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>