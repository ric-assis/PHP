<?php require_once './header.php'; ?>
<body>
    <div class="container">
        <?php require_once './nav.php' ?>
    
        <section>
            <div id="gift" class="row p-1 pt-4 pb-4">  
                <div class="col-md-4 d-flex justify-content-center">                
                    <img class="img-fluid" src="assets/img/gift-card.png"/>               
                </div>  
               <div class="col-md-8"> 
                    <div class="col-md-8 text-center">                    
                        <h2 class="text-dark">RESGATAR</h2>
                         <span>Digite o código que esta no seu Gift Card UnivLandc</span>                       
                         <form id="frmGiftCard" class="form-inline mt-1">                        
                             <input class="form-control w-100 h-100 pb-2" type="text" name="gift_card">
                             <button class="btn" type="submit">RESGATAR</button>                        
                         </form>  
                    </div>
                   <hr id="hr-preta"/>
                </div>
            </div>
        </section>
        
        <section>
            <div class="row d-flex justify-content-end">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h2>PRESENTEAR</h2>
                            <p>Selecione uma das formas abaixo para criar seu Gift Card.</p>
                        </div>
                        <div class="md-5 d-flex flex-column align-items-center p-1">                           
                            <img class="img-fluid" src="assets/img/presentear.jpg" alt="Gift-Card enviado por email"/>
                            <div class="text-center d-flex flex-column text-center font-weight-bold">
                                <span>ENTREGA ELETRONICA</span>
                                <span class="small">O Gift Card sera enviado pelo email.</span>
                            </div>
                        </div>
                        
                        <div class="md-5 d-flex flex-column align-items-center p-1">                           
                            <img class="img-fluid" src="assets/img/presentear-envelope.jpg" alt="Entrega no endereço especificado"/>
                            <div class="text-center d-flex flex-column text-center font-weight-bold">
                                <span>ENTREGA FÍSICA</span>
                                <span class="small">O Gift Card é entregue no endereço indicado com uma embalagem especial.</span>
                            </div>
                        </div>                       
                        
                    </div>
                </div>
            </div>
        </section>
        
        
        <section>           
            <div><hr id="hr-azul"/></div>
            <div class="row pt-4" id="div-form">                
                <div  class="col-md-8 text-center p-2">                     
                    <h2 class="text-light">Fale com a gente, queremos te ouvir !</h2>
                    <form class="p-2 pb-4">                        
                        <div class="form-row">
                            <div class="col-md-6 pb-2">
                                <input class="form-control" name="nome" type="text" placeholder="Nome">                       
                            </div>
                            <div class="col-md-6 pb-2">
                                <input class="form-control" name="email" type="email" placeholder="Email">                       
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 pb-2">
                                <textarea class="form-control" rows="5" name="mensagem" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary text-light" type="submit">Enviar</button>
                    </form>    
                </div>   
                <div id="div-opcoes" class="col-md-4 p-2">  
                    <div class="col-md-12 d-flex justify-content-center mb-2 mt-2">
                        <img class="img-fluid" src="assets/img/logo2.png"/>   
                    </div>
                    <div class="col-md-12 d-flex flex-column justify-content-center text-center">
                        <a class="text-light" href="#">INICIO</a>
                        <a class="text-light" href="#">QUEM SOMOS</a>
                        <a class="text-light" href="#">PLANOS</a>
                        <a class="text-light" href="#">PERGUNTAS FREQUENTES</a>
                    </div>
                    <div class='col-md-12 d-flex justify-content-center'>
                        <a class="nav-item nav-link p-2" href="#"><i class="fa fa-instagram fa-lg text-light" aria-hidden="true"></i></a> 
                        <a class="nav-item nav-link p-2" href="#"><i class="fa fa-whatsapp fa-lg text-light" aria-hidden="true"></i></a> 
                        <a class="nav-item nav-link p-2" href="#"><i class="fa fa-facebook-official fa-lg text-light" aria-hidden="true"></i></a> 
                        <a class="nav-item nav-link p-2" href="#"><i class="fa fa-envelope fa-lg text-light" aria-hidden="true"></i></a> 
                    </div>                   
                </div>              
            </div>
        </section>  
        <?php require_once './footer.php' ?>
    </div>
    

