<?php 
	
session_start();

include('bancodedados/conecta-db.php');



$usuario = $_POST["email"];



$login = "SELECT * ";

$login .= "FROM usuarios ";

$login.= "WHERE email = '{$usuario}'";



$acesso = mysqli_query($conexao,$login);

if(!$acesso) {

	die("Falha na consulta ao banco");

}



$informacao = mysqli_fetch_assoc($acesso);



if(empty($informacao)){

	echo"<script language='javascript' type='text/javascript'>alert('Opppssss...Este e-mail não está cadastrado');window.location.href='esqueci.php';</script>";

} else {
$usuarios = "SELECT * from usuarios ";

$usuarios .= "WHERE email = '{$usuario}' "; 

$query = mysqli_query($conexao,$usuarios);

  if(!$query) {

    die("Falha na consulta ao banco");

  }

   while ( $exibir = mysqli_fetch_array($query)) {
   		$senha = base64_decode($exibir["senha"]);
  }



$destinatario = $usuario; //Seu e-mail vai aqui

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "Lembrete de senha inscrito premiado" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Olá, parece que você esqueceu sua senha da nossa plataforma, não tem problema aqui está sua senha:\n"; //Aqui vai o telefone no e-mail
$body = $body . "Senha: " . $senha . "\n"; //Aqui vai enviar a Senha no e-mail
$body = $body . "===================================" . "\n";
$body = $body . "Para acessar é só entrar em inscritopremiado.tk . \n"; //Aqui vai a mensagem do e-mail

// envia o email
mail($destinatario, 'Lembrete de senha (INSCRITOPREMIADO)' , $body, "From: $meuemail\r\n");




// redireciona para a página depois do login 
echo"<script language='javascript' type='text/javascript'>alert('Sua senha foi enviada para seu e-mail');window.location.href='index.php';</script>";

}



mysqli_close($conexao);

 ?>