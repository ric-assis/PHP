<?php 



$servidor= 'localhost'; //servidor do banco de dados

$usuario = 'marlonhe_root'; //usuário do banco de dados

$senha = 'admin'; //senha do banco de dados

$banco = 'marlonhe_inscritopremiado'; //nome do banco de dados



$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);



mysqli_set_charset($conexao, 'utf8');



if(mysqli_connect_errno()) {

	die("Falha ao realizar a conexão: ".mysqli_connect_errno());

}



?>