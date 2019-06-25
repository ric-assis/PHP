<?php 

include('../bancodedados/conecta-db.php');

$url = $_POST["video"];

if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
  $values = $id[1];
} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
  $values = $id[1];
} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
  $values = $id[1];
} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
  $values = $id[1];
}
else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
    $values = $id[1];
} else {   
echo"<script language='javascript' type='text/javascript'>alert('Opss, o video não é um video do youtube');window.location.href='index.php';</script>";
}

$limpar = "delete from video";

$query = mysqli_query($conexao,$limpar);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

$inserir = "INSERT INTO video ";

	$inserir .= "(link) ";

	$inserir .= "VALUES ";

	$inserir .= "('$values')";


$operacao_inserir = mysqli_query($conexao,$inserir);

	if(!$operacao_inserir) {

		echo"<script language='javascript' type='text/javascript'>alert('Opss, erro no banco de dados, estamos tentando corrigir!');window.location.href='index.php';</script>";

			die();

	} else {
		echo"<script language='javascript' type='text/javascript'>alert('Video atualizado com sucesso...');window.location.href='index.php';</script>";
	}