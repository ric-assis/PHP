$(function(){
	var display = $("input[name='senha']");
	
	$("input[name='senha']").keypress(function(e){
		e.preventDefault();
		if($("#alerta").find(".alert").remove()){
			$("#alerta").removeClass(".alert");
		}
		$("#alerta").append(
			'<div class="alert alert-danger" role="alert"><h4>Alerta</h4>Por segurança utilize o teclado virtual.</div>'	
		);
		
	});
		
	$("button:eq(0)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "7");		
	});
	
	$("button:eq(1)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "4");		
	});
	
	$("button:eq(2)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "1");		
	});
	
	$("button:eq(3)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "0");		
	});
	
	$("button:eq(4)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "8");		
	});
	
	$("button:eq(5)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "5");		
	});
	
	$("button:eq(6)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "2");		
	});
	
	$("button:eq(7)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "-");		
	});
	
	$("button:eq(8)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "9");		
	});
	
	$("button:eq(9)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "6");		
	});
	
	$("button:eq(10)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		display.val(display_atual + "3");		
	});
	
	$("button:eq(11)").click(function(display_atual){
		var display_atual = $("input[name='senha']").val();			
		var tam = display_atual.length - 1;	
		var back = display_atual.slice(0, tam);		
		display.val(back);		
	});
	
	
});