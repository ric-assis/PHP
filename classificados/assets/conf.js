$(function(){
	$('input[name="telefone"]').mask('(00) 00000-0000');
	$('input[name="valor"]').mask("0.000.000,00", {reverse: true});
	
	
	$("#btnMobile").click(function(){
		if($("#menu").css("display") == "none" || $("#menu").css("display") == ""){
			$("#menu").css("display", "block");
		}else{
			$("#menu").css("display", "none");
		}		
	});

	/*Icones categoria*/
	$("#categorias li:eq(0)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/servicob.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/servico.png");		
		}
	});	

	$("#categorias a:eq(1)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/eletronicob.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/eletronico.png");		
		}
	});		

	$("#categorias a:eq(2)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/veiculob.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/veiculo.png");		
		}
	});		

	$("#categorias a:eq(3)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/brinquedosb.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/brinquedos.png");		
		}
	});		

	$("#categorias a:eq(4)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/musicab.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/musica.png");		
		}
	});		

	$("#categorias a:eq(5)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/roupab.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/roupa.png");		
		}
	});		

	$("#categorias a:eq(6)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/esporteb.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/esporte.png");		
		}
	});		

	$("#categorias a:eq(7)").on({
		mouseover:function(){
			$(this).find("img").attr("src", "imagens/casab.png");					
		},
		mouseout:function(){
			$(this).find("img").attr("src", "imagens/casa.png");		
		}
	});	

	/*Carrosel 1 pagina principal*/	
	$('.carousel-1 .owl-carousel').owlCarousel({
		loop:true,
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
		items:1,
		margin:0,
		stagePadding:0,
		smartSpeed:650,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:true,
		nav:true,	//Para habilitar o carrosel 
	});
	
	/*Carrosel 2 pagina de produtos*/
	$('.carousel-2 .owl-carousel').owlCarousel({   
		margin:10,
		//nav:true,
		items:1,
		URLhashListener:true,
		//autoplayHoverPause:true,
		startPosition: 'URLHash'
	});
	
		/*Carrosel 3 pagina de produtos Modal*/
	$('.carousel-3 .owl-carousel').owlCarousel({   
		margin:1,
		nav:true,
		items:1		
	});
	
	/*Verifica a quantidade de fotos adicionadas, maximo de 6*/
	$('input[type="file"]').change(function(){		
		if($('input[type="file"]')[0].files.length > 6){
			alert("Quantidade de imagens superior a 6");
			location.reload();			
		}		
	});	
	
	//Limita ao editar o anuncio quanto a sua quantidade de fotos ainda disponivel
	$(".excluir_foto").click(function(){		
		if($("#fotos_update")[0].files.length > ($("#fotos_update").attr("data-quant"))){
			alert("Quantidade de imagens superior a " + $("#fotos_update").attr("data-quant"));
			location.reload();			
		}		
	});	
	
	$("#fotos_update").change(function(){		
		if($(this)[0].files.length > ($(this).attr("data-quant"))){
			alert("Quantidade de imagens superior a " + $(this).attr("data-quant"));
			location.reload();			
		}		
	});	
	
/*
	//Mostra o submenu
	$("#mnu_produtos li").mouseover(function(){		
		$("#submnu_produtos").css("display", "block");
	});

	//Esconde o submenu ao sair do mouse
	$("#submnu_produtos").mouseout(function(){		
		$(this).css("display", "none");		
	});		*/

	var valor = parseInt($("#valor").text());
	$("#quantidade button:eq(0)").click(function(){
		if(valor > 0){
			valor--;
		}
		$("#valor").html(valor);
	});
		
	$("#quantidade button:eq(1)").click(function(){
		if(valor < 15){
			valor++;
		}
		$("#valor").html(valor);

	});	

	/*O ID do produto é passado via atributo*/
	$(".produtos").click(function(){
		var id = $(this).attr("data-id");
		$(location).attr("href", "produto_descricao.php?id_produto_selecionado=" + id);
		
	});		
	
	/*$("#pag_prox").click(function(){
		var num_pag = $(this).attr("data-ultPag");
		for(var i = 0; i < num_pag; i++){
			var novo_valor = $(".num_pag:eq(" + i + ")").text();
			$(".num_pag:eq(" + i + ")").text(parseInt(novo_valor) + 1);
		}
	});*/
	
		
	
});



