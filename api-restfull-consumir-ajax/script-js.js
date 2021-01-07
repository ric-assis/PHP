$(function(){
	
	$("form").submit(function(e){
		e.preventDefault();		
		
		$formulario = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"http://localhost/api-restfull/api/gravar",
			data:$formulario,
			dataType:"JSON",
			success: function(response){
				if(response.id > 0){
					$("#btn-listar").click();
				}else{
					alert("Ocorreu um erro ao salvar");
				}
			},
			error:function(response){
				alert("Ocorreu um erro ao salvar");
			}
		});		
		
	});
	
	/*Atraves do delegate do js também é possivel pegar o DOM porem esse foi substituido pelo on desde a versao 3 jquery*/
	$(document).on("click", ".btnExcluir", function(){		
			
		$.ajax({
			type:"DELETE",
			url:"http://localhost/api-restfull/api/excluir",
			data:{"id":$(this).attr("data-excluir")},
			dataType:"JSON",
			success:function(response){
				response.id == 0 ? $("#btn-listar").click() : alert("O cliente não pode ser excluido");				
			},
			error:function(){
				alert("Ocorreu um erro ao excluir");
			}
		});
	});
	
	/*
	* Forma de pegar elementos criados apos o DOM, 
	*Nosso botão atualizar foi criado após a árvore do DOM sendo
	*este não é encontrardo na mesma porém podemos invoca-lá através
	*do documento 
	*/
		
	$(document).on("click",".btnAtualizar", function(){
		var id = $(this).attr("data-atualizar");
		var nome = $(this).closest("tr").children("td").eq(1).contents().text();		
		var nascimento = $(this).closest("tr").children("td").eq(2).contents().text();
		nascimento = nascimento.split("/").reverse().join("-");	
				
		$("input[name='id']").val(id);
		$("input[name='nome']").val(nome);
		$("input[name='nascimento']").val(nascimento);
				
		$("button[type='submit']").hide();
		$("#btn-atualizar").show();			
		
	});
	
	$("#btn-atualizar").click(function(e){
		e.preventDefault();
		
		$("button[type='submit']").show();
		$(this).hide();			
		
		/*O formulario não foi serializado devido ao id estar desabilitado e não ser pego*/
		var dados = {"id": $("input[name='id']").val(),
					"nome":$("input[name='nome']").val(),
					"nascimento":$("input[name='nascimento']").val()
					}
		
		$.ajax({
			type:"PUT",
			url:"http://localhost/api-restfull/api/atualizar",
			data:dados,
			dataType:"JSON",
			success:function(response){
				response.id != 0 ? $("#btn-listar").click() : alert("O cliente não pode ser atualizado");
			},
			error:function(){
				alert("Ocorreu um erro ao atualizar");
			}
		});
		
		
	});
	
	
	$("#btn-listar").click(function(){
		var clientesHtml = '';
		
		$.ajax({
			type:"GET",
			url:"http://localhost/api-restfull/api",			
			dataType:"JSON",
			success: function(response){
				if(response.length > 0){
					clientesHtml += "<table class='table'>" +
								"<thead>" +  
									"<tr>" +
										"<th scope='col'>ID</th>" +											
										"<th scope='col'>Nome</th>" +
										"<th scope='col'>Nascimento</th>" +
										"<th scope='col'>Opções</th>" +										
									"<tr>" +									
								"</thead>" + 
								"<tbody>";
									$.each(response, function(chave, valor){
										clientesHtml += "<tr>" + 
											"<td>" + 											
												valor.id +											
											"</td>" + 
											"<td>" + 											
												valor.nome +											
											"</td>" +
											"<td>" + 											
												valor.nascimento +
											"</td>" +
											"<td>" +
												"<button class='btn btn-danger mr-2 btnExcluir' data-excluir=" + valor.id + ">Excluir</button>" +
												"<button class='btn btn-success btnAtualizar' data-atualizar=" + valor.id + ">Atualizar</button>" +
											"</td>" +			
										"<tr>"; 
									});											
								clientesHtml += "</tbody>" + 
							"</table>";				
				}else{
					alert("Ocorreu um erro ao exibir");
				}
				
				$(".listar-api").html(clientesHtml);				
				
			},
			error:function(response){
				alert("Ocorreu um erro ao exibir");
			}
		});
	});	
	
});

	