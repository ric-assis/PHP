$(function(){
	$("#cadastrar").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"salvar.php",
			data:dataValue,
			success:function(response){
				if(response > 0){
					alert("Usuário já está cadastrado, faça login.");
					$(location).attr("href", "index.php");
				}else{								
					$(location).attr("href", "logado.php");			
				}
			}
		});
	});	
	
	$("#logar").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"logar.php",
			data:dataValue,
			success:function(response){
				if(response > 0)
					$(location).attr("href", "logado.php");
				else					
					alert("Usuário ou senha inválidos.");					
			},
			error:function(){
				alert("Ocorreu um erro no envio dos dados.");
			}
		});
	});
	
	$("#sair").click(function(){
		$.get("sair.php", function(){			
			$(location).attr("href", "index.php");
			alert("Sessão encerrada");
		});
	});
});