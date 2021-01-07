<?php 
//SEMPRE DEVE-SE INICIALIZAR O AUTOLOAD E A INICIALIZACAO DO PAGSEGURO EM TODAS AS PAGINAS ONDE ELE FOR USADO

require_once 'vendor/autoload.php';
require_once 'routers/inicializacao-pagseguro.php';

//O pagseguro indica usar try catch ao gerar e verificar as credenciais
try{
    $credencial = PagSeguro\Services\Session::create(PagSeguro\Configuration\Configure::getAccountCredentials());
    $sessionId = $credencial->getResult();    
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">        
        <title>Gateway PagSeguro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">          
        <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>        
        <link href="assets/css/style.css" type="text/css" rel="stylesheet"/> 
	</head>
<body>
    <div class='container-fluid'>         
        
        <div class='row justify-content-center'>
            <div class='col-md-8'>
                <header>                    
                    <h3 class='text-center text-secondary'>Efetuar pagamento</h3>
                </header>
                
                <section>                    
                    <div class='row justify-content-center mt-5'>
                        <div class='col-md-8 pl-1 pr-1'>
                            <div class="d-flex justify-content-end mt-3">Valor a pagar: R$ 20,00 </div><hr/>
                            <form id="frmCheckout" method="POST" data-valor='20'  >
                                <div class="bg-light rounded p-3 mt-3">
                                    <label for='tipo-pessoa'>Forma de pagamento</label>
                                    <div class='form-group d-flex justify-content-between'>  
                                        <div class='text-center'>
                                            <span>Cartão de crédito</span>
                                            <div class='form-check d-flex align-items-center'>                                        
                                                <input class='form-check-input' type='radio' value='CREDIT_CARD' name='forma-pagamento'>                                        
                                                <label class='form-check-label' for='cartao'><img id='img-cartao' class='img-pag' src='assets/img/sprite-pagamento.png'/></label>
                                            </div>
                                        </div>
                                        
                                        <div class='text-center'>
                                            <span>Boleto</span>
                                            <div class='form-check d-flex align-items-center'>                                        
                                                <input class='form-check-input' type='radio' value='BOLETO' name='forma-pagamento' >                                        
                                                <label class='form-check-label' for='boleto'><img id='img-boleto' class='img-pag' src='assets/img/sprite-pagamento.png'/></label>
                                            </div>
                                         </div>
                                        <div class='text-center'>
                                            <span>Débito on-line</span>
                                            <div class='form-check d-flex align-items-center'>                                        
                                                <input class='form-check-input' type='radio' value='BALANCE' name='forma-pagamento' >                                        
                                                <label class='form-check-label' for='pagseguro'><img id='img-pgseguro' class='img-pag' src='assets/img/sprite-pagamento.png'/></label>
                                            </div>
                                        </div> 
                                    </div>
                                </div>                                
                                
                                <div class="bg-light rounded p-3">
                                    <div class='form-group'>
                                         <label for='nome'>Nome</label>
                                         <input class='form-control form-control-lg' type='text' name='nome' required/>                                    
                                    </div>

                                    <div class='form-group'>
                                        <label for='email'>Email</label>
                                        <input class='form-control form-control-lg' type='email' name='email' value="c91305457716891995273@sandbox.pagseguro.com.br" required/>                                    
                                    </div>

                                    <div class='form-group'>                                        
                                        <div class='form-row'>
                                            <div class='col-md-2'> 
                                                <label for='telefone'>DDD</label>                                                
                                                <input class='form-control form-control-lg' type='text' name='ddd' maxlength="2" required/>                                             
                                             </div>                                            
                                            <div class='col-md-5'>  
                                                <label for='telefone'>Telefone</label>   
                                                <input class='form-control form-control-lg' type='text' name='telefone' required/>                                                
                                            </div>                                    
                                            <div id="cpfBoletoBalance" class='col-md-5'>   
                                                <label for='cpf'>CPF</label>
                                                <input class='form-control form-control-lg' type='text' name='cpf-boleto-balance' />                                                
                                            </div>   
                                        </div>              
                                    </div> 
                                    
                                    <div id='divBanco'>
                                        <div class='form-group d-flex flex-column'>
                                          <label for='banco'>Seu banco</label>
                                          <select class='form-control form-control-lg custom-select' name='banco' >
                                              <option value='bancodobrasil'>Banco do Brasil</option>
                                              <option value='banrisul'>Banrisul</option>
                                              <option value='bradesco'>Bradesco</option>                                              
                                              <option value='itau'>Itaú</option>                                        
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-light rounded p-3 mt-3">
                                    <div class='form-group'>
                                        <label for='telefone'>CEP</label>                                       
                                        <div class='col-md-4'>                                            
                                            <input class='form-control form-control-lg' type='text' name='end[cep]' required/>                                             
                                        </div>                                            
                                    </div> 
                                    
                                    <div class='form-group'>                                        
                                        <div class='form-row'>                                            
                                            <div class='col-md-8'>  
                                                <label for='rua'>Rua</label>
                                                <input class='form-control form-control-lg' type='text' name='end[rua]' required/>                                             
                                             </div>
                                            <div class='col-md-4'>   
                                                <label for='numero'>Número</label>
                                                <input class='form-control form-control-lg' type='text' name='end[numero]' value="1448" required/>                                                
                                            </div>                                         
                                        </div>
                                    </div> 

                                    <div class='form-group'>
                                        <label for='complemento'>Complemento</label>
                                        <input class='form-control form-control-lg' type='text' name='end[complemento]' required/>                                    
                                    </div>
                                    
                                    <div class='form-group'>
                                        <label for='bairro'>Bairro</label>
                                        <input class='form-control form-control-lg' type='text' name='end[bairro]' required/>                                    
                                    </div>

                                    <div class='form-group'>                                        
                                        <div class='form-row'>                                            
                                            <div class='col-md-8'>  
                                                <label for='cidade'>Cidade</label>
                                                <input class='form-control form-control-lg' type='text' name='end[cidade]' required/>                                             
                                             </div>
                                            <div class='col-md-4'>   
                                                <label for='estado'>Estado</label>
                                                <input class='form-control form-control-lg' type='text' name='end[estado]' required/>                                                
                                            </div>                                         
                                        </div>
                                    </div> 
                                </div>  
                                
                                <div id="divFlags" class="bg-light rounded p-3 mt-3">                                   
                                    <div  class='form-group'>                                             
                                        <span class='text-secondary'>Bandeiras aceitas</span>  
                                        <div id='flags'>                                                                                      
                                        </div>
                                    </div>
                                </div>                     
                                    
                                <div id="divCard" class="bg-light rounded p-3 mt-3">                                                                                       
                                    <div  class='form-row form-group'> 
                                         <div class='col-md-7'>   
                                            <label for='titular'>Titular</label>
                                            <input class='form-control form-control-lg' type='text' name='titular' />                                                
                                        </div>     
                                        <div class='col-md-5'>   
                                            <label for='cpf'>CPF</label>
                                            <input class='form-control form-control-lg' type='text' name='cpf' />                                                
                                        </div>                                                                   
                                    </div>                                
                                    
                                    <div class='form-group'>                                        
                                        <div class='form-row'>                                           
                                            <div class='col-md-2'> 
                                                <label for='telefone'>DDD</label>                                                
                                                <input class='form-control form-control-lg' type='text' name='dddTitular' maxlength="2" />                                             
                                             </div>                                            
                                            <div class='col-md-5'>  
                                                <label for='telefone'>Telefone</label>   
                                                <input class='form-control form-control-lg' type='text' name='telefoneTitular' />                                                
                                            </div>         
                                        </div>              
                                    </div> 

                                    <div class='form-row form-group'>                                            
                                        <div class='col-md-9'>  
                                            <label for='numCartao'>Número do cartao</label>
                                            <input class='form-control form-control-lg' type='text' name='num-cartao' maxlength="19" />                                              
                                         </div>
                                        <div class='col-md-3'>   
                                            <label for='cvv'>CVV</label>
                                            <input class='form-control form-control-lg' type='text' name='cvv'  maxlength="4"/>                                                
                                        </div>                                         
                                    </div>

                               
                                    <div class='form-group d-flex flex-column'>
                                        <label for='parcelamento'>Parcelamento</label>
                                        <select class='form-control  form-control-lg custom-select' name='parcelamento' ></select>
                                    </div> 
                                
                                    <span> Validade</span>
                                    <div class='form-row form-group justify-content-between'> 
                                        <div class='col-md-5'>  
                                            <label for='mesValidade'>Mês</label>
                                            <select class='form-control form-control-lg custom-select' name='mes-validade' >
                                                <?php for($i = 1; $i < 13; $i++): ?>
                                                    <option value="<?php echo $i < 10? '0'.$i : $i?>"><?php echo $i < 10? '0'.$i : $i?></option>
                                                <?php endfor ?>
                                            </select>                                              
                                         </div>
                                        <div class='col-md-5'>   
                                            <label for='anoValidade'>Ano</label>
                                            <select class='form-control form-control-lg custom-select'  name='ano-validade' >
                                                <?php for($i = date('Y'); $i < (date('Y') + 20); $i++): ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php endfor ?>
                                            </select>                                                
                                        </div>                                         
                                    </div>
                                </div>   
                                
                                <input type="hidden" name="titular_conta" value="Alonso Ricardo">
                                <input type="hidden" name="tipo" value="C/C">
                                <input type="hidden" name="banco" value="Brasil">
                                <input type="hidden" name="agencia" value="123-4">
                                <input type="hidden" name="conta" value="5678-9">
                                <input type="hidden" name="cpf_cnpj" value="123.456.789-00">                                
                                <input type="hidden" name="produto" value="Exemplo Pagamento">
                                <input type="hidden" name="email_consultor" value="a.ric.c.assis@gmail.com">
    
                                <div class='form-group d-flex justify-content-center mt-3'>
                                    <button id="payment"  class='btn btn-success' type="submit">Efetuar pagamento</button>
                                    <div id="imgAguarde"><img src="assets/img/carregando.gif" width="50"/></div>
                                </div>                                
                            </form>   
                        </div>                    
                    </div>                   
                </section>
            </div>
        </div>        
		<!-- O primeiro script é para o pagamento real e o segundo para o teste sandox, esse script chama a api do pagseguro -->
	   <!--<script src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js" type="text/javascript"></script>-->
	   <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js" type="text/javascript"></script>
	   <script>
		   PagSeguroDirectPayment.setSessionId(<?php echo $sessionId ?>);//O id da sessao deve ser enviado ao pagseguro
	   </script>
		<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>        
        <script src="assets/js/jquery.mask.min.js" type="text/javascript"></script>         
        <script src="assets/js/script.js" type="text/javascript"></script>       
    </body>
</html>
