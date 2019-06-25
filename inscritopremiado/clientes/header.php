<?php 
  session_start();
if(!isset($_SESSION["user_portal"])){
  header("location:../index.php");
}

include('../bancodedados/conecta-db.php');

$meuemail = $_SESSION["user_portal"];
 ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
<!------ Include the above in your HEAD tag ---------->
    <title>Inscrito Premiado</title>
    
    <script type="text/JavaScript" src="js/script.js"></script>
  </head>
  <body>
