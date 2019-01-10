<?php	
	$nome = addslashes($_POST['nome']);
	$postagem = addslashes($_POST['postagem']);
	
	$avatar = $_FILES['avatar'];
	
	//Invocando as propriedades do arquivo
	$avtSize = $_FILES['avatar']['size'];
	$avtType = $_FILES['avatar']['type'];
	$avtError = $_FILES['avatar']['error'];
	$avtName = $_FILES['avatar']['name'];
	
	//Determinndo propriedades aceitas	
	$types = array("image/jpg", "image/png", "image/pjpeg", "image/jpeg");//Existe uma lista de  mime-type: https://en.wikipedia.org/wiki/Media_type
	$size = 3072 * 1024; //bytes
	
	
	if($avtError == 0){
		if(!in_array($avtType,$types)){
			echo "Tipo de arquivo inválido";
			exit;
		}
		else if($avtSize > $size){
			echo "Tamanho maior que 3MB";
			exit;
		}		
	}
	
	//Pegar a extensao original	
	$ext = explode('.', $avtName);
	$extensao = end($ext);	
	
	$nome_do_arquivo = md5(time().rand(0,99)).'.'.$extensao;
	
	
	if(isset($avatar['tmp_name']) && !empty($avatar['tmp_name'])){
		require "connect.php";
		move_uploaded_file($avatar['tmp_name'], "avatar/".$nome_do_arquivo);
		
		//$sql = $pdo->query("INSERT INTO post(avatar, nome, postagem) VALUES('avatar/$nome_do_arquivo', '$nome', '$postagem')");		
		$stm = $pdo->prepare("INSERT INTO post(avatar, nome, postagem) VALUES(?, ?, ?)");
		$stm->bindValue(1, 'avatar/'.$nome_do_arquivo);
		$stm->bindValue(2, $nome);
		$stm->bindValue(3, $postagem);
		$stm->execute();
		
	}else{
		echo "Ocorreu um erro ao salvar o post tente novamente.";	
	
	}	
	
?>