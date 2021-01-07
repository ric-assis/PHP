$(function(){
	const NUMBERS = [1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000];
	const ROMANS = ['I', 'IV', 'V', 'IX', 'X', 'XL', 'L', 'XC', 'C', 'CD', 'D', 'CM', 'M']; 
	
	function decToRoman(decimal){
		var result = '';
		
		for(var i=13; i >= 0; i--){
			while(decimal >= NUMBERS[i]){
				decimal -= NUMBERS[i];
				result += ROMANS[i];
			}
		}
		
		return result;
	}	
	
	$('button:eq(0)').click(function(){
		var valueDecimal = $('input[name="numero"]').val();
		
		$('#resultado').html(decToRoman(valueDecimal));
	});
	
	
});