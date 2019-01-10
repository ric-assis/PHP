$(function(){			
	$("#login").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"login.php",
			data:dataValue,
			success:function(response){				
				if(response > 0){
					$(location).attr("href", "movimento.php");					
				}else{
					alert(response);
				}
			}, 
			error:function(response){
				alert(response);
			}
		});		
	});
	
		
	$("#frmDepositar").submit(function(e){
		e.preventDefault();
		
		dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"depositar.php",
			data:dataValue,
			dataType:"json",
			success:function(response){							
				if(response.id){											
					$("#relatorioInt").html(
						response.data_atual + '<br/>' + response.hora_atual + '<br></hr><br/>Identificação da Conta: ' + response.id + '<br/>Agência: ' + response.agencia +		'<br/>Titular: ' + response.titular + '<br/>Conta: ' + response.conta +	'<br/><strong>Valor do Deposito: ' + response.deposito + '</strong><br/>++++++++++++++++++++++++<br/>v1.0'						
					);
					
					$("#relatorio").addClass("conf_rel");					
					
					
				}else{					
					alert(response.responseText);
				}
			},
			error:function(response){
				/* O response está vindo como um objeto no console.log(response) e mostra o texto recebido na propriedade responseText*/
				alert(response.responseText);
			}			
		});		
	});
		
	
	$("#frmSaque").submit(function(e){
		e.preventDefault();

		dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"sacar.php",
			data:dataValue,	
			dataType:"json",
			success:function(response){			
				if(response.id){					
					$("#relatorio_sac #relatorioInt").html(
						response.data_atual + '<br/>' + response.hora_atual + '<br></hr><br/>Identificação da Conta: ' + response.id + '<br/>Agência: ' + response.agencia +		'<br/>Titular: ' + response.titular + '<br/>Conta: ' + response.conta +	'<br/>========================<br/>Valor sacado: ' + response.saque +  '<br/>========================<br/>Saldo atual: ------------- R$ ' + response.saldo + '<br/>++++++++++++++++++++++++<br/>v1.0'					
					);
					
					$("#relatorio_sac").addClass("conf_rel_sac");			
					
				}else{					
					alert(response.responseText);
					
				}				
			},
			error:function(response){				
				alert(response.responseText);
			}
		});
	});
	
	$("#frmTransferencia").submit(function(e){
		e.preventDefault();
		
		dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"transferir.php",
			data:dataValue,
			dataType:"json",
			success:function(response){			
				if(response.depositario.id){					
					$("#relatorio_trans #relatorioInt").html(
						response.data_atual + '<br/>' + response.hora_atual + '<br>Identificação da Conta: ' + response.depositario.id + '<br/>Agência: ' + response.depositario.agencia + '<br/>Titular: ' + response.depositario.titular + '<br/>Conta: ' + response.depositario.conta +	'<br/>========================<br/>Valor transferido: ' + response.valor_transferido + '<br>========================<br/>Saldo atual: R$' + response.depositario.saldo + '<br/>**** CONTA BENEFICIADA ****<br/>Identificação da conta beneficiada: ' + response.beneficiario.id + '<br/>Agência: ' + response.beneficiario.agencia + ' Conta: ' + response.beneficiario.conta + '<br/>Titular: ' + response.beneficiario.titular + '<br/>++++++++++++++++++++++++<br/>v1.0'					
					);
					
					$("#relatorio_trans").addClass("conf_rel_trans");			
					
				}else{					
					alert(response.responseText);
					
				}				
			},
			error:function(response){
				alert(response.responseText);
			}
		});
	});
	
	
	$("#btnDeposito").click(function(){
		$(location).attr("href", "deposito.php");
	});
	
	$("#btnSaque").click(function(){
		$(location).attr("href", "saque.php");
	});
	
	$("#btnTransferencia").click(function(){
		$(location).attr("href", "transferencia.php");
	});
	
	$("#btnExtrato").click(function(){
		$(location).attr("href", "extrato.php");
	});
	
	$("#btnSair").click(function(){
		$(location).attr("href", "sair.php");
	});
	
	
		
	$("#btnSaldo").click(function(){	
		//var url = String(window.location);
		//var pos = url.search("ident_conta");
		//var sub = url.substr(pos); 
		
		$(location).attr("href", "saldo.php");
	});
	
	
	
	/*$("#btnSaldo").click(function(){	
		var url = String(window.location);
		var pos = url.search("=");
		var sub = url.substr(pos + 1); 
		var sub = {"ident_conta" : sub};	
		
		$.ajax({
			type:"POST",
			url:"saldo.php",			
			data:sub,
			dataType:"json",
			//contentType:"application/json; charset=utf-8",
			success:function(response){				
				var sub_json = JSON.stringify(sub);//Converte a notação JSON em arquivo JSON		
				
				if(sub.ident_conta == response.id){
					$(location).attr("href", "exibir_saldo.php");
					
					$("#relatorio_saldo #relatorioInt").html(
						response.data_atual + '<br/>' + response.hora_atual + '<br></hr><br/>Identificação da Conta: ' + response.id + '<br/>Agência: ' + response.agencia +		'<br/>Titular: ' + response.titular + '<br/>Conta: ' + response.conta +	'<br/>==============================<br/>Saldo: ---------------- <strong>R$' + response.saldo +  '</strong><br/>++++++++++++++++++++++++++++++<br/>v1.0'					
					);
					
					$("#relatorio_saldo").addClass("conf_rel_saldo");								
					
				}else{
					alert("Identificador da conta alterado ou inexitente.");
				}				
			},
			error:function(response){
				alert(response);
			}
		});		
	});*/
	
	$("input[name='valor']").mask("#######,00", {reverse: true});
	$("input[name='valor']").blur(function(){
		var valor = $("input[name='valor']").val();
		if(valor.indexOf("R$") == -1)
			$("input[name='valor']").val("R$ " + valor);	
	});
	
});