<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	if((localStorage.getItem(<?php echo $id ?>) == 0) && (localStorage != null)){
		$("#senha").html(	
			'<div id="divSenha" class="row justify-content-center align-items-center border rounded bg-light pb-2 shadow mt-3">'+
				'<div class="col-md-6">'+
					'<h2><?php echo $nome ?>, após seu primeiro login troque a senha por uma pessoal:</h2>'+
					'Nova senha:'+
					'<form id="frmSenha" method="POST">'+
						'<div class="form-group">'+
							'<input class="form-control" type="password" name="senha"/>' +
						'</div>' +
						'<div class="form-group">' +
							'<button class="btn btn-success" type="submit">Redefinir</button>' +
						'</div>' +	
					'</form>' +
				'</div>' +
			'</div>');	
			
	}else{		
		$("#divSenha").css("display", "none");	
	}	
</script>

