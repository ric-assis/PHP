var idAtualizacao; //Recebe o id referente a tupla do botão selecionado
var idRemocao; //Recebe o id referente a tupla do botão selecionado

$(function(){
	function load(){
		var conteudo = '';
		$.get("load.php", function(response){			
				var items = JSON.parse(response);
				$.each(items, function(){							
					conteudo += 					
						'<tr>' +
							'<td>' + this.id + '</td>' +
							'<td>' + this.nome + '</td>' + 
							'<td>' + this.email + '</td>' +
							'<td>' + this.rua + '</td>' +
							'<td>' + this.numero + '</td>' + 
							'<td>' +								
									'<button class="btn btn-primary btnAtualizar mb-1 mr-1" onclick=atualizar(this.parentNode)>Atualizar</button>' + 	
									'<button class="btn btn-danger btnExcluir mb-1" onclick=remover(this.parentNode)>Excluir</button>' + 
							'</td>' + 							
						'</tr>';
				});
				$("#tabela tbody").html(conteudo);
		});			
	}
	
	load();		

//Inicia o botão atualizar escondido
$(".btnGravarAtualizacao").hide();

});

/*
O atualizar criado dinamicamente no ajax somente recebe o id e faz as trocas dos botões do formulario e preenchimento,
*por usar Ajax que é assincrono o parametro referenciando o nó pai tem que ser passado junto devido ao atrazo do Ajax impobilitando 
*posteriormente a sua requisição para uso.
*/
function atualizar(noPai){
	//Alterna os botões
	$(".btnSalvar").hide();
	$(".btnGravarAtualizacao").show();
	
	//Armazena o id de atualizacao
	idAtualizacao = ($(noPai).parent().find("td:eq(0)").text());	
	
	//Busca os valores da tabela de acordo com o id selecionado
	$("table").find("td").each(function(){
		if($(this).text() == idAtualizacao){
			
			var trNo = $(this).parent();
			
			$('input[name="nome"]').val($(trNo).find("td:eq(1)").text());
			$('input[name="email"]').val($(trNo).find("td:eq(2)").text());
			$('input[name="rua"]').val($(trNo).find("td:eq(3)").text());
			$('input[name="numero"]').val($(trNo).find("td:eq(4)").text());
			//Cada input recebe o valor da tabela encotrado pelo id
		}
	});
}

//Açoes do botão remover criado dinamicamente no ajax	
function remover(noPai){
	idRemocao = ($(noPai).parent().find("td:eq(0)").text());
	
	$.ajax({
		type:"POST",
		url:"excluir.php",
		data:{"id":idRemocao},
		success:function(response){
			/*Roda a tabela com o each a proura de uma celula com o conteudo igual o response
			Caso encontre elimina a mesma do DOM.*/
			if($.isNumeric(response)){
				$("table").find("td").each(function(){
					if($(this).text() == response){
						$(this).parent().hide();				
					}					
				});
			}else{
				alert(response);	
			}
		},
		error:function(response){
			alert(response.responseText);
		}
	});
}

//Botão que irá realmente executar a atualizacao
$(".btnGravarAtualizacao").click(function(){
	$(".btnSalvar").show();
	$(".btnGravarAtualizacao").hide();
	
	var nome = $('input[name="nome"]').val();
	var email = $('input[name="email"]').val();
	var rua = $('input[name="rua"]').val();
	var numero = $('input[name="numero"]').val();
	
	var dataValue = {"id":idAtualizacao, 
					"nome":nome,
					"email":email,
					"rua":rua,
					"numero":numero
	}
	
	$.ajax({
		type:"POST",
		url:"atualizar.php",
		data:dataValue,
		success:function(response){
			if(response == ""){
				$(location).attr("href", "cadastro.php");
			}else{
				alert(response);
			}
		}		
	});
	
});

$("form").submit(function(e){
	e.preventDefault();
	
	dataValue = $(this).serialize();
	
	$.ajax({
		type:"POST",
		url:"adicionar.php",
		data:dataValue,
		success:function(response){
			if(response == ""){
				$(location).attr("href", "cadastro.php");
			}else{
				alert(response);
			}
		}		
	});
	
});

	