<?php 
include('header.php');
include('../bancodedados/select-video.php');
 ?>

<section id="area-principal">
	<div class="banner">
		<h1><img src="../images/logo.png" alt="Banner" id="banner-img"></h1>
	</div>
	<div class="container register" style="margin-bottom: 30px;">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#codigos" role="tab" aria-controls="codigos" aria-selected="true">Códigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuários Cadastrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vencedores" role="tab" aria-controls="vencedores" aria-selected="false">Vencedores</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-align form-new" id="codigos" role="tabpanel" aria-labelledby="home-tab">
                        	<div class="container">
                            	<h3 class="register-heading">Cadastre um novo código</h3>
                            	<hr style="color: #fff;">
                            	<div id="cadastro-codigo">
                            		<form action="cadastrar-codigo.php" method="POST">
                            			<div class="row">
                            				<div class="col-md-2 col-6">
                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-cod" placeholder="XNJ45" required maxlength="5" size="5" name="cod_1" minlength="5">
											    </div>
                            				</div>
                            				<div class="col-md-2 col-6">
                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-cod" placeholder="SDFKS" required maxlength="5" size="5" name="cod_2" minlength="5">
											    </div>
                            				</div>
                            				<div class="col-md-2 col-6">
                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-cod" placeholder="23HJS" required maxlength="5" size="5" name="cod_3" minlength="5">
											    </div>
                            				</div>
                            				<div class="col-md-2 col-6">
                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-cod" placeholder="LKSRE" required maxlength="5" size="5" name="cod_4" minlength="5">
											    </div>
                            				</div>
                            				<div class="col-md-2 col-12">
                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-cod" placeholder="MHS57" required maxlength="5" size="5" name="cod_5" minlength="5">
											    </div>
                            				</div>
                            				<div class="col-md-2 col-12">
                            					<div class="form-group">
												    <button type="submit" class="btn btn-cod btn-md" id="input-cod">Cadastrar</button>
											    </div>
                            				</div>
                            			</div>
                            		</form>
                            	</div>
                            	<div id="ultimos-cadastrados">
                            		<h3 class="register-heading">Ultimos códigos cadastrados</h3>
                            		<hr>
                            		<?php 
                                        include('../bancodedados/select-todos-codigos.php');
                                        while ( $exibir = mysqli_fetch_array($query)) {
                                        $id = $exibir["id"];
                                        $campo_1 = $exibir["campo_1"];
                                        $campo_2 = $exibir["campo_2"];
                                        $campo_3 = $exibir["campo_3"];
                                        $campo_4 = $exibir["campo_4"];
                                        $campo_5 = $exibir["campo_5"];
                                     ?>
                            			<p class="mostrar-codigos"><span>Código: </span><?php echo $campo_1.'-'.$campo_2.'-'.$campo_3.'-'.$campo_4.'-'.$campo_5; ?></p>
                            		<?php } ?>
                            		<hr>
                            	</div>
                            	  
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="video" role="tabpanel" aria-labelledby="profile-tab">
                        	<div class="container">
                            	<h3  class="register-heading">Vídeo</h3>
                            	<hr style="color: #fff;">
                            	<div id="cadastro-codigo">
                            		<form action="definir-video.php" method="POST">
                    					<label for="video" style="color: #fff; font-size: 1.1em; font-weight: 500;">Cole a URL do vídeo do Youtube no campo abaixo</label>
                            			<div class="row">
                            				<div class="col-md-8 col-12">                            					<div class="form-group">
												    <input type="text" class="form-control" id="input-video" placeholder="URL aqui!" required name="video">
											    </div>
                            				</div>
                            				<div class="col-md-4 col-12">
                            					<div class="form-group">
												   <button type="submit" class="btn btn-cod btn-md" id="input-cod">Definir video</button>
											    </div>
                            				</div>
                            			</div>
                            		</form>
                            		<hr>
                            		<p class="titulo-video">Ultimo video adicionado</p>
                            		<hr>
                                    <div class="only-mob">
                                		<iframe width="100%" height="300"
    									<?php echo 'src="https://www.youtube.com/embed/'.$link.'"'; ?>
    									frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
                                    </div>
                                    <div class="only-pc">
                                        <iframe width="100%" height="613"
                                        <?php echo 'src="https://www.youtube.com/embed/'.$link.'"'; ?>
                                        frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
                                    </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="usuarios" role="tabpanel" aria-labelledby="profile-tab">
                        	<div class="container">
                            	<h3  class="register-heading">Ultimos usuários Cadastrados</h3>
                            	<hr>
                            	<div class="table-responsive text-nowrap">
								  <table class="table" style="background: #fff;">
								    <thead>
								      <tr>
								        <th scope="col">#</th>
								        <th scope="col">E-mail</th>
								        <th scope="col">Usuário</th>
								        <th scope="col">Canal</th>
								        <th scope="col">Numero de vitórias</th>
								      </tr>
								    </thead>
								    <tbody>
							    	<?php 
                                        include('../bancodedados/select-usuarios.php');
                                        while ( $exibir = mysqli_fetch_array($query)) {
                                            $id = $exibir["id"];
                                            $email = $exibir["email"];
                                            $nome = $exibir["nome"];
                                            $inscrito = $exibir["inscrito"];
                                            $vitorias = $exibir["vitorias"];
                                    ?>
								      <tr>
								        <td scope="row"><?php echo $i; ?></td>
								        <td><?php echo $email; ?></td>
								        <td><?php echo $nome; ?></td>
								        <td><a href="<?php echo $inscrito; ?>" target="_blank">LINK</a></td>
								        <td><?php echo $vitorias; ?></td>
								      </tr>
							    	<?php } ?>
								    </tbody>
								  </table>

								</div>
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="vencedores" role="tabpanel" aria-labelledby="profile-tab">
                        	<div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3  class="register-heading">Últimos vencedores</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="limpar-lista.php" class="btn btn-limpar">Limpar a lista</a>
                                    </div>
                                </div>
                            	<hr>
								<?php 
                                    include('../bancodedados/select-todas-vitorias.php');
                                    while ( $exibir = mysqli_fetch_array($query)) {
                                        $id = $exibir["id"];
                                        $id_codigo = $exibir["id_codigo"];
                                        $id_usuarios = $exibir["id_usuarios"];
                                        $data = $exibir["data"];

                                        $user = "SELECT * from usuarios ";

                                        $user .= "WHERE id = '{$id_usuarios}' "; 

                                        $query_user = mysqli_query($conexao,$user);

                                          if(!$query_user) {

                                            die("Falha na consulta ao banco");

                                          }

                                           while ( $exibir_user = mysqli_fetch_array($query_user)) {
                                                $email = $exibir_user["email"];
                                                $senha = $exibir_user["senha"];
                                                $nome = $exibir_user["nome"];
                                                $inscrito = $exibir_user["inscrito"];
                                                $vitorias = $exibir_user["vitorias"];
                                          }
                                 ?>
                        			<p class="mostrar-vencedor"><span>Usuário: </span><?php echo $nome; ?> |<span> E-mail: </span><?php echo $email; ?> | <span>Inscrito? </span><?php echo $inscrito; ?> | <span>Data e hora:</span> <?php echo date('d/m/Y H:i:s', strtotime($data)); ?></p>
                        		<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div id="botao-minha-conta" style="margin-top: 30px; margin-bottom: 15px;">
            <a href="minha-conta.php" id="minha-conta-btn" class="btn btn-block btn-outline-success">Alterar minha conta</a>
        </div>
        <div id="botao-minha-conta" style=" margin-bottom: 20px;">
            <a href="../logout.php" id="minha-conta-btn" class="btn btn-block btn-outline-danger">Sair do sistema</a>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>