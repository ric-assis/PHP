$(function(){
	
	$("button:eq(1)").click(function(){
		$(location).attr("href", "cadastrar.php");		
	});
	
	
	$("#frmLogin").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"login.php",
			data:dataValue,
			success:function(response){
				if(response == 1){
					$(location).attr("href", "index.php");
				}else{
					$("#divForm").html('<div class="alert alert-danger" role="alert">Email não encontrado ou senha inválida.</div>');	
				}
			}
		});
	});

	function filtro(ordem, categoria){						
		$.ajax({
			type:"GET",
			url:"index.php?ordem=" + ordem + "&categoria=" + categoria,
			dataType:"json",
			success:function(response){
				
			}			
		});			
	}
	
	var ordem;
	var categoria;
	$("#organizar").change(function(){		
		ordem = $(this).val();	
		filtro(ordem, categoria); 
	});	
	
	$("#categorias .categorias").click(function(){
		categoria = $(this).attr("data-categoria");
		filtro(ordem, categoria);
	});	
	
});