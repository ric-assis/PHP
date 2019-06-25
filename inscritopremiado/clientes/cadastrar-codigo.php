<?php 
include('header.php');

$cod_1 = $_GET["cod_1"];
$cod_2 = $_GET["cod_2"];
$cod_3 = $_GET["cod_3"];
$cod_4 = $_GET["cod_4"];
$cod_5 = $_GET["cod_5"];

$data = date('Y-m-d H:i:s');

include('../bancodedados/select-unico-usuario.php');
include('../bancodedados/select-unico-cod.php');


	$inserir = "INSERT INTO vitorias ";

	$inserir .= "(id_codigo, id_usuarios, data) ";

	$inserir .= "VALUES ";

	$inserir .= "('$id_cod','$id_usuario','$data')";



	$operacao_inserir = mysqli_query($conexao,$inserir);

	if(!$operacao_inserir) {

		echo"<script language='javascript' type='text/javascript'>alert('Opss, erro no banco de dados, estamos tentando corrigir!');window.location.href='index.php';</script>";

			die();

	} 
	
    $usuarios = "UPDATE usuarios set vitorias = vitorias+1 ";

$usuarios .= "WHERE email = '{$meuemail}' "; 

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }


include('../bancodedados/select-unico-usuario.php');
 ?>
<section id="area-principal">
    <div class="banner">
        <h1><img src="../images/logo.png" alt="Banner" id="banner-img"></h1>
    </div>
    <div class="container">
        <div class="user">
            <p style="float: right;">Olá <b><?php echo $nome; ?></b> | <a href="../logout.php">Sair</a></p>
        </div>
        <div id="video">
            <?php include('../bancodedados/select-video.php'); ?>
            <div class="only-mob">
                <iframe width="100%" height="300"
                <?php echo 'src="https://www.youtube.com/embed/'.$link.'"'; ?>
                frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
            </div>
            <div class="only-pc">
                <iframe width="100%" height="613"
                <?php echo 'src="https://www.youtube.com/embed/'.$link.'"' ;?>
                frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
            </div>
        </div>
        <div id="ganhou">
			<div class="texto-sucesso">
				<h3>Parabéns você acertou o código</h3>
			</div>
			<div class="imagem-sucessso">
				<img src="../images/sucesso.png" alt="sucesso">
			</div>
			<div class="texto-cod-sucesso">
				<h3>Código: <?php echo $cod_1.'-'.$cod_2.'-'.$cod_3.'-'.$cod_4.'-'.$cod_5; ?></h3>
			</div>
        </div>

    </div>
</section>

<?php include('footer.php'); ?>