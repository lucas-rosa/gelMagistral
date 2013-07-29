<?php
class Image_handling

{
	public $upload_dir  		;  
	public $image_handling_file ;  
	public $large_image_prefix  ;  
	public $thumb_image_prefix  ;		
	public $large_image_name 	;     
	public $thumb_image_name 	;    
	public $max_file  			; 					
	public $max_width  			;						
	public $thumb_width 		;						
	public $thumb_height 		;



	public $altura_quadrado  	;   
	public $largura_quadrado 	; 	  

	public $altura_visualizador ; 
	public $largura_visualizador; 
	public $allowed_image_types;
	public $allowed_image_ext    ;
	public $image_ext            ;
	public $large_image_location ;
	public $thumb_image_location ;
	public $ext_arquivo;  
	public $randomico ;

	function __construct()
	{
		session_start(); 
		if(!isset($_SESSION['randomico'])){
			$_SESSION['randomico'] = date('d').date('m').date('Y').date('H').date('i').date('s');
			$this->randomico = $_SESSION['randomico'] ;
			$_SESSION['user_file_ext']= "" ;
		}else{
			$this->randomico = $_SESSION['randomico'] ; //assign the timestamp to the session variable
			
		}
			
			
			
		
	}
	
	public function setDados($diretorio, $max_file)
	{
		$this->upload_dir  		   = $diretorio; 				
		$this->large_image_prefix  = "original_"; 			
		$this->thumb_image_prefix  = "cropado_";			
		$this->large_image_name    = $this->large_image_prefix.$this->randomico;     
		$this->thumb_image_name    = $this->thumb_image_prefix.$this->randomico;    
		$this->max_file 		   = $max_file; 						

		/*$this->altura_quadrado  = $altura_crop;    
		$this->largura_quadrado = $largura_crop; 	*/

		$this->altura_visualizador  = $altura_crop; 
		$this->largura_visualizador = $largura_crop; 

		$this->allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
		$this->allowed_image_ext = array_unique($this->allowed_image_types); 
		$this->image_ext = "";

		$this->large_image_location = $this->upload_dir.$this->large_image_name;
		$this->thumb_image_location = $this->upload_dir.$this->thumb_image_name;

		foreach ($this->allowed_image_ext as $mime_type => $ext)
		{
			$this->image_ext.= strtoupper($ext)." ";
		}

	}
	
