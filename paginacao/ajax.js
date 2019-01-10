var indice;
var id;
var foto;
var pag_ini = 1;
var tipo_ini = "default";

load(pag_ini, tipo_ini );
paginacao();

//Aciona o submenu com duplo click
function menu(){	
	$(".media").dblclick(function(e){
		var x = e.originalEvent.pageX;
		var y = e.originalEvent.pageY;
		
		$(".poup-up").css("left", x);
		$(".poup-up").css("top", y);
		$(".poup-up").css("display", "block");		
		
		//Pega a posicao :eq da classe media clicado
		indice = $(".media").index($(this));
	});
}

//Copia os dado do media selecionado para o formulario	
function editar(){
	id = $(".media:eq(" + indice + ") #id").text();
	var novela = $(".media:eq(" + indice + ") h4:eq(0)").text();
	var ano = $(".media:eq(" + indice + ") h4:eq(1)").text();
	var sinopse = $(".media:eq(" + indice + ") p").text();
	foto = $(".media:eq(" + indice + ") img").attr("src");
	
	$('input[name="novela"]').val(novela);
	$('input[name="ano"]').val(ano);
	$('textArea[name="resumo"]').val(sinopse);	
	//O input type=file por medidas de segurança não pode ser definido automaticamente só clicando
}	




$('[data-toggle="tooltip"]').tooltip();

function limpar(){
	$("#frmSalvar input").val("");
	$("#frmSalvar textarea").val("");
}

$("#mnuCancelar").click(function(){
	$(".poup-up").css("display", "none");
	$("#btnAtualizar").css("display", "none");
	$("#btnSalvar").css("display", "block");		
});

$("#mnuEditar").click(function(){
	editar();
	$(".poup-up").css("display", "none");
	$("#btnAtualizar").css("display", "block");
	$("#btnSalvar").css("display", "none");		
});
	
//Carrega o media junto com a pagina
function load(pag, tipo){	
	var cont_completo_da_pag = "";
	$.ajax({
		type: "GET",
		url: "load.php?pag=" + pag + "&tipo=" + tipo,
		dataType: "json",
		success: function(response){
			$.each(response, function(){
				cont_completo_da_pag += 
					'<div id="media" class="media" onclick="menu()">'+
						'<img class="mr-3 align-self-center" src="' + this.capa + '" width="150px"/>'+
						'<div class="media-body" style="overflow:hidden; word-wrap:break-word;">'+
							'<div id="id" style="display:none">' + this.id + '</div>'+
							'Novela:'+
							'<h4>' + this.novela + '</h4>'+
							'Ano:'+
							'<h4>' + this.ano + '</h4>'+
							'Sinopse:'+
							'<p>' + this.resumo + '</p>'+						
						'</div>'+
					'</div><hr/>' ;				
					
			});
			$("#conteudo").html(cont_completo_da_pag);
		}		
	});
};

function pagAnterior(maxPag){	
	//Decrementa os botoes ate o indice 0 de btnPagina, compara o texto do 1 botao se maior que 1. Caso seja 1 para
	for(var i = $(".btnPagina:eq(4)").text(); i >= 0; i--){
		var valor = $(".btnPagina:eq(" + i +  ")").text();
		if($(".btnPagina:eq(0)").text() > 1){
			$(".btnPagina:eq(" + i +  ")").text(parseInt(valor) - 1);
		}			
	}
}
	
//Organiza de acordo com o radio selecionado quando clicar na paginacao
function paginas(){
	$(".btnPagina").click(function(){
		var pag = $(this).text();
		var tipo =  $("input[name='rdOrg']:checked").val();
		load(pag, tipo);
	});		
}	

function pagProx(maxPag){	
	//Compara o valor do maior botão com o numero maximo de paginas freando a contagem
	if($(".btnPagina:eq(4)").text() < maxPag){
		for(var i = 0; i< maxPag; i++){
			var valor = $(".btnPagina:eq(" + i +  ")").text();
			$(".btnPagina:eq(" + i +  ")").text(parseInt(valor) + 1);
		}
	}
}
	
//Cria a paginacao de acordo com o resultado de elemento do DB
function paginacao(){
		
	$.get("paginacao.php", function(response){
		$(".pagination").prepend(
			'<li class="page-item"><button class="btn btn-link page-link btnPagAnterior" onClick="pagAnterior(' + response + ')">&#171;</button></li>'
		);
		for(var i = 1; i <= 5; i++){//Cria as paginas					
			$(".pagination").append(
				'<li class="page-item"><button class="btn btn-link page-link btnPagina" onClick="paginas()">' + i  + '</button></li>'
			);							
		}
					
		$(".pagination").append(							
			'<li class="page-item"><button class="btn btn-link page-link btnPagProximo" onClick="pagProx(' + response + ')">&#187;</button></li>'		
		);
	});
}

//Além de salvar o elemento coloca-o na primeira posicao da primeira pagina
$("#frmSalvar").submit(function(e){
	e.preventDefault();	
	
	var form = $(this);
	var dataValue = false;
	if(window.FormData)
		dataValue = new FormData(form[0]);
			
	$.ajax({
		type: "POST",
		url: "salvar.php",
		data: dataValue ? dataValue : form.serialize(),
		contentType: false, 
		processData: false,
		success: function(response){				
			if(response == ""){					
				load();						
			}
		},
		error: function(response){
			alert(response);
		}			
	});		
	limpar();		
});
	
	
//Buca uma novela por nome
$("#frmBusca").submit(function(e){
	e.preventDefault();
	
	$.ajax({
		type: "GET",
		url: "buscar.php?txtBusca=" + $("input[name='txtBusca']").val(),
		success: function(response){
			if($.isNumeric(response)){//Se for numero retorna true
				var tipo = "default";
				load(response, tipo);
			}else{
				alert(response);
			}
		}			
	})
});



function atualizaTexto(){
	//A capa atual foi mantida	
	var novela = $('input[name="novela"]').val();
	var ano = $('input[name="ano"]').val();
	var sinopse = $('textArea[name="resumo"]').val();	

	var dataValue = {"novela" : novela,
					"ano" : ano,
					"resumo" : sinopse,
					};
	
	$.ajax({
		type: "POST",
		url: "atualizar.php?tipo=0&id=" + id,
		data: dataValue,			
		success: function(response){
			if(response == "")
				location.reload();
			else
				alert(response);
		}
	});
}	


function atualizaCapa(){				
	//Uma nova capa foi escolhida
	var form = $("#frmSalvar");
	dataValue = false;
	if(window.FormData)
		dataValue = new FormData(form[0]); 
	
	$.ajax({
		type: "POST",
		url: "atualizar.php?tipo=1&id=" + id + "&foto=" + foto,
		data: dataValue? dataValue : form.serialize(),
		processData: false,
		contentType: false,
		success: function(response){
			if(response == "")
				location.reload();
			else
				alert(response);
		}
		
	});
}

$("#btnAtualizar").click(function(e){	
	e.preventDefault();
	if($('input[name="capa"]').val() == ""){
		//Chama a função para atualizar somente os textos pois foi verificado que uma nova foto nao foi indicada
		atualizaTexto();
	}else{
		//O cliente indicou uma nova capa 
		atualizaCapa();
	}
	
});

	
