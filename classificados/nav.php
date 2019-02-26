<?php
	require_once "connect.class.php";	
?>
<nav>
	<div class="container-fluid">
		<div class="mobile">
			<button id="btnMobile" class="border btn btn-lg mt-3 ml-3 mb-3" type="button"><div class="line"></div><div class="line"></div><div class="line"></div></button>
		</div>
		<div id="menu">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="col-md-5 pt-5">
					<form id="frmBuscar" method="GET" class="d-flex ml-1 mr-1 mb-0">						
						<input class="form-control form-control-lg border-0" name="txtBuscar" type="search" placeholder="Buscar produtos...">
						<button class="btn border-left d-flex align-self-center" type="submit"><img src="imagens/buscar.png"/></button>
					</form>					
				</div>			
				<div id="mnu_opcoes" class="col-md-5 border-left mt-5 d-flex align-items-center">					
					<?php //Seleciona o nome do usuario apartir da sessao
						if((isset($_SESSION["id"])) && (!empty($_SESSION["id"]))):
							$id = $_SESSION["id"];							
							$pdo = Connect::getPDO();
							$sql = $pdo->query("SELECT nome FROM usuario WHERE id=$id");
							if($sql->rowCount() > 0){
								$nome_usuario = $sql->fetch();
							}							
							echo '<a href="#" class="btnNav ml-3 mr-3 d-flex align-items-center"><img class="mr-1" src="imagens/user_logado.png"/>'.strtoupper($nome_usuario["nome"]).'</a>';
							echo '<a href="cadastrar.php" class="btnNav mr-3">Crie sua conta</a>';
							echo '<div>
									<ul id="mnu_produtos">
										<li class="btnNav mr-3">Meus produtos <img src="imagens/seta_abaixo.png" width="15px"/></li>
											<div id="submnu_produtos">
												<ul>
													<li class="d-flex flex-column">
														<a href="meus-produtos.php" class="btnNav ml-1">Minhas compras</a>
														<a href="meus-produtos.php" class="btnNav ml-1">Meus anuncios</a>			
													</li>
												</ul>
											</div>
										</li>		
									</ul>
								</div>';
							echo '<a href="sair.php" class="btnNav mr-3">Sair</a>';		
						else:
							echo '<a href="logar.php?pag-acessada=index.php" class="btnNav mr-3"><img src="imagens/user_logado.png"/> Entrar</a>';
							echo '<a href="cadastrar.php" class="btnNav">Crie sua conta</a>';
					?>		
					<?php
						endif;												
					?>					
				</div>	
			</div>
			<div class="row pb-5 mt-4">
				<div class="col-md-12 d-flex justify-content-center">
					<a id="lnk_anuncio" href="<?php if((isset($_SESSION["id"])) && (!empty($_SESSION["id"]))): ?>
							cadastrar_produto.php
						<?php else: ?>	
							logar.php?pag-acessada=cadastrar_produto.php
						<?php endif ?>							
					" class="btn-lg border">Iserir anuncio</a>	
				</div>
			</div>			
		</div>
	</div>
</nav>

