$(function(){         
   
  
  
    /*-------------CONTA PREMIUM---------*/
    //Auto Preenchimento dos dados do usuario
    if($('body #frmCheckout').length){        
        $('input[name="telefone"]').mask('00000-0000');  
        $('input[name="num-cartao"]').mask('0000-0000-0000-0000');
        $('input[name="end[cep]"]').mask('00000-000'); 
        $('input[name="cpf"]').mask('000.000.000-00', {reverse: true});
        $('input[name="cpf-boleto-balance"]').mask('000.000.000-00', {reverse: true});
        $('input[name="telefoneTitular"]').mask('00000-0000');      

    }
    
    //Recebimento do endereço pelo cep
    $('input[name="end[cep]"]').change(function(){
        var cep = $(this).val();
        cep = cep.replace("-", '');
        $.get("https://api.postmon.com.br/v1/cep/" + cep, function(response){						
            $('input[name="end[rua]"]').val(response.logradouro);            
            $('input[name="end[complemento]"]').val(response.complemento);
            $('input[name="end[bairro]"]').val(response.bairro);
            $('input[name="end[cidade]"]').val(response.cidade);
            $('input[name="end[estado]"]').val(response.estado);
        });        
    });    
    
    if($('body #frmCheckout').length){
        //Peg o numero do cartao e preenche a bandeira e parcelas
        var flags;  //Bandeira do cartao         
        var valor = $("#frmCheckout").attr('data-valor'); //Valor a pagar
        var numCart;
        $('input[name="num-cartao"]').change(function(){  
           numCart =  $(this).val();      
           numCart = numCart.replace(/-/g, '');//Retira todos os traços

           if(numCart.length > 5){
               PagSeguroDirectPayment.getBrand({
                   cardBin: numCart,
                   success: function(response){
                       flags = response.brand.name;
                       $('input[name="cvv"]').attr('maxlength', response.brand.cvvSize);        

                       PagSeguroDirectPayment.getInstallments({
                            amount: valor ,
                            brand: flags,
                           // maxInstallmentNoInterest:3, //Parcelas sem juros não está sendo aceito pelo pagseguro
                            //noInterestInstallmentQuantity:3,
                            success: function(response){                            
                                if(response.error === false){
                                    var parcelas = response.installments[flags];
                                    var html;

                                    for(var i = 0; i < parcelas.length; i++){
                                       var value = parseFloat(parcelas[i].installmentAmount).toFixed(2);

                                       value = value.toString();
                                       value = value.replace(".", ",");                                  

                                        var val = parcelas[i].quantity + ';' + parcelas[i].installmentAmount;
                                        if(parcelas[i].interestFree === true){
                                            val += ';true';
                                        }else{
                                            val += ';false';
                                        }                                   
                                        html += '<option value="' + val + '">' + parcelas[i].quantity + 'X de R$' + value + '</option>';
                                    }
                                    $('select[name="parcelamento"]').html(html);
                                }
                            },
                            error: function(response){
                                alert('Ocorreu um erro: ' + response);
                            },
                            complete: function(response){

                            }               
                        });

                   },
                   error: function(response){
                       alert('Erro: ' + response);
                   },
                   complete: function(response){

                   }               
               });
           } 
        });     
    }
    //Seleciona as bandeiras disponiveis
    $('input[name="forma-pagamento"]').click(function(){        
        var pgForm = $('input[name="forma-pagamento"]:checked').val();       
        
        if(pgForm == 'BALANCE' ){
            $('#divBanco').css('display', 'block');
        }else{
            $('#divBanco').css('display', 'none');
        }
        
        if(pgForm == 'CREDIT_CARD'){  //você pode verificar os nomes das bandeiras pelo console          
           PagSeguroDirectPayment.getPaymentMethods({ //getPaymentMethods exibe no console todas as informações dos tipos aceitos de cartões, bandeiras etc.                 
               success:function(response){                   
                  var cards = response.paymentMethods.CREDIT_CARD.options;
                  var cardsAvailable = ['VISA', 'MASTERCARD', 'ELO', 'HIPERCARD', 'AMEX', 'AURA', 'BRASILCARD', 
                        'CABAL', 'DINERS', 'FORTBRASIL', 'GRANDCARD', 'MAIS', 'PERSONALCARD', 'PLENOCARD', 'SOROCRED', 'ALECARD'];
                  var html='';
                 
                    for(i in cardsAvailable){
                        if(cards[cardsAvailable[i]].status == 'AVAILABLE'){
                            html += '<img src="https://stc.pagseguro.uol.com.br' + cards[cardsAvailable[i]].images.MEDIUM.path + '" data-card="' + cards[cardsAvailable[i]].name + '"/>';                                
                        }  
                        $('#divFlags').css('display', 'block');
                        $('#flags').html(html);  
                    }
                    
                                     
                },
                error:function(response){
                   alert("Ocorreu um erro: " + response);
                }
            });            
            
            $('#divCard').css('display', 'block');
            $('#cpfBoletoBalance').css('display', 'none');            
        }else{
            $('#divFlags').css('display', 'none');
            $('#divCard').css('display', 'none');
            $('#cpfBoletoBalance').css('display', 'block');
        }       
    });
   
    //Envia os dados para o PagSeguro
    if($('body #frmCheckout').length){
        var cardToken;  //Quando passa o numero do cartao ao pagseguro ele retorna um token que deve ser guardado e enviado junto com o cadastro  
       $('#frmCheckout').on('submit', function(e){
           e.preventDefault();
           
           $('#imgAguarde').css('display', 'block');
           
           var sHash = PagSeguroDirectPayment.getSenderHash(); //é um hash usado para identificar quem está processando a compra

           var name = $('input[name="nome"]').val();
           var email = $('input[name="email"]').val();
           var ddd = $('input[name="ddd"]').val();
           var telephone = $('input[name="telefone"]').val();  

           var cep = $('input[name="end[cep]"]').val();
           var street = $('input[name="end[rua]"]').val();            
           var complement = $('input[name="end[complemento]"]').val();
           var neighborhood = $('input[name="end[bairro]"]').val();
           var numberHouse = $('input[name="end[numero]"]').val();
           var city = $('input[name="end[cidade]"]').val();
           var state = $('input[name="end[estado]"]').val();
           
           var bank = $('select[name="banco"]').val(); 
           
           var form_pg = $('input[name="forma-pagamento"]:checked').val();
           var cpf = $('input[name="cpf"]').val();
           var cpfBoletoBalance = $('input[name="cpf-boleto-balance"]').val();
           var portion = $('select[name="parcelamento"]').val();

           var holder = $('input[name="titular"]').val();
           var number = numCart;
           var dddHolder = $('input[name="dddTitular"]').val(); 
           var telephoneHolder = $('input[name="telefoneTitular"]').val();
           var birthDate = '01/10/1979';//Pode se usar essa data fixa como o pagseguro indica
           var cvv = $('input[name="cvv"]').val();        
           var month = $('select[name="mes-validade"]').val();
           var year = $('select[name="ano-validade"]').val(); 
           
           var accountHouder = $('input[name="titular_conta"]').val(); 
           var accountType = $('input[name="tipo"]').val(); 
           var accountBank = $('input[name="banco"]').val(); 
           var accountAgency = $('input[name="agencia"]').val(); 
           var account = $('input[name="conta"]').val(); 
           var accountCPF_CNPJ = $('input[name="cpf_cnpj"]').val();            
           var accountEmail = $('input[name="email_consultor').val();
           var product = $('input[name="produto"]').val(); 
           
           if(number != '' && cvv != '' && month != '' && year != '' && form_pg === 'CREDIT_CARD'){
                cartaoDeCredito(sHash, name, email, ddd, telephone, form_pg, cep, street, numberHouse, complement, 
                    neighborhood, city, state, cpf, portion, holder, dddHolder, telephoneHolder, birthDate, number, cvv, month, year, accountHouder,
                    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product);          
            }else if(form_pg === 'BOLETO'){   
                boleto(sHash, name, email, ddd, telephone, form_pg, cep, street, numberHouse, complement, neighborhood, city, state, cpfBoletoBalance, accountHouder,
                    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product);                           
            }else if(form_pg === 'BALANCE'){   
                tef(sHash, name, email, ddd, telephone, form_pg, bank, cep, street, numberHouse, complement, neighborhood, city, state, cpfBoletoBalance, accountHouder,
                    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product);                
            }else{
                $('#divBanco').css('display', 'none');
            }
        });  
    }
    
	//Pagamento com cartao
    function cartaoDeCredito(sHash, name, email, ddd, telephone, form_pg, cep, street, numberHouse, complement, 
    neighborhood, city, state, cpf, portion, holder, dddHolder, telephoneHolder, birthDate, number, cvv, month, year, accountHouder,
    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product){
        //Envia os dados do cartao para criar o token
		PagSeguroDirectPayment.createCardToken({
            cardNumber:number,
            brand:flags,
            cvv:cvv,
            expirationMonth:month,
            expirationYear:year,
            success:function(response){
            cardToken = response.card.token; //Se tive sucesso armazena o tokem do cartao na variavel 

               $.ajax({
                 type:'POST',
                 url: 'routers/checkout.php',
                 data:{sHash:sHash,//O hash de identificaçào do proprietario da conta deve ser enviado
                      name:name,
                      email:email,
                      ddd:ddd,
                      telephone:telephone,
                      form_pg:form_pg,
                      cep:cep,
                      street:street,
                      numberHouse:numberHouse,
                      complement:complement,
                      neighbordhood:neighborhood,
                      city:city,
                      state:state,
                      cpf:cpf,
                      portion:portion,
                      holder:holder,
                      dddHolder:dddHolder,
                      telephoneHolder:telephoneHolder,
                      birthDate:birthDate,
                      number:number,
                      cvv:cvv,
                      month:month,
                      year:year,
                      flags:flags,                           
                      token:cardToken,
                      accountHouder:accountHouder,
                      accountType:accountType,
                      accountBank:accountBank,
                      accountAgency:accountAgency, 
                      account:account, 
                      accountCPF_CNPJ:accountCPF_CNPJ,  
                      accountEmail: accountEmail,
                      product:product,
                      valor:valor
                  },
                  dataType:'json',
                  success:function(response){
                      $('#imgAguarde').css('display', 'none');
                      if(response.error == true){//Retorna error ou em branco caso esteja tudo certo
                          alert('Ocorreu um erro: ' + response.msg);
                      }else{
                          alert('Um email foi enviado pra você com os detalhes do pagamento. Obrigado pela compra.');                          
                      }
                  }
               });
           },
           error:function(response){
              alert('Ocorreu um erro: ' + response);
           },
           complete:function(response){
           }    
       });    
    }
    
	//Pagamento com boleto
    function boleto(sHash, name, email, ddd, telephone, form_pg, cep, street, numberHouse, complement, neighborhood, city, state, cpfBoletoBalance, accountHouder,
    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product){
        //No boleto somente envia os dados ao pagseguro
		$.ajax({
           type:'POST',
           url: 'routers/boleto.php',
           data:{sHash:sHash,
               name:name,
               email:email,
               ddd:ddd,
               telephone:telephone,
               form_pg:form_pg,
               cep:cep,
               street:street,
               numberHouse:numberHouse,
               complement:complement,
               neighbordhood:neighborhood,
               city:city,
               state:state,
               cpf:cpfBoletoBalance,
               accountHouder:accountHouder,
                accountType:accountType,
                accountBank:accountBank,
                accountAgency:accountAgency, 
                account:account, 
                accountCPF_CNPJ:accountCPF_CNPJ, 
                accountEmail: accountEmail,
                product:product,
                valor:valor
           },
            dataType:'json',
            success:function(response){  
                $('#imgAguarde').css('display', 'none');
               if(response.error == true){
                   alert('Ocorreu um erro: ' + response.msg);
               }else{                                                       
                   window.open(response.link);  //Abre o boleto em uma nova pagina                           
               }
           }
       });
    }
    
	//Pagamento pela conta TEF
    function tef(sHash, name, email, ddd, telephone, form_pg, bank, cep, street, numberHouse, complement, neighborhood, city, state, cpfBoletoBalance, accountHouder,
    accountType, accountBank, accountAgency, account, accountCPF_CNPJ, accountEmail, product){        
		 $.ajax({
            type:'POST',
            url: 'routers/balance.php',
            data:{sHash:sHash,
                name:name,
                email:email,
                ddd:ddd,
                telephone:telephone,
                form_pg:form_pg,
                bank:bank,
                cep:cep,
                street:street,
                numberHouse:numberHouse,
                complement:complement,
                neighbordhood:neighborhood,
                city:city,
                state:state,
                cpf:cpfBoletoBalance, 
                accountHouder:accountHouder,
                accountType:accountType,
                accountBank:accountBank,
                accountAgency:accountAgency, 
                account:account, 
                accountCPF_CNPJ:accountCPF_CNPJ, 
                accountEmail:accountEmail,
                product:product,
                valor:valor
           },
            dataType:'json',
            success:function(response){  
                $('#imgAguarde').css('display', 'none');
               if(response.error == true){
                   alert('Ocorreu um erro: ' + response.msg);
               }else{
                   window.open(response.link); //Abre uma nova pagina onde o cliente informa seus dados bancarios                            
               }
           }
        });                
    }  
}); 

