<?php include('header.php'); ?>
  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo_inicio.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="senha.php">
					<span class="login100-form-title">
						Digite seu e-mail, sua senha será enviada para ele
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Ops, digite um e-mail valido | voce@email.xyz">
						<input class="input100" type="text" name="email" placeholder="Seu e-mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Enviar por e-mail
						</button>
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