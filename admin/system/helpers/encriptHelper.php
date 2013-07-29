<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/** 
 * Classe encriptHelper
 * 
 * Faz uma uma criptografia
 * 
 * @package admin\system\helpers\encriptHelper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 */


Class encriptHelper
{       
        /**
         * @const key chave da criptografia max 24 caracteres
         */
	const key="123456";  
        
       /**
        * Metodo encode
        * 
        * criptografar
        * 
        * @param string $str
        * 
        * @return string
        */
	public function encode($str)
	{
		$input = $str;
		$rnd=rand(10000000,99999999);
		$td = mcrypt_module_open('tripledes', '', 'ecb', '');
		mcrypt_generic_init($td, self::key, $rnd);
		$encrypted_data = mcrypt_generic($td, $input);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		return base64_encode($encrypted_data);
	}
	
       /**
        * Metodo decode
        * 
        * descriptografar
        * 
        * @param string $str
        * 
        * @return string
        */
	public function decode($str)
	{
		$input = base64_decode($str);
		return mcrypt_decrypt ( "tripledes" , self::key , $input , "ecb" );
	}
}
?>