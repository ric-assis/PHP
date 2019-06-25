<?php
/*
 * Efetua o pagamento com boleto e check-out transparente
 */
    

require_once '../vendor/autoload.php';
require_once 'inicializacao-pagseguro.php';

$sHash = addslashes($_POST["sHash"]);
$nome = addslashes($_POST["name"]);
$email = addslashes($_POST["email"]);
$ddd = addslashes($_POST["ddd"]);
$telefone = str_replace('-', '', $_POST["telephone"]);
$forma_pagamento = addslashes($_POST["form_pg"]);
$cep = str_replace('-', '', $_POST["cep"]);
$rua = addslashes($_POST["street"]);
$numero = addslashes($_POST["numberHouse"]);
$complemento = addslashes($_POST["complement"]);
$bairro = addslashes($_POST["neighbordhood"]);
$cidade = addslashes($_POST["city"]);
$estado = addslashes($_POST["state"]);
$cpf_msk = str_replace('.', '', $_POST["cpf"]);
$cpf = str_replace('-', '', $cpf_msk);
$produto = addslashes($_POST["product"]);
$valor = addslashes($_POST["valor"]);
$emailConsultor = addslashes($_POST["accountEmail"]);  

$boleto = new \PagSeguro\Domains\Requests\DirectPayment\Boleto();

//$boleto->setMethod('boleto');
$boleto->setReceiverEmail('a.ric.c.assis@gmail.com');
// Atraves da referencia você sabera de quem é o pagamento
if(!empty($contaDeposito)){
    //Dados bancarios para deposito do consulto, esses serão mostrados só na referência do PagSeguro
    $boleto->setReference('{"id":"001", "produto":"'.$produto.'", "email_consultor":"'.$emailConsultor.'", "Conta-deposito":"Banco = '.$_POST["accountBank"].'; Tipo da conta = '.$_POST["accountAgency"].'; '
        . 'Titular = '.$_POST["accountHouder"].'; CPF/CNPJ = '.$_POST["accountCPF_CNPJ"].'; Agência = '.$_POST["accountAgency"].'; Conta = '.$_POST["account"].'"}');            
}else{
    $boleto->setReference('{"id":"001", "produto":"'.$produto.'"}');
}
$boleto->setCurrency('BRL');



$boleto->addItems()->withParameters(
    '001',//identificador do produto
    $produto, //Nome do produto
    intval(1), // Quantidade
    floatval($valor)
);

//Comprador
$boleto->setSender()->setName($nome);
$boleto->setSender()->setEmail($email);
$boleto->setSender()->setDocument()->withParameters('CPF', $cpf);
$boleto->setSender()->setPhone()->withParameters(
    $ddd,
    $telefone
);

//Send Hash e IP
$boleto->setSender()->setHash($sHash);
$boleto->setSender()->setIp($_SERVER['REMOTE_ADDR']);

$boleto->setShipping()->setAddressRequired()->withParameters('FALSE');

//Forma de pagamento padrão para todos
$boleto->setMode('DEFAULT');

//Recebe notificacao de status do pagamento do pagseguro 
$boleto->setUrl('http://ariccassis.tk/pagamento_pagseguro/routers/notificacao-pagseguro.php');

//Registrar o pagamento e recebe a resposta do pagseguro
    try{
        $resposta = $boleto->register(\PagSeguro\Configuration\Configure::getAccountCredentials());         
         //link é um array com a url do boleto para q possa mostrar na tela além do codigo do boleto caso queira mostra-lo
		 $link = array(
            'link' => $resposta->getPaymentLink(),
            'codigo' => $resposta->getCode()         
        );
        echo json_encode($link);        
        exit();
    } catch (Exception $ex) {
        echo json_encode(array('error' => true, 'msg' => $ex->getMessage()));
        exit();
    }
