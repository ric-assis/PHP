<?php include('header.php'); ?>
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo_inicio.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="cadastro-user.php">
					<span class="login100-form-title">
						Faça seu cadastro
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Digite seu usuário neste campo">
						<input class="input100" type="text" name="nome" placeholder="Digite um usuário" required minlength="5" maxlength="12">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-book" area-hiden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Ops, digite um e-mail valido | voce@email.xyz">
						<input class="input100" type="text" name="email" placeholder="Seu melhor e-mail" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Você precisa digitar a senha">
						<input class="input100" type="password" name="pass" placeholder="Digite uma senha" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Você precisa digitar a senha">
						<input class="input100" type="password" name="confirma_pass" placeholder="Confirme sua senha" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Preencha um link">
						<input class="input100" type="text" name="inscrito" placeholder="Link do seu canal no youtube" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-youtube" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Cadastrar
						</button>
					</div>

					<div class="text-center p-t-50">
						<a class="txt2" href="http://marlonhenrique.com" target="_blank">
							Marlon Henrique - Soluções em TI
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>