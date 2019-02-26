$(function(){		
	var mes;
	var ano;
	var dataValue1;
	
	//Preenche o dropdown com os anos	
	var itens = '';
	itens +='<select class="form-control"  name="ano"> <option></option>';
	for(var i=2051; i>1970; i--){
		itens += '<option value=' +  i +'>' + i + '</option>';
	}
	itens += '</select>';
		
	$("#divAno").html(itens);
	
	//fim
	
	/*Preenche o calendário com os dados recebidos via ajax*/
	function preenche_calendario(response){
		//Pega a data atual
		var hoje = new Date();
		var hoje_dia = hoje.getDate();
		var hoje_mes = hoje.getMonth();
		var hoje_ano = hoje.getFullYear();
		//Converte a saida para um objeto json
		response = JSON.parse(response);
		//Deixa a data atual como variavel global
		data_atual = response.data;		
		//Items do loop pra preencher o calendário
		var itens = '';;			
		//Converte a data inicial recebida em um objeto do tipo data
		data_ini = new Date(Date.parse(response.dataInicial));
		//Conta o numero de linhas 
		
		for(var l = 0; l < response.linha; l++){
			itens += '<tr>';
			//Conta o numero de celulas por linhas dom. a seg
			for(var c = 0; c < 7; c++){ 				
				//Um dia tem 86400000 ms, sendo 1000ms por seg, 
				var umDia = 1000 * 60 * 60 * 24;
				//Converte a data inicial para timestamp e soma com +1 dia
				var dias = new Date((data_ini.getTime()) + umDia);
				//Data_ini recebe o valor para somar mais um dia sem perca de valores
				data_ini = dias;									
				
				/*
				* A forma mais segura é quebrar a data e verificar dia, mes e ano separadamente,
				* convertendo a data para toString se permite comparação porem os horarios do servidor 
				* é diferente do horario do javascript local assim como conversão para o timestamp 
				* e ocasiona erro na comparação
				*/				
				if((hoje_dia == dias.getDate()) && (hoje_mes ==  dias.getMonth()) && (hoje_ano == dias.getFullYear())){
					//Pega somente o dia atual				
					itens += '<td class="bg-dark text-light">' + dias.getDate() + '</td>';		
				}else{
					/*Colori os finais de semana*/
					if(c == 0 || c == 6){
						itens += '<td class="text-danger">' + dias.getDate() + '</td>';
					}else{
						//Pega somente os dias pra mostrar									
						itens += '<td>' + dias.getDate() + '</td>';
					}
				}
			}
			itens += '</tr>';
		}
		//Imprime tudo na div tbody da tabela
		$("tbody").html(itens);	
	}	
	
	
	//Preenche o calendário ao carregar a página		
	$.get("load.php", function(response){
		preenche_calendario(response);		
	});		
	
	//A cada vez que seleciona uma data nova as funções são chamadas
	$('select[name="mes"]').change(function(){
		select_data();
		selecionaData();
	});
	
	//A cada vez que seleciona uma data nova as funções são chamadas
	$('select[name="ano"]').change(function(){		
		select_data();
		selecionaData();
	});
	
	/*Verifica os valores antes de dar um request no servidor, se o ano estiver
	vazio é passado o ano atual, se for o mes da mesma forma. O dataValue é o
	request ou pedido ao servidor que assume varias aparências dependendo dos 
	dados prenchidos ou vazios. Apos isso os dados são enviados via ajax e à 
	response é repassada a função responsavel por escrever o calendário*/
	function selecionaData(){
		var dataValue = '';
		var mesAtual = new Date().getMonth() + 1;	
		var anoAtual = new Date().getFullYear();			
		
		if(($('select[name="mes"]').val() == '') && ($('select[name="ano"]').val() == '')){
			dataValue = "ano=" + anoAtual + "&mes=" + mesAtual;
		}else if($('select[name="mes"]').val() == ''){			
			dataValue = "ano=" + $('select[name="ano"]').val() + "&mes=" + mesAtual;		
		}else if($('select[name="ano"]').val() == ''){			
			dataValue = "ano=" + anoAtual + "&mes=" + $('select[name="mes"]').val(); 			
		}else{		
			dataValue = $("form").serialize();
		}
		
		$.ajax({
			type:"GET",
			url:"load.php",
			data:dataValue,			
			success:function(response){
				preenche_calendario(response);
			}
		});
	}
	
	/*Verifica os dropdown mês e ano se possuem valor, se não ele adiciona 
	o mes e ano atual se possuir uma escolha do cliente o valor do mes e ano
	é adicionado nas variaveis mes e ano*/ 
	function select_data(){
		if($('select[name="mes"]').val() == ''){
			mes = new Date().getMonth() + 1;
		}else{
			mes = $('select[name="mes"]').val();
		}
		if($('select[name="ano"]').val() == ''){
			ano = new Date().getFullYear();
		}else{
			ano = $('select[name="ano"]').val();
		}
		
		$("#data_extenso").html("<h4> Mês " + mes + " de " + ano + "</h4>");
	}
	
	/*Verifica o valor da variavel global mes e ano apartir delas requests são 
	passados ao servidor com incremento de ano e mes e variando somente entre 12 para meses
 	e reiniciando o ano para 1 apos o mes chegar a 12 */
	function avancar_data(){			
		if(mes < 12){
			dataValue = "ano=" + ano + "&mes=" + ++mes;
		}else{
			ano++;
			mes = 01;
			dataValue = "ano=" + ano + "&mes=" + mes;
		}
		
		$("#data_extenso").html("<h4> Mês " + mes + " de " + ano + "</h4>");
		
		$.ajax({
			type:"GET",
			url:"load.php",
			data:dataValue,			
			success:function(response){
				preenche_calendario(response);
			}
		});				
	}
	
	/*A função voltar funciona da mesma forma que a avançar mas decrementando o mes e ano*/
	function voltar_data(){		
		if(mes > 1){
			dataValue = "ano=" + ano + "&mes=" + --mes;
		}else{
			ano--;
			mes = 12;
			dataValue = "ano=" + ano + "&mes=" + mes;
		}
		
		$("#data_extenso").html("<h4> Mês " + mes + " de " + ano + "</h4>");
		
		$.ajax({
			type:"GET",
			url:"load.php",
			data:dataValue,			
			success:function(response){
				preenche_calendario(response);
			}
		});				
	}
	
	//Botão avançar mes 	
	$("#prox").click(function(){			
		avancar_data();
	});
	
	//Botão voltar mes
	$("#ant").click(function(){			
		voltar_data();
	});	
	
	/*Verifica ao ser iniciado se existem valores de dadas especificas ou se usará a atual*/
	select_data();
});