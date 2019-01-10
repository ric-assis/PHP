$(function(){
	function limpar(){
		$("input").val("");
	}	
		
	$("#salvar").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"salvar.php",
			data:dataValue,
			success:function(response){
				localStorage.setItem(response, 0);
				alert("Cadastro de número " + response  + " realizado com sucesso.");
				limpar();
			},
			error:function(){
				alert("ERRO: O cadastro não foi realizado");				
			}
		});
	});
	
		
	$("#logar").submit(function(e){
		e.preventDefault();		
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"login.php",
			data:dataValue,
			dataType:"json",
			success:function(response){				
				if(response.id > 0){					
					$(location).attr("href", "conteudo.php?nome=" + response.nome+"&nivel=" + response.n_nivel);
				}else{
					alert("Email ou senha inválidos"); 
					limpar();
				}
			},
			error:function(){
				alert("ERRO:Ocorreu um erro no envio dos dados");
			}
		});			
		
	});	
	
	
	$("#frmSenha").submit(function(e){
		e.preventDefault();
		
		dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"troca-senha.php",
			data:dataValue,
			success:function(response){
				if(response != ""){
					alert("Senha trocada com sucesso.");						
					limpar();	
					localStorage.setItem(response, 1);	
				}else{
					alert("A senha não foi trocada.");					
				}
			}	
			
		});
	});
	
	$("#cadastros").click(function(e){
		e.preventDefault();
		var tabela = "";
		cad=0;
		$.ajax({
			type:"GET",
			url:"patente.php",
			dataType:"json",
			success:function imprime(response){												
					
				$.each(response, function(chave, valor){																
					cad = $(valor.filhos).length; //length ou size sao propriedades jquery e nao o length do javascript, para contar arrays com chaves strings e nao numericas
					var data_br = valor.data_cad.substr(8,2) + "/" + valor.data_cad.substr(5,2) + "/" + valor.data_cad.substr(0,4);
					//var data_br_index = valor[3].substr(8,2) + "/" + valor[3].substr(valor.data_cad(5,2)) + "/" + valor[3].substr(0,4);
										
					tabela += '<tr><td>' + valor.nome + '</td><td>' + data_br + '</td><td>' + valor.email + '</td><td>' + valor.n_nivel  + '</td><td>' + cad + '</td><tr>';	
					if(valor.filhos != undefined){							
						imprime(valor.filhos);	
					}						
				});
				
				//Por ser ajax evita repetir a consulta e adicionar valores repetidos na tabela				
				$("#tabela tbody").html(tabela);
				/*if($("tbody tr").length == 0 )					
					$("#tabela tbody").append(tabela);	
				*/
			}			
		});
		
	});
	
});