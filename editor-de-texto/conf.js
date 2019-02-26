/* O Summernote é um editor de texto javascript simples 
mas funcional possui boas funcionalidades que vale a pena 
procurar.
Funciona somente com JQuery e Bootstrap além de seus arquivos 
como ícones, fontes e a lingua usada. As imagens são enviadas como encode_64
o que as vezes pode valer a pena convertelas para arquivo ou não.
*/

$(function(){
	$(".summernote").summernote({
		lang: 'pt-BR', //Idioma
		tabsize: "0",
		height: "200"
	});


	$("form").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize()
		
		//var textArea = $(".summernote").summernote('code');		
						
		$.ajax({
			type:"GET",
			url:"index.php",
			data:dataValue,
			dataType:"json",
			success: function(response){
				$(".summernote:eq(1)").summernote('code', response.descricao);
				
			}			
		});		
	});

		
	/*
	Existem outras funcoes como desfazer e refazer por exemplo
	$("#botao3").click(function(){
		$('#editor').summernote('undo');
	});
	
	$("#botao4").click(function(){
		$('#editor').summernote('redo');
	});
	*/
	
});