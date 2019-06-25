<?php 

$usuarios = "SELECT * from video order by id desc limit 1";

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

   while ( $exibir = mysqli_fetch_array($query)) {
   		$link = $exibir["link"];
  }
