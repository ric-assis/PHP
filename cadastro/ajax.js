$(function(){
	//LIMPAR INPUT
	function limpar(){
		$("form input").val("");
		$("form input[type='submit']").val("Salvar");
		$("input[name='nome']").focus();	
	}
	
	/*Botão SALVAR*/
	$("form").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"salvar.php",
			data:dataValue,
			success:function(response){
				alert(response);
				limpar();	
			},
			error:function(){
				alert("Ocorreu um erro, verifique o id");
			}
		});
	});

	/*Botão EXCLUIR*/
	$("button:eq(4)").click(function(e){
		e.preventDefault();
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"GET",
			url:"remover.php",
			data:{'id':id},
			success:function(response){
				alert(response);
				limpar();		
			},
			error:function(){
				alert("Ocorreu um erro, verifique o id");
			}
		});		
	});
	
	/*Botão ATUALIZAR*/
	$("button:eq(5)").click(function(e){
		e.preventDefault();
		var id = $("input[name='id']").val(); 
		var nome = $("input[name='nome']").val();
		var telefone = $("input[name='telefone']").val();
		var email = $("input[name='email']").val();
		var cpf = $("input[name='cpf']").val();
		
		var dataValue = {
			"id" : id,
			"nome" : nome,
			"tel" : telefone,
			"email" : email,
			"cpf" : cpf
		};
		
		$.ajax({
			type:"GET",
			url:"atualizar.php",
			contentType:"application/json; charset=utf-8",//Enviando JSON
			data:dataValue,
			success:function(response){
				alert(response);	
				limpar();	
			},
			error:function(){
				alert("Ocorreu um erro, verifique o id");
			}
		});
	});
	
	/*Botão PRIMEIRO*/
	$("button:eq(0)").click(function(e){
		e.preventDefault();
		$.get("primeiro.php", function(response){
			var dataValue = JSON.parse(response); //Converte a string no formato JSON em um objeto json
			$("input[name='id']").val(dataValue.id);//Poderia usar as posicoes do DB ou retornadas no JSON [0]...
			$("input[name='nome']").val(dataValue.nome);
			$("input[name='telefone']").val(dataValue.telefone);
			$("input[name='email']").val(dataValue.email);
			$("input[name='cpf']").val(dataValue.cpf);
		});
	});
	
	//Botão ULTIMO
	$("button:eq(3)").click(function(e){
		e.preventDefault();
		$.get("ultimo.php", function(response){			
			var dataValue = JSON.parse(response);
			$("input[name='id']").val(dataValue.id);
			$("input[name='nome']").val(dataValue.nome);
			$("input[name='telefone']").val(dataValue.telefone);
			$("input[name='email']").val(dataValue.email);
			$("input[name='cpf']").val(dataValue.cpf);
		});
	});
	
	//Botão ANTERIOR
	$("button:eq(1)").click(function(e){
		e.preventDefault();
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"GET",
			url:"anterior.php", 
			dataType:"json", 
			data:{"id":id},
			success:function(response){//response já é um objeto json
				$("input[name='id']").val(response.id);
				$("input[name='nome']").val(response.nome);
				$("input[name='telefone']").val(response.telefone);
				$("input[name='email']").val(response.email);
				$("input[name='cpf']").val(response.cpf);
			},
			error:function(){
				alert("Não existem mais dados");
			}			
		});
	});
	
	//Botão PROXIMO
	$("button:eq(2)").click(function(e){
		e.preventDefault();		
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"GET",
			url:"proximo.php",
			dataType:"json",//dataType tipo do retorno
			data:{"id":id},
			success:function(response){				
				$("input[name='id']").val(response.id);
				$("input[name='nome']").val(response.nome);
				$("input[name='telefone']").val(response.telefone);
				$("input[name='email']").val(response.email);
				$("input[name='cpf']").val(response.cpf);				
			},
			error:function(){
				alert("Não existem mais dados");
			}			
		});
		
	});
	
});