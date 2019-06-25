<?php 

$usuarios = "SELECT * from usuarios ";

$usuarios .= "WHERE email = '{$meuemail}' "; 

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

   while ( $exibir = mysqli_fetch_array($query)) {
   		$senha = $exibir["senha"];
   		$nome = $exibir["nome"];
   		$inscrito = $exibir["inscrito"];
   		$vitorias = $exibir["vitorias"];
   		$id_usuario = $exibir["id"];
  }

  