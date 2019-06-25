<?php 

$usuarios = "SELECT * from usuarios ";

$usuarios .= "WHERE tipo = 1 order by id desc limit 10 "; 

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

  /* while ( $exibir = mysqli_fetch_array($query)) {
   		$id = $exibir["id"];
   		$email = $exibir["email"];
   		$senha = $exibir["senha"];
   		$nome = $exibir["nome"];
   		$inscrito = $exibir["inscrito"];
   		$vitorias = $exibir["vitorias"];
  }*/

  