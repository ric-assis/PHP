 /*Exibe a imagem selecionada */
    $('input[name="avatar"').change(function(){
        var preview = $('#img-avatar')[0];
        var file =$(this)[0].files[0];
        var reader = new FileReader();

        $(reader).on('loadend', function(){
            $(preview).attr('src', reader.result);        
        });

        if(file){
            reader.readAsDataURL(file);
        }else{
            $(preview).attr('src', 'assets/avatar/sem-foto.png');   
        }         
       
    }); 
    