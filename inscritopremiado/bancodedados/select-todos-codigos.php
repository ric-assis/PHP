<?php 

$usuarios = "SELECT * from codigo ORDER BY id desc limit 5 ";

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

   /*while ( $exibir = mysqli_fetch_array($query)) {
   		$id = $exibir["id"];
   		$campo_1 = $exibir["campo_1"];
   		$campo_2 = $exibir["campo_2"];
      $campo_3 = $exibir["campo_3"];
      $campo_4 = $exibir["campo_4"];
      $campo_5 = $exibir["campo_5"];
  }*/

  