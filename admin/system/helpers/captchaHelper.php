<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/** 
 * Classe captchaHelper
 * 
 * Classe responsavel pela Geracao de Captchas.
 * 
 * 
 * @package admin\system\helpers\captchaHelper
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 */

class captchaHelper
{
	
        /** 
        * Metodo CreateCaptcha
        * 
        * Este metodo configura e gera o capcha de acordo com os dados passados por parametro
        *  
        * @param string $imageFile  
        * @param string $fontname 
        * @param string $totalCaracter 
        * @param string $tamanhoFonte 
        * @param string $angulo 
        *  
        */
 
	public function CreateCaptcha($imageFile, $fontname, $totalCaracter, $tamanhoFonte, $angulo)
	{
		// Inicializa os dados da session
		session_start();
			 
		// Definir o header como image/png para indicar que esta página contém dados
		// do tipo image->PNG
		header("Content-type: image/png");

		// Criar um novo recurso de imagem a partir de um arquivo
		$imagemCaptcha = imagecreatefrompng($imageFile)
		or die("Não foi possível inicializar uma nova imagem");
		
		$alfabeto = "ABCDEFGHJKLMNPQRSTUVXYWZ23456789";
		for ($i = 0; $i < $totalCaracter; $i++)
		{
			$letras_aleatorias .= $alfabeto[(rand() % strlen($alfabeto))];
		}
		
		// Criar o texto para o captcha
		$textoCaptcha = substr($letras_aleatorias,-$totalCaracter,$totalCaracter);		

		// Guardar o texto numa variável session
		$_SESSION['captcha'] = $textoCaptcha;

		// Indicar a cor para o texto
		$corCaptcha = imagecolorallocate($imagemCaptcha,0,0,0);
		
		//Coloca o texto na imagem (imagem, tamanho, angulo, x, y, cor, fonte, texto)
		imagettftext($imagemCaptcha, $tamanhoFonte, $angulo, 50, 35, $corCaptcha, $fontname,$textoCaptcha);
		
		// Mostrar a imagem captha no formato PNG.
		// Outros formatos podem ser usados com imagejpeg, imagegif, imagewbmp, etc.
		imagepng($imagemCaptcha);
			 
		// Liberar memória
		imagedestroy($imagemCaptcha);
	}
}
?>