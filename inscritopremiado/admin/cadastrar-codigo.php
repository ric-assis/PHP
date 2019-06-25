<?php 

include('../bancodedados/conecta-db.php');

$cod_1 = strtoupper($_POST["cod_1"]);
$cod_2 = strtoupper($_POST["cod_2"]);
$cod_3 = strtoupper($_POST["cod_3"]);
$cod_4 = strtoupper($_POST["cod_4"]);
$cod_5 = strtoupper($_POST["cod_5"]);

$inserir = "INSERT INTO codigo ";

	$inserir .= "(campo_1,campo_2,campo_3,campo_4,campo_5) ";

	$inserir .= "VALUES ";

	$inserir .= "('$cod_1','$cod_2','$cod_3','$cod_4','$cod_5')";


$operacao_inserir = mysqli_query($conexao,$inserir);

	if(!$operacao_inserir) {

		echo"<script language='javascript' type='text/javascript'>alert('Opss, erro no banco de dados, estamos tentando corrigir!');window.location.href='index.php';</script>";

			die();

	} else {
		echo"<script language='javascript' type='text/javascript'>alert('Código cadastrado com sucesso...');window.location.href='index.php';</script>";
	}