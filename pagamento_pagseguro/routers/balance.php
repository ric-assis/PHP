<?php
/*
 * Efetua o pagamento com debito on-line e check-out transparente
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
$banco = addslashes($_POST["bank"]);
$produto = addslashes($_POST["product"]);
$valor = addslashes($_POST["valor"]);
$emailConsultor = addslashes($_POST["accountEmail"]);  


$debito = new \PagSeguro\Domains\Requests\DirectPayment\OnlineDebit();
$debito->setReceiverEmail('a.ric.c.assis@gmail.com');
// Atraves da referencia você sabera de quem é o pagamento
if(!empty($contaDeposito)){
    //Dados bancarios para deposito do consulto, esses serão mostrados só na referência do PagSeguro, o email do consultor será usado para avisa-lo do pagamento
    $debito->setReference('{"id":"001", "produto":"'.$produto.'", "email_consultor":"'.$emailConsultor.'", "Conta-deposito":"Banco = '.$_POST["accountBank"].'; Tipo da conta = '.$_POST["accountAgency"].'; '
        . 'Titular = '.$_POST["accountHouder"].'; CPF/CNPJ = '.$_POST["accountCPF_CNPJ"].'; Agência = '.$_POST["accountAgency"].'; Conta = '.$_POST["account"].'"}');            
}else{
    $debito->setReference('{"id":"001", "produto":"'.$produto.'"}');
}
$debito->setCurrency('BRL');



$debito->addItems()->withParameters(
   '001',//identificador do produto
    $produto, //Nome do produto
    intval(1), // Quantidade
    floatval($valor)
);

//Comprador
$debito->setSender()->setName($nome);
$debito->setSender()->setEmail($email);
$debito->setSender()->setDocument()->withParameters('CPF', $cpf);
$debito->setSender()->setPhone()->withParameters(
    $ddd,
    $telefone
);

//Send Hash e IP
$debito->setSender()->setHash($sHash);
$debito->setSender()->setIp($_SERVER['REMOTE_ADDR']);

//Endereço de cobrança 
$debito->setShipping()->setAddressRequired()->withParameters('FALSE');

//Banco de recebimento do dono da conta (receiver)
$debito->setBankName($banco);

//Forma de pagamento padrão para todos
$debito->setMode('DEFAULT');

//Recebe notificacao de status do pagamento do pagseguro 
$debito->setUrl('http://ariccassis.tk/pagamento_pagseguro/routers/notificacao-pagseguro.php');

//Registrar o pagamento e recebe a resposta do pagseguro
    try{
        $resposta = $debito->register(\PagSeguro\Configuration\Configure::getAccountCredentials());     
        //Da mesma forma que o boleto porem armazena a url com o local de pagamento pela conta do cliente     
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
 
