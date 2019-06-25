<?php 

include("bancodedados/conecta-db.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = base64_encode($_POST["pass"]);
$senha_confirmacao = base64_encode($_POST["confirma_pass"]);
$inscrito = $_POST["inscrito"];
$tipo = 1;


$user = "SELECT * from usuarios WHERE email = '{$email}'";

$query_users = mysqli_query($conexao,$user);

if(!$query_users) {

	die("Falha na consulta ao banco");

}

$informacao = mysqli_fetch_assoc($query_users);





if(empty($informacao)){


	if($senha == $senha_confirmacao){

	$inserir = "INSERT INTO usuarios ";

	$inserir .= "(nome, email, senha, inscrito, tipo) ";

	$inserir .= "VALUES ";

	$inserir .= "('$nome','$email','$senha','$inscrito','$tipo')";



	$operacao_inserir = mysqli_query($conexao,$inserir);

	if(!$operacao_inserir) {

		echo"<script language='javascript' type='text/javascript'>alert('Opss, erro no banco de dados, estamos tentando corrigir!');window.location.href='index.php';</script>";

			die();

	} else {

		echo"<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='index.php';</script>";

	}
	}

} else {

	echo"<script language='javascript' type='text/javascript'>alert('Opssss... Este usuário já esta cadastrado...');window.location.href='index.php';</script>";

}