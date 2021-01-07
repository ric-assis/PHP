var scanner = new Instascan.Scanner(
	{
		video: document.getElementById('camera')			
	}	
);

scanner.addListener('scan', function(conteudo){
	document.getElementById("exibir-qr-code").innerHTML = conteudo;	
});


Instascan.Camera.getCameras().then(function(cameras){
	if(cameras.length == 1 ){			
		scanner.start(cameras[0]);
	}else if(cameras.length >= 2 ){			
		scanner.start(cameras[1]);
	}else if(cameras.length == 0 ){
		alert("ERRO: Câmera não encontrada junto ao dispositivo");
	}
});
