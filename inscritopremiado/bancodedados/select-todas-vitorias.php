<?php 

$usuarios = "SELECT * from vitorias ";

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

  /* while ( $exibir = mysqli_fetch_array($query)) {
   		$id = $exibir["id"];
   		$id_codigo = $exibir["id_codigo"];
   		$id_usuarios = $exibir["id_usuarios"];
      $data = $exibir["data"];
  }*/
