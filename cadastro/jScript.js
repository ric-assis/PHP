$(function(){
	$("input[name='telefone']").mask('(00) 0000-0000');
	$("input[name='cpf']").mask('000.000.000-00', {reverse: true});
});