$(function(){
	
	$("#login").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"login.php",
			data:dataValue, 
			success:function(response){
				alert(response);
				location.reload();
			}
		});
	});
	
	$("#cadastro").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"cadastro.php",
			data:dataValue,
			success:function(response){
				alert(response);
			}
		});
	});
	
	$("#fecharLog").click(function(){
		$.get("sair.php", function(){
			location.href="index.php";	
		});		
	});
	
});