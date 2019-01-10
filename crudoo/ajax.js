$(function(){
	function limpar(){
		$("input").val("");	
		$("input[name='nome']").focus();
	}
	
	$("form").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"salvar.php",
			data:dataValue,			
			success:function(response){
				if(response > 0){
					alert("Id: " + response + " Cadastrado com sucesso.")
					limpar();
				}else{
					Alert("Cadastrado não realizado");
				}				
			}			
		});		
	});
	
	$("#btnExcluir").click(function(e){
		e.preventDefault();
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"POST",
			url:"excluir.php",
			data:{"id":id},
			success:function(response){
				if(response > 0){
					alert("Id: " + response + " excluido com sucesso.")
					limpar();	
				}else{
					Alert("Cadastrado não excluido");
				}				
			}			
		});
	});
	
	
	$("#btnAtualizar").click(function(e){
		e.preventDefault();
		
		dataValue = $("form").serialize();
		
		$.ajax({
			type:"POST",
			url:"atualizar.php",
			data:dataValue,			
			success:function(response){		
				if(response > 0){
					alert("Registro " + response + " atualizado com sucesso."); 
				}else{
					alert(response);
				}				
			}			
		});
	});
	
	
	$("#btnAnterior").click(function(e){
		e.preventDefault();
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"POST",
			url:"anterior.php",
			data:{"id":id},
			dataType:"json",
			success:function(response){
				if(response.id > 0){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='rua']").val(response.rua);
					$("input[name='numero']").val(response.numero);				
				}else{
					alert(response);
				}	
			}				
		});
	});
	
	
	$("#btnProximo").click(function(e){
		e.preventDefault(e);
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"POST",
			url:"proximo.php",
			data:{"id":id},
			dataType:"json",
			success:function(response){
				if(response.id > 0){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='rua']").val(response.rua);
					$("input[name='numero']").val(response.numero);				
				}else{
					alert(response);
				}	
			}				
		});
	});
	
	
	$("#btnPrimeiro").click(function(e){
		e.preventDefault();			
		$.ajax({
			type:"POST",
			url:"primeiro.php",	
			dataType:"json",
			success:function(response){
				if(response.id > 0){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='rua']").val(response.rua);
					$("input[name='numero']").val(response.numero);				
				}else{
					alert(response);
				}	
			}				
		});
	});
	
	$("#btnUltimo").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type:"POST",
			url:"ultimo.php",
			dataType:"json",
			success:function(response){
				if(response.id > 0){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='rua']").val(response.rua);
					$("input[name='numero']").val(response.numero);				
				}else{
					alert(response);
				}	
			}				
		});
	});
	
	$("#btnNovo").click(function(e){
		e.preventDefault();
		limpar();
	});
	
	
});