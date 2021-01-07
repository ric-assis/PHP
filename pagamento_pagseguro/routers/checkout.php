<?php
/*
 * Efetua o pagamento com cartão e check-out transparente
 */
  
//SEMPRE DEVE-SE INICIALIZAR O AUTOLOAD E A INICIALIZACAO DO PAGSEGURO EM TODAS AS PAGINAS ONDE ELE FOR USADO
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
$parcelamento = explode(';', $_POST["portion"]);
$titular = addslashes($_POST["holder"]);
$dddTitular = addslashes($_POST["dddHolder"]);
$telefoneTitular = str_replace('-', '',$_POST["telephoneHolder"]);
$dataNascimento = addslashes($_POST["birthDate"]);
$num_cartao = str_replace('-', '', $_POST["number"]);
$cvv = addslashes($_POST["cvv"]);
$mes_vencimento = addslashes($_POST["month"]);
$ano_vencimento = addslashes($_POST["year"]);
$token_cartao = addslashes($_POST["token"]);  
$bandeira = addslashes($_POST["flags"]);
$produto = addslashes($_POST["product"]);
$valor = addslashes($_POST["valor"]);
$emailConsultor = addslashes($_POST["accountEmail"]);  

//Instancia a classe de cartao do pagseguro, é através de seus metodos que enviaremos/receberremos as mensagens do pagseguro 
$creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
$creditCard->setReceiverEmail('a.ric.c.assis@gmail.com');//Email do dono da conta do pagseguro

if(!empty($contaDeposito)){
	// Atraves da referencia você sabera de quem é o pagamento, a referencia poderia ser um codigo criado para cada produto, porem vamos informar dados do compador
    //Dados bancarios para deposito do adm, esses serão mostrados só na referência do PagSeguro, ou seja nos dados de cada venda dentro do site do pagseguro
    $creditCard->setReference('{"id":"001", "produto":"'.$produto.'", "email_consultor":"'.$emailConsultor.'", "Conta-deposito":"Banco = '.$_POST["accountBank"].'; Tipo da conta = '.$_POST["accountAgency"].'; '
        . 'Titular = '.$_POST["accountHouder"].'; CPF/CNPJ = '.$_POST["accountCPF_CNPJ"].'; Agência = '.$_POST["accountAgency"].'; Conta = '.$_POST["account"].'"}');            
}else{
    $creditCard->setReference('{"id":"001", "produto":"'.$produto.'"}');
}
$creditCard->setCurrency('BRL');//Moeda utilizada na transação

$creditCard->addItems()->withParameters( //Itens comprados
    '001',//identificador do produto
    $produto, //Nome do produto
    intval(1), // Quantidade
    floatval($valor)
);

//Dados do Comprador, são obrigatórios
$creditCard->setSender()->setName($nome);
$creditCard->setSender()->setEmail($email);
$creditCard->setSender()->setDocument()->withParameters('CPF', $cpf);
$creditCard->setSender()->setPhone()->withParameters(
    $ddd,
    $telefone
);

//Send Hash e IP obrigatório na transação com cartão
$creditCard->setSender()->setHash($sHash);
$creditCard->setSender()->setIp($_SERVER['REMOTE_ADDR']);

//Endereço de pagamento nessa ordem de envio dos dados
$creditCard->setShipping()->setAddress()->withParameters(
    $rua,
    $numero,
    $bairro,
    $cep,
    $cidade,
    $estado,
    'BRA',
    $complemento
);

//Endereço de recebimento nessa ordem
$creditCard->setBilling()->setAddress()->withParameters(
    $rua,
    $numero,
    $bairro,
    $cep,
    $cidade,
    $estado,
    'BRA',
    $complemento
);

//Pagamento deve ser informado o token do cartao e as parcelas sendo numero de parcelas e o valor das parcelas. 
$creditCard->setToken($token_cartao);
$creditCard->setInstallment()->withParameters(
    $parcelamento[0],
    $parcelamento[1]
    //$parcelamento[2]        
);

//Dados do cartao
$creditCard->setHolder()->setName($titular);
$creditCard->setHolder()->setDocument()->withParameters('CPF', $cpf);
$creditCard->setHolder()->setPhone()->withParameters(
    $dddTitular,
    $telefoneTitular
);
$creditCard->setHolder()->setBirthDate($dataNascimento);

//Forma de pagamento padrão para todos
$creditCard->setMode('DEFAULT');

//Recebe notificacao de status do pagamento do pagseguro alterando o DB de a receber para recebido por ex.. 
$creditCard->setNotificationURL('http://ariccassis.tk/pagamento_pagseguro/routers/notificacao-pagseguro.php');

//Registrar o pagamento e recebe a resposta do pagseguro, executar dentro de um tray/catch
try{
    $resposta = $creditCard->register(\PagSeguro\Configuration\Configure::getAccountCredentials());
    echo json_encode($resposta);
    exit();
} catch (Exception $ex) {
    echo json_encode(array('error' => true, 'msg' => $ex->getMessage()));
    exit();
}
