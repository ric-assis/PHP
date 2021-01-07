$(function(e){
	e.preventDefault;
	
	$("button:eq(0)").click(function(e){	
		e.preventDefault();
						
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/primeiro",			
			dataType:"json",
			success:function(response){			
				$("input[name='id']").val(response.id);
				$("input[name='nome']").val(response.nome);
				$("input[name='email']").val(response.email);
				$("input[name='rua']").val(response.rua);
				$("input[name='bairro']").val(response.bairro);
				$("input[name='numero']").val(response.numero);			
				
			}
		});			
	});
	
	$("button:eq(1)").click(function(e){	
		e.preventDefault();
		
		var id = $("input[name='id']").val();
		
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/anterior/" +  id,			
			dataType:"json",
			success:function(response){
				if(response.id !== undefined){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='rua']").val(response.rua);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='numero']").val(response.numero);			
				}				
			}
		});				
	});

	$("button:eq(2)").click(function(e){	
		e.preventDefault();
		
		var id = $("input[name='id']").val();
			
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/proximo/" + id,			
			dataType:"json",
			success:function(response){
				if(response.id !== undefined){
					$("input[name='id']").val(response.id);
					$("input[name='nome']").val(response.nome);
					$("input[name='email']").val(response.email);
					$("input[name='rua']").val(response.rua);
					$("input[name='bairro']").val(response.bairro);
					$("input[name='numero']").val(response.numero);			
				}					
			}
		});				
	});

	$("button:eq(3)").click(function(e){	
		e.preventDefault();
		
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/ultimo",
			dataType:"json",
			success:function(response){				
				$("input[name='id']").val(response.id);
				$("input[name='nome']").val(response.nome);
				$("input[name='email']").val(response.email);
				$("input[name='rua']").val(response.rua);
				$("input[name='bairro']").val(response.bairro);
				$("input[name='numero']").val(response.numero);
				
			}
		});				
	});	
	
	$("form").submit(function(e){	
		e.preventDefault();
		
		//dataValue = $(this).serialize();
		
		//console.log(dataValue);
		
		var nome = $("input[name='nome']").val();
		var email = $("input[name='email']").val();
		var rua = $("input[name='rua']").val();
		var bairro = $("input[name='bairro']").val();
		var numero = $("input[name='numero']").val();
		
		
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/salvar/" + nome + "/" + email + "/" + rua + "/" + bairro + "/" + numero,	
			//data:dataValue,
			success:function(response){				
				if(response != ''){
					alert("Cadastrado com exito");					
				}else{
					alert("ERRO: Cliente não cadastrado");
				}
			}
		});				
	});	
	
	$("button:eq(5)").click(function(e){
		e.preventDefault();
		
		$("input").val('');
		$("input[name='nome']").focus();
	});
	
	$("button:eq(7)").click(function(e){	
		e.preventDefault();
		
		dataValue = $("form").serialize();
		
		$.ajax({
			type:"POST",
			url:"http://localhost/crud_mvc_ajax/Home/salvar",	
			data:dataValue,
			success:function(response){				
				if(response != ''){
					alert("Atualizado com exito");				
				}else{
					alert("ERRO: Cliente não atualizado");
				}
			}
		});				
	});	
	
});