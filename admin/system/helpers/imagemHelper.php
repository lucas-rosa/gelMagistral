<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

LibFactory::getInstance(null,null,'imagem/class.imagem.php');

/**
 * Classe imagemHelper
 * 
 * Seta os metodos usados na lib image_handling
 * 
 * @package admin\system\helpers\imagemHelper
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 */
class imagemHelper extends Image_handling
{
       /**
        * Metodo setSetDados
        * 
        * Seta os dados recebidos em setSetDados
        * 
        * @param string $diretorio
        * @param integer $max_file
        * 
        */
	public function setSetDados($diretorio, $max_file)
	{
		$this->setDados($diretorio, $max_file);
	}
	
       /**
        * Metodo setResizeImage
        * 
        * Seta os dados recebidos em setResizeImage
        * 
        * @param string $image
        * @param integer $width
        * @param integer $height
        * @param integer $scale
        * 
        */
	public function setResizeImage($image,$width,$height,$scale)
	{
		$this->resizeImage($image, $width, $height, $scale);
	}
	
       /**
        * Metodo setResizeImage
        * 
        * Seta os dados setResizeThumbnailImage
        * 
        * @param string $thumb_image_name
        * @param string $image
        * @param integer $width
        * @param integer $height
        * @param integer $start_width
        * @param integer $start_height
        * @param integer $scale
        * 
        */
	public function setResizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale)
	{
		$this->resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale);
	}
	
        /**
        * Metodo setGetHeight
        * 
        * Seta os dados setGetHeight
        * 
        * @param string $image
        * 
        */
	public function setGetHeight($image)
	{
		$this->getHeight($image);
	}
	
       /**
        * Metodo setGetWidth
        * 
        * Seta os dados setGetWidth
        * 
        * @param string $image
        * 
        */
	public function setGetWidth($image)
	{
		$this->getWidth($image);
	}
	
       /**
        * Metodo setRecroparImagem
        * 
        * Seta os dados setRecroparImagem
        * 
        * @param string $nome_imagem_cropada
        * 
        */
	public function setRecroparImagem($nome_imagem_cropada)
	{	
		$this->recroparImagem($nome_imagem_cropada);	
	}
        
       /**
        * Metodo setUploadImagemOriginal
        * 
        * Seta os dados setUploadImagemOriginal
        * 
        */
	public function setUploadImagemOriginal(){
		$this->uploadImagemOriginal();
	}
	
       /**
        * Metodo setSalvarImagemCropadaInclusao
        * 
        * Seta os dados setSalvarImagemCropadaInclusao
        * 
        */
	public function setSalvarImagemCropadaInclusao(){
		$this->salvarImagemCropadaInclusao();
	}
	
        /**
        * Metodo setDeletarImagemInc
        * 
        * Seta os dados setDeletarImagemInc
        * 
        */
	public function setDeletarImagemInc(){
		$this->deletarImagemInc();
	}
	
       /**
        * Metodo setSalvarImagemCropadaEdicao
        * 
        * Seta os dados setSalvarImagemCropadaEdicao
        * 
        */
	public function setSalvarImagemCropadaEdicao(){
		$this->salvarImagemCropadaEdicao();
	}
	
}
?>