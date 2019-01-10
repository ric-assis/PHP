$(function(){
			
	$("form").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
	
		$.ajax({
			type:"GET",
			url:"salvar.php",
			data:dataValue,
			contentType:"xml;charset=UTF-8",
			dataType:"xml", //xml é um texto
			success:function(response){	
				//var dados = $.parseXML(response); Fazer um parse pra xml sem necesidade nosso arquivo ja e xml
				var cd = $(response).find("cd").text();
				var autor = $(response).find("autor").text();
				alert("CD: " + cd +"\n" + "Autor: " + autor);
			}			
		});
	});	
	
});