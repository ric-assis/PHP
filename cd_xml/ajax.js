$(function(){
			
	$.get("cd_catalog.xml", function(response){
		var cd_title = response.getElementsByTagName("TITLE");		
		for(var i = 0; i < cd_title.length; i++){
			var title = cd_title.item(i);//item pega o primeiro no da tag 
			var title = $(title).text();
			
			$("select").append("<option>" + title + "</option>");
		}
	});
	
	
	
	$("form").submit(function(e){
		e.preventDefault();
		
		var title_selected = $("select option:selected").text();			
		
		$.get("cd_catalog.xml", function(response){					
			var cd_title = response.getElementsByTagName("TITLE");
			for(var i = 0; i < cd_title.length; i++){
				var title = cd_title.item(i);
				title = $(title).text();
				if(title_selected == title){
					var artist = response.getElementsByTagName("ARTIST")[i];
					var country = response.getElementsByTagName("COUNTRY")[i];
					var company = response.getElementsByTagName("COMPANY")[i];
					var price = response.getElementsByTagName("PRICE")[i];
					var year = response.getElementsByTagName("YEAR")[i];
					
					
					var dataValue = new Object();
					dataValue.title = title;
					dataValue.artist =  $(artist).text();
					dataValue.country = $(country).text();	
					dataValue.company = $(company).text();
					dataValue.price = $(price).text();
					dataValue.year = $(year).text();
						
					$.ajax({
						type:"GET",
						url:"salvar.php",
						data:dataValue,	
						dataType:"json",
						success:function(response){	
							$("#div").html('<table class="table"><thead><tr><th>Titulo</th><th>Artista</th><th>Local</th><th>Empresa</th><th>Preço</th><th>Ano</th></tr><thead><tbody><tr><td>' + response.title + '</td><td>' + response.artist +	'</td><td>' + response.country + '</td><td>' + response.company + '</td><td>' + response.price +	'</td><td>' + response.year + '</td></tr></tbody></table>');
						}
					});		

				}
			}
		});
	});
	
});