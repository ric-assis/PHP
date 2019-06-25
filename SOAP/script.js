$(function(){
	
	$('button:eq(0)').click(function(){			
		/*$.soap({			
			url:"https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl",
			method: "consultaCEP",
			
			data: {"consultaCEP":"63702100"},
			HTTPHeaders: {
				'Content-type':'application/xml',
				'Server-Protocol':'SOAP'
			},
			success: function(response){
				console.log(response);
			}
		});*/
		var cep = "63702100";
		$.get("https://api.postmon.com.br/v1/cep/"+cep, function(response){			
				console.log(response);
						
		});
	});
});