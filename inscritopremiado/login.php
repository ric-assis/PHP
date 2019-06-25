<?php 
	
session_start();

include('bancodedados/conecta-db.php');



$usuario = $_POST["email"];

$senha = base64_encode($_POST["pass"]);

if(strpos($usuario,'@') !=0){
   $login = "SELECT * ";

$login .= "FROM usuarios ";

$login.= "WHERE email = '{$usuario}' and senha = '{$senha}'";



$acesso = mysqli_query($conexao,$login);

if(!$acesso) {

	die("Falha na consulta ao banco");

}



$informacao = mysqli_fetch_assoc($acesso);



if(empty($informacao)){

	echo"<script language='javascript' type='text/javascript'>alert('Opssss... tem algo errado, confira seu login e senha por favor e tente novamente...');window.location.href='index.php';</script>";

} else {


	$_SESSION["user_portal"] = $informacao["email"];
	
	$login = "SELECT * ";

	$login .= "FROM usuarios ";

	$login.= "WHERE email = '{$usuario}' and senha = '{$senha}'";



	$acesso = mysqli_query($conexao,$login);

	if(!$acesso) {

		die("Falha na consulta ao banco");

	}

	while ( $user = mysqli_fetch_array($acesso)) { 

        $tipo =  $user["tipo"]; 
     } 

     if($tipo == 0){
    	header("location: admin/index.php");
     } else {
     	header("location: clientes/index.php");
     }

}



mysqli_close($conexao);

} else {
	$login = "SELECT * ";

$login .= "FROM usuarios ";

$login.= "WHERE nome = '{$usuario}' and senha = '{$senha}'";



$acesso = mysqli_query($conexao,$login);

if(!$acesso) {

	die("Falha na consulta ao banco");

}



$informacao = mysqli_fetch_assoc($acesso);



if(empty($informacao)){

	echo"<script language='javascript' type='text/javascript'>alert('Opssss... tem algo errado, confira seu login e senha por favor e tente novamente...');window.location.href='index.php';</script>";

} else {


	$_SESSION["user_portal"] = $informacao["email"];
	
	$login = "SELECT * ";

	$login .= "FROM usuarios ";

	$login.= "WHERE nome = '{$usuario}' and senha = '{$senha}'";



	$acesso = mysqli_query($conexao,$login);

	if(!$acesso) {

		die("Falha na consulta ao banco");

	}

	while ( $user = mysqli_fetch_array($acesso)) { 

        $tipo =  $user["tipo"]; 
     } 

     if($tipo == 0){
    	header("location: admin/index.php");
     } else {
     	header("location: clientes/index.php");
     }

}



mysqli_close($conexao);

}


 ?>