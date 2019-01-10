$(function(){		
	$("#btnLogar").click(function(e){
		e.preventDefault();
		
		var dataValue = $("#frmLogar").serialize();
		
		$.ajax({
			type:"POST",
			url:"logar.php",
			data: dataValue,
			dataType:"json",
			success:function(response){
				$(location).attr("href", "logado.php");				
			},
			error:function(response){
				alert(response.responseText);
			}
		});	
	});
	
	$("#btnSair").click(function(){		
		$.get("sair.php", function(){
			$(location).attr("href", "index.php");
			alert("Sessão encerrada.");
		});
	});
	
	$("#frmSenha").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"recadastrar-senha.php",
			data:dataValue,
			success:function(response){
				alert(response);
			}
			
		});
		
		//Oculta o modal mas não o fecha, modais são assincronos e se fechar ele sai da mem. antes de executa o código acima
		$("#modalSenha").modal("hide");	
	});
	
	
});