$(function(){
	
	$("button:eq(1)").click(function(){
		$(location).attr("href", "cadastrar.php");		
	});
	
	$('input[name="chk"]').change(function(){
		if($('input[name="chk"]').is(":checked")){
			$(this).val("1");	
		}else{
			$(this).val("0");	
		}
	});
	
	$("#frmLogin").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		var redirect = $(this).attr("data-redirect");
		
		$.ajax({
			type:"POST",
			url:"login.php",
			data:dataValue,
			success:function(response){
				if(response == 1){
					if(redirect == ''){
						$(location).attr("href", "index.php");
					}else{
						$(location).attr("href", redirect);
					}
				}else{
					$("#divForm").html('<div class="alert alert-danger" role="alert">Email não encontrado ou senha inválida.</div>');	
				}
			}
		});
	});
	
});