<?php 
include('../bancodedados/conecta-db.php');

$limpar = "delete from vitorias";

$query = mysqli_query($conexao,$limpar);

  if(!$query) {

    die("Falha na consulta ao banco");

  } else {
  	echo"<script language='javascript' type='text/javascript'>alert('vitórias apagadas com sucesso...');window.location.href='index.php';</script>";
  }

