<?php

require_once 'database.php';

$imagem = $_FILES["imagem"];
$imgFile = $_FILES["imagem"]['name'];
$imgSize = $_FILES["imagem"]['size'];
$tmp_dir = $_FILES["imagem"]['tmp_name'];

if($imagem != NULL) { 

	// upload directory where the local data will be saved
	$upload_dir = 'user_images/'; 

	// get extension
	$imgExtension = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 

	// verify extensions
	$validExtensions = array('jpeg', 'jpg', 'png');

   	// rename uploading image
	$userpic = time().".".$imgExtension;


   	// allow valid image file formats
	if(in_array($imgExtension, $validExtensions)){   
    	// Check file size '2MB'
		if($imgSize < 2000000){
			move_uploaded_file($tmp_dir,$upload_dir.$userpic);
		}
		else{
			$errMSG = "Essa imagem é muito grande, tente outra menor que 2 MB";
		}
	}
	else{
		$errMSG = "Esse tipo de formato não é valido meu jovem!";  
	}

    // if no error occured, continue ....
	if(!isset($errMSG)){

		//Data persistence, save in local and save into BD
		$mysqlImg = fopen($upload_dir.$userpic, "rb"); 

		$stmt = $conn->prepare('INSERT INTO fotos(img) VALUES(:upic)');
		$stmt->bindParam(':upic',$mysqlImg, PDO::PARAM_LOB);

		if($stmt->execute()){
			$successMSG = "Novo dado inserido";
			header("refresh:2;index.php"); // redirects image view page after 2 seconds.
		}
		else{
			$errMSG = "erro ao inserir";
		}
	}
}  

?>