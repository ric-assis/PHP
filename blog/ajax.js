$(function(){
		
	$.ajax({
		type:"POST",
		url:"load.php",
		dataType:"json",
		success:function(response){				
			$.each(response, function(){
				$("#local").append(
					'<div class="media">'+
						'<img src="' + this.avatar + '" class="mr-3" width="100px"/>' +
						 '<div class="media-body" style="overflow:hidden; word-wrap:break-word;">' +//overflow nao deixa quebrar a div e word quebr o texto
							'<h6>' + this.nome + '</h6><hr/>' +
							'<p>' + this.postagem + '</p>' +
						'</div>' +					
					'</div><hr/>'		
				);
			});
		}
	});
	
	function limpar(){		
		$("input").val("");
		$("textarea").val("");				
	}
	
		
	$("form").submit(function(e){
		e.preventDefault();
		var form = $(this);
		var dataValue = false;
		if(window.FormData)
			var dataValue = new FormData(form[0]); // Passamos o form[0] em vez de form. É o elemento real do formulário, mas não o seletor do jQuery.
		
		$.ajax({
			type:"POST",
			url:"salvar.php",
			data:dataValue ? dataValue : form.serialize(), //If datavalue false entao serialize é texto, formdata cira um array chave/valor igual enctype que quebra o arquivo em pedaços
			processData:false, //Configuramos processData para false, assim, o jQuery não converterá nosso FormData para uma string
			contentType: false, //informa ao jQuery para não adicionar cabeçalho ao pedido
			success:function(){
				$.ajax({
					type:"POST",
					url:"exibir.php",
					dataType:"json",
					success:function(response){
						$("#local").append(
							'<div class="media">'+
							'<img src="' + response.avatar + '" class="mr-3" width="100px"/>' +
							'<div class="media-body" style="overflow:hidden; word-wrap:break-word;">' +
							'<h6>' + response.nome + '</h6><hr/>' +
							'<p>' + response.postagem + '</p>' +
							'</div>' +					
							'</div><hr/>'			
						);
					},
					error:function(response){
						alert(response);
					}
				});	
				limpar();		
			},
			error:function(response){
				alert(response);
			}			
		});
	});
});