<?php 
include('header.php');
include('../bancodedados/select-unico-usuario.php');
 ?>

<section id="area-principal">
    <div class="banner">
        <h1><img src="../images/logo.png" alt="Banner" id="banner-img"></h1>
    </div>
    <div class="container">
        <div class="user">
            <p style="float: right;">Olá <b><?php echo $nome; ?></b> | <a href="../logout.php">Sair</a></p>
        </div>
        <div id="video">
            <?php include('../bancodedados/select-video.php'); ?>
            <!--<div class="only-mob">
                <iframe width="100%" height="300"
                <?php//echo 'src="https://www.youtube.com/embed/'.$link.'"'; ?>
                frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
            </div>-->
            <div class="only-pc">
                <iframe width="100%" height="613"
                <?php echo 'src="https://www.youtube.com/embed/'.$link.'?autoplay=1"' ;?>
                frameborder="0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
            </div>
        </div>
        <div id="cadastro-codigo">
            <?php include('../bancodedados/select-unico-cod.php'); ?>
            <form action="cadastrar-codigo.php" method="POST">
                <div class="row">
                    <script>
                        function valida(id, cod){
                            var numero = document.getElementById(id).value.toUpperCase();
                            if(numero == cod){
                                document.getElementById(id).style.border = '3px solid green';
                            } else {
                                console.log("errou:"+numero+" "+cod);
                                document.getElementById(id).style.border = '3px solid red';
                            }
                        }

                        function sucesso(cod_1, cod_2, cod_3, cod_4, cod_5){
                           var cor1 = document.getElementById("input-cod-1").style.borderColor; 
                           var cor2 = document.getElementById("input-cod-2").style.borderColor; 
                           var cor3 = document.getElementById("input-cod-3").style.borderColor; 
                           var cor4 = document.getElementById("input-cod-4").style.borderColor; 
                           var cor5 = document.getElementById("input-cod-5").style.borderColor; 
                           if(cor1 == "green" && cor2 == "green" && cor3 == "green" && cor4 == "green" && cor5 == "green"){
                            alert("Parabens, você acertou o código!");
                            window.location.href = "cadastrar-codigo.php?cod_1="+cod_1+"&cod_2="+cod_2+"&cod_3="+cod_3+"&cod_4="+cod_4+"&cod_5="+cod_5;
                           }
                        }

                        function maiuscula(id){
                            var numero = document.getElementById(id).value.toUpperCase();
                            document.getElementById(id).value = numero;
                        }
                    </script>
                    <div class="col-md-2 col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-cod-1" placeholder="XNJ45" required maxlength="5" size="5" name="cod_1" minlength="5" onblur="maiuscula('input-cod-1');">
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-cod-2" placeholder="SDFKS" required maxlength="5" size="5" name="cod_2" minlength="5" onblur="maiuscula('input-cod-2');" >
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-cod-3" placeholder="23HJS" required maxlength="5" size="5" name="cod_3" minlength="5" onblur="maiuscula('input-cod-3');">
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-cod-4" placeholder="LKSRE" required maxlength="5" size="5" name="cod_4" minlength="5" onblur="maiuscula('input-cod-4');">
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-cod-5" placeholder="MHS57" required maxlength="5" size="5" name="cod_5" minlength="5" onblur="maiuscula('input-cod-5');">
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-cod-valida btn-md" id="input-cod" onclick="valida('input-cod-1','<?php echo $campo_1 ; ?>');valida('input-cod-2','<?php echo $campo_2 ; ?>');valida('input-cod-3','<?php echo $campo_3 ; ?>');valida('input-cod-4','<?php echo $campo_4 ; ?>');valida('input-cod-5','<?php echo $campo_5 ; ?>');sucesso('<?php echo $campo_1 ; ?>','<?php echo $campo_2 ; ?>','<?php echo $campo_3 ; ?>','<?php echo $campo_4 ; ?>','<?php echo $campo_5 ; ?>');">Verificar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>

<?php include('footer.php'); ?>