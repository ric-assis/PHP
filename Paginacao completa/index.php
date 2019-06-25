<?php
/*
*Paginação funcional completa
*/
error_reporting(E_ALL);   
ini_set('display_errors', 'on');
 


$limite = 10; //Máximo de elementos por página
$max_pagina = 2;//Paginação maximo de páginas da direita e da esquerda da página selecionada
$pagina_anuncio_atual = (isset($_GET["pag"]))? (int)$_GET["pag"]: 1;//Página atual
$prim_anuncio_pag = ($limite * $pagina_anuncio_atual) - $limite; //Pagina inivial passada pro LIMIT do DB
$num_pag = ceil(100.3)/$limite;//Total de páginas onde 10.3 simula os registros do banco
	

?>

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
       <div class='container-fluid'>          
        <div id='containerDispute' class='row containerInt justify-content-center m-1'>
            <div class='col-md-6'>
                <h3 class='text-center text-secondary'>Paginação</h3><hr/>

               <!-- Paginação -->
               <div class="row justify-content-center">
                    <div class="col-md-12">
                        <ul class="pagination justify-content-center">						
                            <!-- Primeira página -->
                            <?php if($num_pag > 3): ?>																					
                                <li class="page-item"><a href="?pag=<?php echo 1 ?>" class="page-link">&#171;</a></li>			
                            <?php endif ?> 	

                            <!-- Página anterior -->
                            <?php 
                                for($i = $pagina_anuncio_atual - $max_pagina; $i <= $pagina_anuncio_atual - 1; $i++): ?>										
                                    <?php if($i >= 1): ?>                                       
                                        <li class="page-item"><a href="?pag=<?php echo $i ?>" class="page-link"><?php echo $i ?></a></li>
                                    <?php endif ?>
                            <?php endfor ?>	

                            <!-- Página atual -->
                            <li class="page-item active"><button class="page-link"><?php echo $pagina_anuncio_atual ?></button></li>

                            <!-- Proxíma página -->
                            <?php 
                                for($i = $pagina_anuncio_atual + 1; $i <= $pagina_anuncio_atual + $max_pagina; $i++): ?>
                                    <?php if($i <= $num_pag): ?>                                        
                                        <li class="page-item"><a href="?pag=<?php echo $i ?>" class="page-link"><?php echo $i ?></a></li>
                                    <?php endif ?>
                            <?php endfor ?>

                            <!-- Última página -->	
                            <?php if($num_pag > 3)://Só exibe os botoes se tive mais de 3 paginas ?>											
                                            <li class="page-item"><a href="?pag=<?php echo $num_pag ?>" class="page-link">&#187;</a></li>	
                            <?php endif?>
                        </ul>
                    </div>
                </div>     
            </div>                                 
        </div> 
    </div>    
  
        <script src='./jquery-3.3.1.min.js' type='text/javascript'></script>
        <script src='./bootstrap.bundle.js' type='text/javascript'></script>              
    </body>
</html>