	public function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $novaAltura, $novaLargura)
	{
		
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);

		$newImageWidth  = $novaLargura;
		$newImageHeight = $novaAltura;
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image);
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image);
				break;
		}

		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);

		switch($imageType) {
			case "image/gif":
				imagegif($newImage,$thumb_image_name);
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				imagejpeg($newImage,$thumb_image_name,90);
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$thumb_image_name);
				break;
		}
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;


	}
	
	public function getHeight($image) {
		$size = getimagesize($image);
		$height = $size[1];
		return $height;
	}


	public function getWidth($image) {
		$size = getimagesize($image);
		$width = $size[0];
		return $width;
	}
	
	public function uploadImagemOriginal(){
		
			$flag = false;
			$userfile_name = $_FILES['image']['name'];
			$userfile_tmp = $_FILES['image']['tmp_name'];
			$userfile_size = $_FILES['image']['size'];
			$userfile_type = $_FILES['image']['type'];
			$filename = basename($_FILES['image']['name']);
			$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
			

			if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0))
			{
				foreach ($this->allowed_image_types as $mime_type => $ext)
				{
	
					if($file_ext==$ext && $userfile_type==$mime_type)
					{
						$error = "";
						break;
					}else{
						$error = "Apenas <strong>".$image_ext."</strong> é aceito para upload<br />";
					}
				}
				if ($userfile_size > ($this->max_file*1048576))
				{
					$error.= "A imagem deve estar sob ".$this->max_file."MB de tamanho";
				}

			}else{
				$error= "Por favor, selecione uma imagem para upload";
			}
			if (strlen($error)==0)
			{
				if (isset($_FILES['image']['name']))
				{
					//this file could now has an unknown file extension (we hope it's one of the ones set above!)
					$this->large_image_location = $this->large_image_location.".".$file_ext ;
					$this->thumb_image_location = $this->thumb_image_location.".".$file_ext ;

					//put the file ext in the session so we know what file to look for once its uploaded
					if($_SESSION['user_file_ext']!=$file_ext)
					{
						$_SESSION['user_file_ext']="";
						$_SESSION['user_file_ext']=".".$file_ext;
					}

					move_uploaded_file($userfile_tmp, $this->large_image_location);

					chmod($this->large_image_location, 0777);


					$width = $this->getWidth($this->large_image_location);
					$height = $this->getHeight($this->large_image_location);

			
					//$uploaded = $this->resizeImage($this->large_image_location,$width,$height);
					
					if (file_exists($this->thumb_image_location))
					{
						unlink($this->thumb_image_location);
					}


					if($flag == false){
						$nome_imagem_campo = $this->large_image_name.".".$file_ext;

					}
						 unset($_FILES['image']);
					echo "success|".$this->large_image_location."|".$this->getWidth($this->large_image_location)."|".$this->getHeight($this->large_image_location)."|".$nome_imagem_campo;
				}
			}else{
				echo "error|".$error;
			}
		
	}
	
	public function salvarImagemCropadaInclusao(){
		$x1 = $_POST["x1"];
		$y1 = $_POST["y1"];
		$w = $_POST["w"];
		$h = $_POST["h"];

		$this->large_image_location = $this->large_image_location.$_SESSION['user_file_ext'];
		$this->thumb_image_location = $this->thumb_image_location.$_SESSION['user_file_ext'];

		
		$alturaCropada = $_POST['altura_cropada'];
		$larguraCropada = $_POST['largura_cropada'];
		
		$parametro1 = $this->thumb_image_location;
		$parametro2 = $this->large_image_location;

		$croped = $this->resizeThumbnailImage($parametro1, $parametro2,$w,$h,$x1,$y1,$alturaCropada, $larguraCropada);

		$this->ext_arquivo = $_SESSION['user_file_ext'];
		echo "success|".$this->large_image_location."|".$this->thumb_image_location."|".$this->thumb_image_name.$this->ext_arquivo;
		
		$this->randomico= "";
		$_SESSION['user_file_ext']= "";
		unset($_SESSION['randomico']);
	
	}
	
	public function deletarImagem($imagem_cropada){
		unlink($this->upload_dir.$imagem_cropada);
		echo "deletado com sucesso";
	}
		
	
	public function salvarImagemCropadaEdicao(){
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$x2 = $_POST["x2"];
			$y2 = $_POST["y2"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			$nome = $_POST['img_name'];
			$diretorio_original = $this->upload_dir;

			$imagem_original_banco = $_POST['imagem_original_banco'];
			$imagem_cropada_banco  = $_POST['imagem_cropada_banco'];

			$original_explodida = explode("_", $imagem_original_banco);
			$numero_random = $original_explodida[1];
             
			$cropado_final = "cropado_".$numero_random;
            
			$alturaCropada = $_POST['altura_cropada'];
			$larguraCropada = $_POST['largura_cropada'];
            
	
			$cropped = $this->resizeThumbnailImage($diretorio_original.$cropado_final, $diretorio_original.$imagem_original_banco, $w, $h ,$x1 ,$y1, $alturaCropada, $larguraCropada);
            
			
			echo "success|".$diretorio_original.$imagem_original_banco."|".$diretorio_original.$cropado_final."|".$cropado_final;
			$this->randomico= "";
			$_SESSION['user_file_ext']= "";
			unset($_SESSION['randomico']);
		
	}
	
	public function deletarImagemInc(){
		$this->large_image_location = $_POST['large_image'];
		$this->thumb_image_location = $_POST['thumbnail_image'];
		
		if (file_exists($this->large_image_location))
		{
			unlink($this->large_image_location);
		}
		
		if (file_exists($this->thumb_image_location))
		{	
			unlink($this->thumb_image_location);
		}
		echo "sucesso|A imagem foi deletada com sucesso";
	}
	
	public function recroparImagem($nome_imagem_cropada){
			$x1 = $_POST["x1"];
			$y1 = $_POST["y1"];
			$w = $_POST["w"];
			$h = $_POST["h"];
			
			$diretorio_original = $this->upload_dir ;
			
			$altura_cropada = $_POST['altura_cropada'];
			$largura_cropada = $_POST['largura_cropada'];
			
			$this->resizeThumbnailImage($diretorio_original.$nome_imagem_cropada, $diretorio_original.$_POST['imagem_original_banco'], $w, $h, $x1, $y1, $altura_cropada, $largura_cropada);
			            
			echo "success|".$diretorio_original.$_POST['imagem_original_banco']."|".$diretorio_original.$nome_imagem_cropada."|".$nome_imagem_cropada;
			$this->randomico= "";
			$_SESSION['user_file_ext']= "";
			unset($_SESSION['randomico']);
	}




}
?>
