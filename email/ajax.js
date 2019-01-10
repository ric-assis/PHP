$(function(){
	function limpar(){
		$("input").val("");
		$("textarea").val("");
		$("input[name='nome']").focus();
	}
	
	$("form").submit(function(e){
		e.preventDefault();
		
		var dataValue = $(this).serialize();
		
		$.ajax({
			type:"POST",
			url:"enviar-email.php",
			data:dataValue,
			success:function(response){
				alert(response);
				limpar();
			}
		});
	});
	
});