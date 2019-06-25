<?php include('header.php'); ?>
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo_inicio.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="login.php">
					<span class="login100-form-title">
						Faça seu Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Digite um e-mail ou nome de usuario">
						<input class="input100" type="text" name="email" placeholder="Usuário ou e-mail" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Você precisa digitar a senha">
						<input class="input100" type="password" name="pass" placeholder="Senha aqui">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Esqueceu sua
						</span>
						<a class="txt2" href="esqueci.php">
							Senha?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="criar-conta.php">
							Quero criar uma conta
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					<div class="text-center p-t-10">
						<a class="txt2" href="http://marlonhenrique.com" target="_blank">
							Marlon Henrique - Soluções em TI
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>