/*
*Cria uma imagem ou avatar sem necessidade de botão pra troca da imagem 
*/
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trocar a foto clicando sem botão</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<link href="style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class='container-fluid h-100'>          
            <div class='row h-100 d-flex justify-content-center align-items-center'>                  
                <div  class='col-md-4 border-left mt-2'>    
                    <section>
                        <form id='frmCadastro' method='POST' action='routers/cadastrar-usuario.php' enctype="multipart/form-data" class='border rounded bg-light pl-3 pr-3 pt-5 pb-5 text-center'>
                        <h4 class='text-center text-success'>Troca o arquivo com a imagem sem botão</h4>                        

                        <div class='row'>
                            <div class='col-md-7 border-right pr-1'>  
                                <div class='form-group'>
                                    <input class='form-control' name='nome' type='text' placeholder='Nome'/>
                                </div>

                                <div class='form-group'>
                                    <input class='form-control' name='email' type='email' placeholder='Email'/>
                                </div>               

                               <div class='form-group'>
                                    <div class='form-row'>
                                        <div class='col-md-6'>
                                            <input class='form-control' name='celular' type='text' placeholder='Celular'/>
                                        </div>
                                        <div class='col-md-6'>
                                            <input class='form-control' name='whats' type='text' placeholder='WhatsApp'/>
                                        </div>
                                    </div>
                               </div>

                                <div class='form-group'>
                                    <div class='form-row'>
                                        <div class='col-md-6 mb-2'>
                                            <input class='form-control' name='nickname' type='text' placeholder='Nickname'/>
                                        </div>
                                        <div class='col-md-6'>
                                            <input class='form-control' name='senha' type='password' placeholder='Senha'/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-4 ml-1'>  
                                <span>Avatar:</span>  
                                <div class='form-group d-flex align-items-center flex-column'>                               
                                    <label class='custom-file-upload'>
                                        <input name="avatar" type="file" accept="image/jpeg, image/jpeg, image/png" />
                                        <img id='img-avatar' src="sem-foto.png" class='img-thumbnail mt-1 mb-3' width='150' alt='Avatar'>
                                    </label> 
                                </div>
                            </div>
                        </div>                       
                        <button class='btn btn-success btn-block  btn-lg mb-2' type='submit'>Cadastrar</button>  
                        <a href='index.php' class='btn btn-danger btn-block btn-lg  mb-2'>Cancelar</a>                       
                    </form>   
                    </section>                            
                </div> 
            </div>
           
        </div>
  
        <script src='./jquery-3.3.1.min.js' type='text/javascript'></script>
        <script src='./bootstrap.bundle.js' type='text/javascript'></script>
        <script src='./script.js' type='text/javascript'></script>        
    </body>
</html>
