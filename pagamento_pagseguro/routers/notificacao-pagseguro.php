<?php
/*
*Notifica a plataforma quanto ao status de pagamento do cliente,
* se o status notificado mudar para 3 o profissional é liberado para
* usar a conta PREMIUM
* 
* 
*Status
* 1- Aguardando pagamento
* 2- Em analise
* 3- Pago
* 4- Disponível
* 5- Em disputa
* 6- Dinheiro devolvido
* 7- Compra cancelada
* 8- Debitado (dinheiro devolvido pro cliente)
* 9- Retenção temporaria = changeback(O cliente diz q naao reconhece a compra etc)     
*/

//SEMPRE DEVE-SE INICIALIZAR O AUTOLOAD E A INICIALIZACAO DO PAGSEGURO EM TODAS AS PAGINAS ONDE ELE FOR USADO
require_once '../vendor/autoload.php';
require_once 'inicializacao-pagseguro.php';



try{
    //Verifica se o status mudou passando as credenciais
    
    if(PagSeguro\Helpers\Xhr::hasPost()) {       
        $resposta = PagSeguro\Services\Transactions\Notification::check(            
            \PagSeguro\Configuration\Configure::getAccountCredentials()
    
        ); 
        
        //Pega o novo status e a referencia pra saber quem efetuou o pagamento    
        $referencia = $resposta->getReference();
        $status = $resposta->getStatus();     
    } else {
        throw new \InvalidArgumentException($_POST);
    }   
   
    if($status == 3){               
       //O que irá atualizar no DB ou enviar email pro administrador sobre o recebimento com os dados do cliente
    }
} catch (Exception $ex) {
    echo json_encode(array('error' => true, 'msg' => $ex->getMessage()));
    exit(); 
}