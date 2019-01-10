
	
	//Preenche todos os drop down ao iniciar
	function load(){
		$.get("adicionar_permissao.php", function(response){
			var items = JSON.parse(response);
		
			for(var i=0; i < items.length ; i++){
				if(items[i].cpf){
					$("select[class$='cpf']").append('<option>' + items[i].cpf + '</option>');
				}else{
					if(items[i].descricao){
						$("select[name='permissao']").append('<option>' + items[i].descricao + '</option>');
					}
				}
			}	
			
		});
		
		//Preenche a tabela com todas as permissões disponibilizadas aos usuários
		var tabela="";		
		$.get("exibir_permissoes.php", function(response){
			var items = JSON.parse(response);
			$.each(items, function(){
				tabela += '<tr>' +
							'<td>' + this.cpf + '</td>' +
							'<td>' + this.descricao + '</td>' +
						  '</tr>' 
			});
			$("table tbody").html(tabela);
		});
	};
	
	//Carrega as infomações ao iniciar
	load();

	//Lista somente os items referente ao cpf selecionado.
	//fn qundo igual a 1 chama a funcao selecionar permissoes.
	$("#removerCPF").change(function(e){
		e.preventDefault();
		$("select[name='permissao_remover']").html("");
		$.ajax({
			type:"GET",
			url:"remover_permissao.php?fn=1&cpfRemover=" + $("#removerCPF option:selected").val(),
			dataType:"json",
			success:function(response){						
				$.each(response, function(chave, items){					
					$("select[name='permissao_remover']").append('<option>' + items.descricao + '</option>');
				});				
			}
		});
	});
	
	//Salva os dados preenchidos no formulário
	function enviar(){				
		dataValue = $("#frmSalvar").serialize();
	
		$.ajax({
			type:"POST",
			url:"salvar_permissao.php",
			data:dataValue,
			dataType:"json",
			success:function(response){					
				if(response == 1){
					location.reload();
				}else{
					alert(response);
				}
			}			
		});
	};
	
	//Remove as permissões selecionadas
	function remover(){
		
		dataValue = $("#frmRemover").serialize();
	
		$.ajax({
			type:"GET",
			url:"remover_permissao.php?fn=2",
			data:dataValue,
			dataType:"json",
			success:function(response){					
				if(response = "1"){
					location.reload();
				}else{
					alert(response);
				}
			}			
		});
	};
	

